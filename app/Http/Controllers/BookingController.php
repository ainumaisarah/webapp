<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $fillable = [
        'user_id',
        'room_id',
        'check_in_date',
        'check_out_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function index()
    {
        $bookings = Booking::with(['user', 'room'])->get();
        $users = User::all();
        $rooms = Room::all();

        return view('admin', compact('bookings', 'users', 'rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,room_id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after_or_equal:check_in_date',
            'guest_count' => 'required|integer|',
            'booking_status' => 'nullable|string',
        ]);
        $booking_id = 'BOOK-' . strtoupper(uniqid());
        $guestCount = $request->input('guest_count', 1); // Default to 1 if not provided
        $bookingStatus = $request->input('booking_status', 'pending'); // Default to 'pending' if not provided

        Booking::create([
            'booking_id' => $booking_id,
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'guest_count' => $request->guest_count,
            'booking_status' => $request->booking_status ,
        ]);

        return redirect()->route('admin.index')->with('success', 'Booking added successfully.');
    }


    public function edit($booking_id)
    {
        $booking = Booking::findOrFail($booking_id);
        $users = User::all();
        $rooms = Room::all();

        return view('edit-booking', compact('booking', 'users', 'rooms'));
    }

    public function update(Request $request, $user_id)
    {
        $booking = Booking::where('user_id', $user_id)->with('user')->first();
        $validatedData = $request->validate([
            'room_id' => 'required|exists:rooms,room_id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after_or_equal:check_in_date',
            'guest_count' => 'required|integer|min:1',
            'booking_status' => 'nullable|string',
        ]);

        $booking->update([
            'room_id' => $validatedData['room_id'],
            'check_in_date' => $validatedData['check_in_date'],
            'check_out_date' => $validatedData['check_out_date'],
            'guest_count' => $request->input('guest_count', 1), // Use input value or default to 1
            'booking_status' => $request->input('booking_status', 'pending'), // Use input value or default to 'pending'
        ]);
        return redirect()->route('admin.index')->with('success', 'Booking edited successfully.');
    }

    public function destroy(Request $request, $user_id)
    {
        $booking = Booking::where('user_id', $user_id)->with('user')->first();
        $booking->delete();

        return redirect()->route('admin.index')->with('success', 'Booking deleted successfully.');
    }

    public function rooms()
{
    $rooms = Room::all(); // Fetch all room data
    return view('rooms', compact('rooms'));
}
}
