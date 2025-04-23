{{-- resources/views/admin/receptionist/view_bills.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Bills') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-6 text-gray-700">All Bills</h1>

                <div class="overflow-x-auto">
                    <table class="table-auto w-full border-collapse border border-gray-300 rounded-lg shadow-md">
                        <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <tr>
                                <th class="py-3 px-6 text-left">Invoice ID</th>
                                <th class="py-3 px-6 text-left">Patient ID</th>
                                <th class="py-3 px-6 text-left">Patient Name</th>
                                <th class="py-3 px-6 text-left">Total Amount</th>
                                <th class="py-3 px-6 text-left">Amount Paid</th>
                                <th class="py-3 px-6 text-left">Payment Status</th>
                                <th class="py-3 px-6 text-left">Issued Date</th>
                                <th class="py-3 px-6 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-sm font-light">
                            @forelse($bills as $bill)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6">{{ $bill->id }}</td>
                                    <td class="py-3 px-6">{{ $bill->patient?->patient_id ?? 'N/A' }}</td>
                                    <td class="py-3 px-6">{{ $bill->patient?->name ?? 'N/A' }}</td>
                                    <td class="py-3 px-6">{{ number_format($bill->total_amount, 2) }}</td>
                                    <td class="py-3 px-6">{{ number_format($bill->amount_paid, 2) }}</td>
                                    <td class="py-3 px-6">
                                        <span class="px-2 py-1 rounded-full text-white {{ $bill->payment_status === 'paid' ? 'bg-green-500' : 'bg-yellow-500' }}">
                                            {{ ucfirst($bill->payment_status) }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-6">
                                        {{ $bill->issued_date ? \Carbon\Carbon::parse($bill->issued_date)->format('d M Y') : 'N/A' }}
                                    </td>
                                    <td class="py-3 px-6">
                                        <button onclick="window.print()" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                            Print
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="py-3 px-6 text-center text-gray-500">
                                        No bills found.
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