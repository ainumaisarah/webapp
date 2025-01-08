<!-- filepath: /c:/xampp/htdocs/moonlit/resources/views/profile/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Profile') }}
        </h2>
    </x-slot>

    <div style="background-color: #f0f4f8;">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="bg-white shadow sm:rounded-lg p-6">
                    @livewire('profile.update-profile-information-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="bg-white shadow sm:rounded-lg p-6 mt-6">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="bg-white shadow sm:rounded-lg p-6 mt-6">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="bg-white shadow sm:rounded-lg p-6 mt-6">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="bg-white shadow sm:rounded-lg p-6 mt-6">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>

    <div class="container">
        <h2 class="mb-4">My Bookings</h2>

        @if($bookings->isEmpty())
            <p>You have no bookings at the moment.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Room ID</th>
                        <th>Check-In Date</th>
                        <th>Check-Out Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $booking->room_id }}</td>
                            <td>{{ $booking->check_in_date }}</td>
                            <td>{{ $booking->check_out_date }}</td>
                            <td>
                                <!-- Action Buttons -->
                                <a href="{{ route('bookings.show', $booking->booking_id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('bookings.edit', $booking->booking_id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('bookings.destroy', $booking->booking_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</x-app-layout>
