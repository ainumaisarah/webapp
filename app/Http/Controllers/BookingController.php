<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $guestCount = $request->input('guest_count');
        $bookingStatus = $request->input('booking_status');

    // Create a new booking
    $bookings = new Booking();
    $bookings->booking_id = strtoupper(Str::random(4)); // Generate a random booking ID
    $bookings->user_id = $userId;
    $bookings->room_id = $validatedData['room_id'];
    $bookings->check_in_date = $validatedData['check_in_date'];
    $bookings->check_out_date = $validatedData['check_out_date'];
    $bookings->guest_count = $validatedData['guest_count'];
    $bookings->price = $request->input('price');
    $bookings->booking_status = 'pending'; // Default to pending

    $booking->save();

    return redirect()->route('payment');
}


    public function edit($booking_id)
    {
        $bookings = Booking::findOrFail($booking_id);
        $users = User::all();
        $rooms = Room::all();

        return view('edit-booking', compact('booking', 'users', 'rooms'));
    }

    public function update(Request $request, $booking_id)
    {
        $bookings = Booking::findOrFail($booking_id);
        $validatedData = $request->validate([
            'room_id' => 'required|exists:rooms,room_id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after_or_equal:check_in_date',
            'guest_count' => 'required|integer|min:1',
            'booking_status' => 'nullable|string',
        ]);

        $bookings->update([
            'room_id' => $validatedData['room_id'],
            'check_in_date' => $validatedData['check_in_date'],
            'check_out_date' => $validatedData['check_out_date'],
            'guest_count' => $request->input('guest_count'),
            'booking_status' => $request->input('booking_status'),
        ]);
        return redirect()->route('admin.index')->with('success', 'Booking edited successfully.');
    }

    public function destroy(Request $request, $booking_id)
    {
        $bookings = Booking::findOrFail($booking_id);
        $bookings->delete();

        return redirect()->route('admin.index')->with('success', 'Booking deleted successfully.');
    }

    public function rooms(Request $request)
{
    $query = DB::table('rooms');
    //$query = Room::query(); // Assuming you have a Room model

      // Apply filters if provided
      if ($request->has('room_type') && $request->room_type != '') {
        $query->where('type', $request->room_type);
    }
     // Filter by guest count if provided
    if ($request->has('guest_count') && $request->guest_count != '') {
        $query->where('maxperson', '>=', $request->guest_count);
    }

    $rooms = $query->get(); //Retrieve filtered rooms
    //$rooms = Room::all(); // Fetch all room data

    // Check if the result is empty and pass a message to the view
    $message = $rooms->isEmpty() ? 'No rooms found for the given criteria.' : null;

    return view('rooms', compact('rooms', 'message'));
}
}
