@extends('master')
@section('dashboard')
<div class="panel">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Müşteri Adı Soyadı</th>
                    <th>Müşteri Telefon</th>
                    <th>SMS Gönderim Tarihi</th>
                    <th>SMS Durum</th>
                </tr>
            </thead>
            <tbody>
                @foreach(array_reverse($smsGonderimleri) as $index => $sms)
                    <tr>
                        <td>{{ count($smsGonderimleri) - $index }}</td>
                        <td class="whitespace-nowrap">{{ $sms['customerName'] }}</td>
                        <td>{{ $sms['phoneNumber'] }}</td>
                        <td>{{ $sms['date'] }}</td>
                        <td>
                            @if ($sms['status'] == 'success')
                                <span class="badge whitespace-nowrap badge-outline-primary">Gönderim Başarılı</span>
                            @else
                                <span class="badge whitespace-nowrap badge-outline-danger">SMS Gönderilemedi</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
