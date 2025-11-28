<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Penerima Sewaan Komputer Riba/Peribadi/AiO - {{ date('d/m/Y') }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 9px;
            color: #333;
            padding: 10px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #333;
        }
        
        .header h1 {
            font-size: 16px;
            margin-bottom: 3px;
            font-weight: bold;
        }
        
        .header p {
            font-size: 9px;
            color: #666;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        th {
            background-color: #e2e8f0;
            color: #1e293b;
            font-weight: bold;
            padding: 6px 4px;
            text-align: left;
            border: 1px solid #cbd5e1;
            font-size: 8px;
        }
        
        td {
            padding: 5px 4px;
            border: 1px solid #cbd5e1;
            vertical-align: top;
            font-size: 8px;
        }
        
        tr:nth-child(even) {
            background-color: #f8fafc;
        }
        
        .text-center {
            text-align: center;
        }
        
        .signature-cell {
            text-align: center;
            vertical-align: middle;
        }
        
        .signature-img {
            max-width: 80px;
            max-height: 40px;
            display: block;
            margin: 0 auto;
        }
        
        .status-received {
            color: #16a34a;
            font-weight: bold;
        }
        
        .status-pending {
            color: #dc2626;
            font-weight: bold;
        }
        
        .footer {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #cbd5e1;
            font-size: 8px;
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>LAPORAN PENERIMA SEWAAN KOMPUTER RIBA/PERIBADI/AIO</h1>
        <p>Tahun: {{ $year ?? date('Y') }} | Tarikh Eksport: {{ date('d/m/Y H:i') }}</p>
    </div>
    
    <table>
        <thead>
            <tr>
                <th style="width: 2%;">Bil</th>
                <th style="width: 12%;">Nama Penerima</th>
                <th style="width: 8%;">Jenis Aset</th>
                <th style="width: 7%;">Tarikh</th>
                <th style="width: 8%;">Device</th>
                <th style="width: 7%;">Adapter</th>
                <th style="width: 6%;">DVD</th>
                <th style="width: 6%;">Cord</th>
                <th style="width: 6%;">Dongle</th>
                <th style="width: 6%;">Mouse</th>
                <th style="width: 7%;">Monitor</th>
                <th style="width: 7%;">Keyboard</th>
                <th style="width: 6%;">UPS</th>
                <th style="width: 12%;">Tandatangan</th>
            </tr>
        </thead>
        <tbody>
            @php $bil = 1; @endphp
            @foreach($recipients as $recipient)
                @php $assetCount = $recipient->assets->count(); @endphp
                @foreach($recipient->assets as $index => $asset)
                <tr>
                    @if($index === 0)
                    <td rowspan="{{ $assetCount }}" class="text-center">{{ $bil++ }}</td>
                    <td rowspan="{{ $assetCount }}"><strong>{{ $recipient->nama }}</strong></td>
                    @endif
                    
                    <td>{{ $asset->jenis }}</td>
                    <td>{{ $asset->tarikh_penerimaan ? \Carbon\Carbon::parse($asset->tarikh_penerimaan)->format('d/m/Y') : '-' }}</td>
                    <td>{{ $asset->siri_device ?: '-' }}</td>
                    <td>{{ $asset->siri_adapter ?: '-' }}</td>
                    <td>{{ $asset->siri_dvd_drive ?: '-' }}</td>
                    <td>{{ $asset->siri_cord ?: '-' }}</td>
                    <td>{{ $asset->siri_dongle ?: '-' }}</td>
                    <td>{{ $asset->siri_mouse ?: '-' }}</td>
                    <td>{{ $asset->siri_monitor ?: '-' }}</td>
                    <td>{{ $asset->siri_keyboard ?: '-' }}</td>
                    <td>{{ $asset->siri_ups ?: '-' }}</td>
                    
                    @if($index === 0)
                    <td rowspan="{{ $assetCount }}" class="signature-cell">
                        @if($recipient->signature)
                            <img src="{{ $recipient->signature }}" alt="Signature" class="signature-img">
                            <div class="status-received">✓ DITERIMA</div>
                        @else
                            <div class="status-pending">✗ BELUM DITERIMA</div>
                        @endif
                    </td>
                    @endif
                </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
    
    <div class="footer">
        <p>Laporan dijana pada {{ date('d/m/Y H:i:s') }} | Jumlah Penerima: {{ $recipients->count() }}</p>
    </div>
</body>
</html>
