<table style="text-align: right; font-family: 'Tahoma', sans-serif;">
    <thead>
        <tr style="background-color: #f3f3f3; font-weight: bold;">
            <th>التاريخ</th>
            <th>المنطقة</th>
            <th>طريقة الدفع</th>
            <th>المبلغ</th>
            <th>عدد الخدمات</th>
            <th>الخدمة</th>
            <th>اسم العميل</th>
            <th>اسم الفني</th>
            <th>رقم الحجز</th>
            <th>رقم الطلب</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $row)
        <tr>
            <td style="text-align: center;">{{ $row->created_at->format('Y-m-d') }}</td>
            <td>{{ $row->userAddress?->region?->title }}</td>
            <td>{{ __('api.payment_method_' . ($row->transaction?->payment_method ?? 'visa')) }}</td>
            <td style="text-align: center;">{{ number_format(($row->total / 115 * 100), 2) }}</td>
            <td style="text-align: center;">{{ $row->services->count() }}</td>
            <td>
                @foreach($row->services as $service)
                {{ $service->title_ar }}{{ !$loop->last ? ' | ' : '' }}
                @endforeach
            </td>
            <td>{{ $row->user?->first_name }} {{ $row->user?->last_name }}</td>
            <td>{{ $row->bookings->first()?->visit?->group?->name_ar }}</td>
            <td style="text-align: center;">{{ $row->bookings->first()->id ?? '' }}</td>
            <td style="text-align: center;">{{ $row->id }}</td>
        </tr>
        @endforeach
    </tbody>
</table>