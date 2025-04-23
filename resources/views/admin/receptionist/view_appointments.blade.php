{{-- resources/views/admin/receptionist/view_appointments.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Appointments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-6 text-gray-700">Appointments List</h1>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                        <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <tr>
                                <th class="py-3 px-6 text-left">#</th>
                                <th class="py-3 px-6 text-left">Patient Name</th>
                                <th class="py-3 px-6 text-left">Email</th>
                                <th class="py-3 px-6 text-left">Appointment Date</th>
                                <th class="py-3 px-6 text-left">Department</th>
                                <th class="py-3 px-6 text-left">Phone</th>
                                <th class="py-3 px-6 text-left">Message</th>
                                <th class="py-3 px-6 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-sm font-light">
                            @forelse($appointments as $appointment)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6">{{ $loop->iteration }}</td>
                                    <td class="py-3 px-6">{{ $appointment->patient_name }}</td>
                                    <td class="py-3 px-6">{{ $appointment->email }}</td>
                                    <td class="py-3 px-6">{{ $appointment->appointment_date }}</td>
                                    <td class="py-3 px-6">{{ $appointment->departement }}</td>
                                    <td class="py-3 px-6">{{ $appointment->phone }}</td>
                                    <td class="py-3 px-6">{{ $appointment->message }}</td>
                                    <td class="py-3 px-6">
                                        <form action="{{ route('appointment.confirm', $appointment->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                                Yes
                                            </button>
                                        </form>
                                        <form action="{{ route('appointment.reject', $appointment->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                                No
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="py-3 px-6 text-center text-gray-500">
                                        No appointments found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>