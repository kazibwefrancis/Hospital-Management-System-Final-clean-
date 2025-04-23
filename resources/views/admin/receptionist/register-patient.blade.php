{{-- resources/views/admin/receptionist/register-patient.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register Patient') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Register a New Patient</h1>

                <!-- Display Success Message -->
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Display Error Message -->
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Patient Registration Form -->
                <form action="{{ route('save.patient') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="form-label font-semibold">Name:</label>
                        <input type="text" id="name" name="name" class="form-control w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label font-semibold">Email:</label>
                        <input type="email" id="email" name="email" class="form-control w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="form-label font-semibold">Phone:</label>
                        <input type="text" id="phone" name="phone" class="form-control w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
                    </div>
                    <div class="mb-4">
                        <label for="gender" class="form-label font-semibold">Gender:</label>
                        <select id="gender" name="gender" class="form-control w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="date_of_birth" class="form-label font-semibold">Date of Birth:</label>
                        <input type="date" id="date_of_birth" name="date_of_birth" class="form-control w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300" required>
                    </div>
                    <div class="mb-4">
                        <label for="address" class="form-label font-semibold">Address:</label>
                        <textarea id="address" name="address" class="form-control w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">
                        Register Patient
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>