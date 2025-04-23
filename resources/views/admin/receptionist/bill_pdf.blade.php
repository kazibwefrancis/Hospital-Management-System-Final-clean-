{{-- resources/views/admin/receptionist/bill_pdf.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $bill->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
            text-align: left;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 class="text-center">Invoice #{{ $bill->id }}</h1>
    <p><strong>Patient ID:</strong> {{ $bill->patient->patient_id }}</p>
    <p><strong>Patient Name:</strong> {{ $bill->patient->name }}</p>
    <p><strong>Issued Date:</strong> {{ $bill->issued_date->format('d M Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>Total Amount</th>
                <th>Amount Paid</th>
                <th>Payment Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ number_format($bill->total_amount, 2) }}</td>
                <td>{{ number_format($bill->amount_paid, 2) }}</td>
                <td>{{ ucfirst($bill->payment_status) }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>