<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>تقرير المبيعات</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            direction: rtl;
        }

        @media print {

            i.fas,
            i.fab {
                display: none !important;
            }
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 30px;
            table-layout: fixed;
            /* ✅ Force equal column widths */
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            word-wrap: break-word;
            /* ✅ Allow wrapping */
            white-space: normal;
            text-align: center;
        }

        th {
            background: #f2f2f2;
        }

        i {
            margin-inline-end: 5px;
        }
    </style>
</head>


<body>
    <h3>تقرير المبيعات</h3>

    <table>
        <thead>
            <tr>
                <th>رقم الطلب</th>
                <th>رقم الحجز</th>
                <th>اسم الفني</th>
                <th>اسم العميل</th>
                <th>الخدمة</th>
                <th>عدد الخدمات</th>
                <th>المبلغ</th>
                <th>طريقة الدفع</th>
                <th>المنطقة</th>
                <th>التاريخ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $row)
            <tr>
                <td style="text-align: center;">{{ $row->id }}</td>
                <td style="text-align: center;">{{ $row->bookings->first()->id ?? '' }}</td>
                <td>{{ $row->bookings->first()?->visit?->group?->name_ar }}</td>
                <td>{{ $row->user?->first_name }} {{ $row->user?->last_name }}</td>
                <td>
                    @foreach($row->services as $service)
                    {{ $service->title_ar }}{{ !$loop->last ? ' | ' : '' }}
                    @endforeach
                </td>
                <td style="text-align: center;">{{ $row->services->count() }}</td>
                <td style="text-align: center;">{{ number_format(($row->total / 115 * 100), 2) }}</td>
                <td>
                    @php
                    $method = $row->transaction?->payment_method ?? 'visa';
                    $icons = [
                    'cache' => 'fas fa-money-bill-wave text-success',
                    'cash' => 'fas fa-money-bill-wave text-success',
                    'wallet' => 'fas fa-wallet text-info',
                    'mada' => 'fas fa-credit-card text-primary',
                    'visa' => 'fab fa-cc-visa text-primary',
                    ];
                    $titles = [
                    'cache' => 'دفع نقداً',
                    'cash' => 'دفع نقداً',
                    'wallet' => 'الدفع من المحفظة',
                    'mada' => 'دفع عبر مدى',
                    'visa' => 'دفع ببطاقة ائتمان (فيزا، ماستر كارد، إلخ)',
                    ];
                    $iconClass = $icons[$method] ?? 'fas fa-credit-card text-secondary';
                    $title = $titles[$method] ?? 'وسيلة دفع';
                    $label = __('api.payment_method_' . $method);
                    @endphp

                    {!! '<i class="' . $iconClass . '" title="' . $title . '"
                        style="font-size: 1.2em; transition: transform 0.3s;"
                        onmouseover="this.style.transform=\'scale(1.1)\';"
                        onmouseout="this.style.transform=\'scale(1)\';"></i> ' . $label !!}
                </td>

                <td>{{ $row->userAddress?->region?->title }}</td>
                <td style="text-align: center;">{{ $row->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        window.onload = function () {
            window.print();
        };
    </script>
</body>

</html>