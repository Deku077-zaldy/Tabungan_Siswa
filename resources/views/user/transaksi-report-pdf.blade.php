<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #334155; line-height: 1.4; }
        .header { background: #eff6ff; padding: 20px; text-align: center; border-radius: 10px; border: 1px solid #bfdbfe; margin-bottom: 20px; }
        .header h2 { margin: 0; color: #1e40af; font-size: 18px; text-transform: uppercase; }
        .info { margin-bottom: 20px; width: 100%; }
        .info td { padding: 3px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background-color: #3b82f6; color: white; padding: 10px 8px; border: 1px solid #2563eb; }
        td { padding: 8px; border: 1px solid #e2e8f0; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .bg-gray { background: #f8fafc; font-weight: bold; }
        .footer { margin-top: 30px; text-align: right; font-size: 11px; color: #64748b; }
        .total-section { margin-top: 20px; float: right; width: 300px; }
        .total-row { display: flex; justify-content: space-between; padding: 5px 0; border-bottom: 1px solid #e2e8f0; }
    </style>
</head>
<body>

    <div class="header">
        <h2>Laporan Riwayat Transaksi Tabungan</h2>
        <p style="margin: 5px 0 0 0; color: #60a5fa;">Periode: {{ \Carbon\Carbon::parse($start_date)->translatedFormat('d M Y') }} - {{ \Carbon\Carbon::parse($end_date)->translatedFormat('d M Y') }}</p>
    </div>

    <table class="info">
        <tr>
            <td style="width: 15%;"><strong>Nama Siswa</strong></td>
            <td style="width: 2%;">:</td>
            <td>{{ $siswa->nama }}</td>
            <td style="width: 15%;"><strong>Kelas</strong></td>
            <td style="width: 2%;">:</td>
            <td>{{ $siswa->kelas }}</td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th style="width: 15%;">Tanggal</th>
                <th style="width: 25%;">Keterangan</th>
                <th style="width: 20%;">Debit (Masuk)</th>
                <th style="width: 20%;">Kredit (Keluar)</th>
                <th style="width: 20%;">Saldo</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-gray">
                <td colspan="2" class="text-center">SALDO AWAL PERIODE</td>
                <td class="text-right">-</td>
                <td class="text-right">-</td>
                <td class="text-right">Rp {{ number_format($saldoAwal, 0, ',', '.') }}</td>
            </tr>

            @php $currentSaldo = $saldoAwal; @endphp
            @foreach ($transaksi as $t)
                @php
                    if($t->jenis == 'setor') {
                        $currentSaldo += $t->jumlah;
                    } else {
                        $currentSaldo -= $t->jumlah;
                    }
                @endphp
                <tr>
                    <td class="text-center">{{ \Carbon\Carbon::parse($t->tanggal)->format('d/m/Y') }}</td>
                    <td>{{ ucfirst($t->jenis) }} Tabungan</td>
                    <td class="text-right text-blue">
                        {{ $t->jenis == 'setor' ? 'Rp '.number_format($t->jumlah, 0, ',', '.') : '-' }}
                    </td>
                    <td class="text-right" style="color: #e11d48;">
                        {{ $t->jenis == 'tarik' ? 'Rp '.number_format($t->jumlah, 0, ',', '.') : '-' }}
                    </td>
                    <td class="text-right" style="font-weight: bold;">
                        Rp {{ number_format($currentSaldo, 0, ',', '.') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        <table style="width: 40%; margin-left: auto; border: none;">
            <tr>
                <td style="border: none;">Total Setoran</td>
                <td style="border: none;" class="text-right">Rp {{ number_format($transaksi->where('jenis','setor')->sum('jumlah'), 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td style="border: none;">Total Penarikan</td>
                <td style="border: none;" class="text-right">Rp {{ number_format($transaksi->where('jenis','tarik')->sum('jumlah'), 0, ',', '.') }}</td>
            </tr>
            <tr style="font-weight: bold; background: #eff6ff;">
                <td style="border: none; color: #1e40af;">Saldo Akhir</td>
                <td style="border: none; color: #1e40af;" class="text-right">Rp {{ number_format($currentSaldo, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <p>Dicetak pada: {{ now()->translatedFormat('d F Y H:i') }}</p>
        <p><em>Dokumen ini sah dan dihasilkan otomatis oleh sistem tabungan.</em></p>
    </div>

</body>
</html>