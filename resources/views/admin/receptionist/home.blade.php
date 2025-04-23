{{-- resources/views/admin/receptionist/home.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Receptionist Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-8">
                <!-- Welcome Section -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-extrabold text-gray-800 mb-2">Welcome, Receptionist!</h1>
                    <p class="text-lg text-gray-600">You are logged in with receptionist access. Use the options below to manage your tasks efficiently.</p>
                </div>

                <!-- Task Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Register Patient -->
                    <div class="bg-blue-100 border border-blue-300 rounded-lg p-6 shadow hover:shadow-lg transition transform hover:scale-105">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-500 text-white rounded-full p-4">
                                <i class="fas fa-user-plus text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-blue-800 ml-4">Register Patient</h3>
                        </div>
                        <p class="text-sm text-blue-600 mb-4">Add a new patient to the system.</p>
                        <a href="{{ route('register.patient') }}" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Register Patient
                        </a>
                    </div>

                    <!-- View Bills -->
                    <div class="bg-green-100 border border-green-300 rounded-lg p-6 shadow hover:shadow-lg transition transform hover:scale-105">
                        <div class="flex items-center mb-4">
                            <div class="bg-green-500 text-white rounded-full p-4">
                                <i class="fas fa-file-invoice-dollar text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-green-800 ml-4">View Bills</h3>
                        </div>
                        <p class="text-sm text-green-600 mb-4">Check all patient bills.</p>
                        <a href="{{ route('view.bills') }}" class="btn btn-secondary bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                            View Bills
                        </a>
                    </div>

                    <!-- Schedule Appointment -->
                    <div class="bg-indigo-100 border border-indigo-300 rounded-lg p-6 shadow hover:shadow-lg transition transform hover:scale-105">
                        <div class="flex items-center mb-4">
                            <div class="bg-indigo-500 text-white rounded-full p-4">
                                <i class="fas fa-calendar-alt text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-indigo-800 ml-4">Appointment Hub</h3>
                        </div>
                        <p class="text-sm text-indigo-600 mb-4">See and manage appointments.</p>
                        <a href="{{ route('view.appointments') }}" class="btn btn-info bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">
                            View Appointments
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
