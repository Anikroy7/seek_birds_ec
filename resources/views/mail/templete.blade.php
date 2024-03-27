<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        /* General styles */
        body {
            font-family: sans-serif;
        }

        .max-w-xl {
            max-width: 36rem;
        }

        .p-4 {
            padding: 1rem;
        }

        .text-2xl {
            font-size: 1.5rem;
        }

        .font-bold {
            font-weight: bold;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .border {
            border-width: 1px;
            border-style: solid;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        .overflow-hidden {
            overflow: hidden;
        }

        .divide-y>*:not(:last-child) {
            border-bottom-width: 1px;
            border-bottom-style: solid;
        }

        /* Table styles */
        .min-w-full {
            min-width: 100%;
        }

        .divide-y>*:not(:last-child) {
            border-bottom-width: 1px;
            border-bottom-style: solid;
        }

        .bg-gray-50 {
            background-color: #f9fafb;
        }

        .text-left {
            text-align: left;
        }

        .font-medium {
            font-weight: 500;
        }

        .text-gray-500 {
            color: #6b7280;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .tracking-wider {
            letter-spacing: 0.05em;
        }

        /* Image styles */
        .h-24 {
            height: 6rem;
        }

        /* Input styles */
        .border {
            border-width: 1px;
            border-style: solid;
        }

        .text-center {
            text-align: center;
        }

        .font-semibold {
            font-weight: 600;
        }

        /* Thank you message */
        .text-red-500 {
            color: #ee7a37;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th {
            background: #ccc;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        tr:nth-child(even) {
            background: #efefef;
        }

        tr:hover {
            background: #d1d1d1;
        }
    </style>
</head>

<body>
    <div class="max-w-xl mx-auto p-4" style="color: black">
        <h1 class="text-2xl font-bold mb-4 text-red-500">Order Confirmation</h1>
        <p class="mb-4">Dear {{ $data['customerName'] }},</p>

        <p class="mb-4">Thank you for your order! Below are the details of your purchase:</p>

        <h4 style="text-align: center;">Customer Details</h4>
        <table class="my_table">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile No.</th>
                <th>Address</th>
            </tr>
            <tr>
                <td>{{ $data['customerName'] }}</td>
                <td>{{ $data['cus_email'] }}</td>
                <td>{{ $data['cus_phone'] }}</td>
                <td>{{ $data['cus_address'] }}</td>
            </tr>
        </table>
        <h4 style="text-align: center; margin: 20px 0;">Products Details</h4>
        <div class="border border-gray-200 rounded-lg overflow-hidden mb-4 p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Product</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Quantity</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Price/pcs</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($data['products'] as $item)
                        <tr>
                            <td class="px-4 py-2 whitespace-nowrap">
                                <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5 shadow-sm my-3">
                                    <div class="flex w-2/5 ">
                                        <div class="w-20">
                                            <img class="h-24" src="{{ $item->image_url }}" alt="">
                                        </div>
                                        <div class="flex flex-col justify-between ml-4 flex-grow">
                                            <span class="font-bold text-sm">{{ $item->title }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $data['items'][$item->id] }}</td>
                            <td class="px-4 py-2 whitespace-nowrap ">{{ $item->current_price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <p class="mb-4 ">Total Amount: <strong
                style="font-size: 20px text-red-500">${{ $data['totalAmount'] }}</strong></p>

        <p class="mb-4">Thank you for shopping with us! Contact with us for any issues: <span
                style="color: rgb(74, 74, 243); text-decoration: underline">01744198060</span></p>
    </div>
</body>

</html>
