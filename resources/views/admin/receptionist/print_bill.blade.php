{{-- resources/views/receptionist/print-bill.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Print Bill') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <h1>Bill Details</h1>
                <p><strong>Bill ID:</strong> {{ $bill->id }}</p>
                <p><strong>Patient Name:</strong> {{ $bill->patient_name }}</p>
                <p><strong>Amount:</strong> {{ $bill->amount }}</p>
                <p><strong>Date:</strong> {{ $bill->created_at }}</p>
                <button onclick="window.print()" class="btn btn-primary">Print</button>
            </div>
        </div>
    </div>
</x-app-layout>