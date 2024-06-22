<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Bill</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            width: 80%;
            margin: auto;
        }
        .bill-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .bill-info {
            margin-bottom: 20px;
        }
        .bill-info p {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        .total-section {
            margin-top: 20px;
            float: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="bill-header">
            <h2>Order Bill</h2>
        </div>

        <div class="bill-info">
            <p><strong>Order ID:</strong> {{ $order->id }}</p>
            <p><strong>Tanggal Pesanan:</strong> {{ $order->created_at->format('d/m/Y') }}</p>
            <p><strong>Nama Pemesan:</strong> {{ $order->user->fullname }}</p>
            <p><strong>Alamat:</strong> {{ $order->user->address }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    {{-- <th>Nama Produk</th> --}}
                    <th>Quantity</th>
                    <th>Harga Satuan</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        {{-- <td>{{ $order->product->name }}</td> --}}
                        <td>{{ $order->orderdetail->quantity }}</td>
                        <td>Rp.{{ number_format($order->orderdetail->price, 2) }}</td>
                        <td>Rp.{{ number_format($order->orderdetail->quantity * $order->orderdetail->price ,2)}}</td>
                    </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align: right;"><strong>Total Belanja:</strong></td>
                    <td>Rp.{{ number_format($order->total_amount, 2) }}</td>
                </tr>
            </tfoot>
        </table>

        {{-- <div class="total-section">
            <p><strong>Total Belanja:</strong> {{ $order->total_amount }}</p>
        </div> --}}
    </div>
</body>
</html>
<script type="text/javascript">
    window.print();
</script>
