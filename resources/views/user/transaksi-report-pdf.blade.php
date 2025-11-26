<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
            color: #475569;
            line-height: 1.5;
        }

        /* Header Box */
        .header {
            background: #dbeafe;
            padding: 15px;
            text-align: center;
            border-radius: 8px;
            border: 1px solid #bfdbfe;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            color: #1e40af;
            font-size: 20px;
            font-weight: bold;
        }

        .header p {
            margin: 2px 0;
            color: #3b82f6;
        }

        /* Info Box */
        .info {
            border: 1px solid #d1d5db;
            padding: 12px;
            border-radius: 6px;
            background: #f8fafc;
            margin-bottom: 20px;
        }

        .info p {
            margin: 4px 0;
            font-size: 14px;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background-color: #3b82f6;
            color: white;
            padding: 8px;
            font-weight: bold;
            border: 1px solid #2563eb;
        }

        td {
            padding: 8px;
            border: 1px solid #e2e8f0;
        }

        tr:nth-child(even) {
            background: #f1f5f9;
        }

        .text-right {
            text-align: right;
        }

        /* Total Box */
        .total-box {
            margin-top: 20px;
            padding: 12px;
            border-radius: 6px;
            width: 270px;
            border: 1px solid #bfdbfe;
            background: #eff6ff;
        }

        .total-box p {
            margin: 4px 0;
            font-size: 14px;
        }

        /* Footer */
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 12px;
            color: #475569;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <div class="header">
        <h2>LAPORAN TRANSAKSI TABUNGAN</h2>
        <p>Sistem Tabungan Siswa</p>
    </div>

    <!-- INFO -->
    <div class="info">
        <p><strong>Nama Siswa:</strong> {{ $siswa->nama }}</p>
        <p><strong>Kelas:</strong> {{ $siswa->kelas }}</p>
        <p><strong>Bulan:</strong> {{ \Carbon\Carbon::parse($bulan . '-01')->translatedFormat('F Y') }}</p>
    </div>

    <!-- TABLE -->
    <table>
        <thead>
            <tr>
                <th style="width: 25%;">Tanggal</th>
                <th style="width: 35%;">Jenis Transaksi</th>
                <th class="text-right" style="width: 20%;">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $t)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($t->tanggal)->format('d-m-Y') }}</td>
                    <td>
                        {{ ucfirst($t->jenis) }}
                    </td>
                    <td class="text-right">
                        Rp {{ number_format($t->jumlah, 0, ',', '.') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- TOTAL -->
    <div class="total-box">
        <p><strong>Total Masuk:</strong><br>
            Rp {{ number_format($transaksi->where('jenis','setor')->sum('jumlah'), 0, ',', '.') }}
        </p>

        <p><strong>Total Keluar:</strong><br>
            Rp {{ number_format($transaksi->where('jenis','tarik')->sum('jumlah'), 0, ',', '.') }}
        </p>

        <p><strong>Saldo Akhir:</strong><br>
            Rp {{ number_format(
                $transaksi->where('jenis','setor')->sum('jumlah')
                -
                $transaksi->where('jenis','tarik')->sum('jumlah'),
            0, ',', '.') }}
        </p>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        <p>{{ now()->translatedFormat('d F Y') }}</p>
        <p><em>Dokumen ini dihasilkan secara otomatis oleh sistem.</em></p>
    </div>

</body>

</html>
