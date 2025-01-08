@extends('master.layout')

@section('content')
<div class="container mt-5">
    <!-- flash msg part -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <h2>Guest List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>USER ID</th>
                <th>USER Name</th>
                <th>EMAIL</th>
                <th>Room</th>
                <th>Room Type</th>
                <th>Price (RM)</th>
                <th>Check-In</th>
                <th>Check-Out</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $index => $booking)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $booking->user->id }}</td> <!-- Access user ID -->
                <td>{{ $booking->user->name }}</td> <!-- Access user name -->
                <td>{{ $booking->user->email }}</td> <!-- Access user email -->
                <td>{{ $booking->room->room_id }}</td> <!-- Access room ID -->
                <td>{{ $booking->room->type }}</td> <!-- Access room type -->
                <td>{{ number_format($booking->room->price, 2) }}</td> <!-- Access room price -->
                <td>{{ $booking->check_in_date }}</td> <!-- Access check-in date -->
                <td>{{ $booking->check_out_date }}</td> <!-- Access check-out date -->
                <td>
                    <a href="{{ route('bookings.edit', $booking->booking_id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('bookings.destroy', $booking->booking_id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Add Booking Modal -->
<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addBookingModal">Add Booking</button>
<div class="modal fade" id="addBookingModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Select User -->
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User</label>
                        <select name="user_id" class="form-control" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Select Room -->
                    <div class="mb-3">
                        <label for="room_id" class="form-label">Room</label>
                        <select name="room_id" class="form-control" required>
                            @foreach($rooms as $room)
                                <option value="{{ $room->room_id }}">{{ $room->room_id }} - {{ $room->type }} ({{ number_format($room->price, 2) }})</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Check-In Date -->
                    <div class="mb-3">
                        <label for="check_in_date" class="form-label">Check-In Date</label>
                        <input type="date" name="check_in_date" class="form-control" required>
                    </div>

                    <!-- Check-Out Date -->
                    <div class="mb-3">
                        <label for="check_out_date" class="form-label">Check-Out Date</label>
                        <input type="date" name="check_out_date" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
