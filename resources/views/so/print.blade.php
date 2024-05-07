<!DOCTYPE html>
<html>

<head>
    <title>Laporan SO/TSO - {{ $detail->nama_kereta }} {{ $bulan }} {{ $tahun }}</title>
    <style>
        /* CSS untuk styling lembar list */
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            margin-top: 0.2cm;
            margin-bottom: 0.3cm;
            margin-left: 1.5cm;
        }

        @page {
            margin-top: 0.2cm;
            margin-bottom: 0.3cm;
            margin-left: 1.5cm;
            /* margin-right: 1.5cm; */
        }

        .text {
            text-transform: uppercase;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .kelas th,
        .kelas td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        td>.underline {
            display: inline-block;
            border-bottom: 2px solid black;
        }

        .header-table {
            margin-bottom: 20px;
        }

        .logo-container {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            margin-bottom: 5px;
            /* background-color: aquamarine */
        }

        .logo-container img {
            margin-bottom: 2px;
        }

        .icon {
            width: 28px;
        }

        .page-break {
            page-break-before: always;
        }

        header {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            height: 2cm;
        }

        h3 {
            text-align: center;
            margin-top: 0;
        }

        p {
            text-align: center;
            margin: 5px;
        }

        .container {
            margin-top: 1.8cm;
        }

        .photo img {
            width: 40%;
        }

        .photo {
            border: 1px solid black;
            padding: 8px;
            margin-top: 0.3cm;
            margin-left: 8rem;
            margin-right: 8rem;
            text-align: center;
        }

        .page_break {
            page-break-before: always;
        }
    </style>
</head>

<body>
    <div>
        <div class="logo-container">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Logo_PT_Kereta_Api_Indonesia_%28Persero%29_2020.svg/768px-Logo_PT_Kereta_Api_Indonesia_%28Persero%29_2020.svg.png"
                alt="Logo KAI" style="height: 40px;">
            <img src="https://imsservice.co.id/assets/inka-border.png" alt="Logo PT IMSS"
                style="height: 40px; margin-left: 30em;">
        </div>

        <h3 class="text" style="margin-top: 20px;margin-bottom:20px">
            Laporan Perawatan Harian dan Bulanan <br /> KA {{ $detail->nama_kereta }} {{ $bulan }}
            {{ $tahun }}
        </h3>

        <table class="kelas">
            <thead>
                <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Tanggal</th>
                    <th style="text-align: center;">Jenis Perawatan</th>
                    <th style="text-align: center;">Status Sarana</th>
                    <th style="text-align: center;">Keterangan</th>
                </tr>
            </thead>
            @foreach ($detail->checksheet as $key => $item)
                <tbody>
                    <tr>
                        <td style="border: 1px solid #ccc;text-align:center"> {{ $key + 1 }}
                        </td>
                        <td style="border: 1px solid #ccc;"> {{ $item->tanggal }}</td>
                        <td style="border: 1px solid #ccc;text-align:center">
                            {{ $item->tipe == '0' ? 'Harian' : $item->p }}
                        </td>
                        <td style="border: 1px solid #ccc;text-align:center">
                            @if (isset($item->is_so))
                                {{ $item->is_so == '1' ? 'SO' : 'TSO' }}
                            @else
                                -
                            @endif
                        </td>
                        <td style="border: 1px solid #ccc;text-align:center">

                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>

        <table style="margin-top: 2rem;margin-left:13rem">
            <tr style="text-align: center;">
                <td></td>
                <td></td>
                {{-- <td>PM PERAWATAN KA</td> --}}
                <td>Madiun, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</td>
            </tr>
            <tr style="text-align: center;">
                <td></td>
                <td></td>
                <td class="text">PT Inka Multi Solusi service</td>
            </tr>
            <tr>
                <td style="height: 75px"></td>
                <td style="height: 75px"></td>
                <td style="height: 75px"></td>
                <td style="height: 75px"></td>
            </tr>
            <tr style="text-align: center;">
                <td><span class="underline"></span></td>
                <td><span class="underline"></span></td>
                <td><span class="underline" style="font-weight: bold">HARI SUBEKTI</span></td>
            </tr>
            <tr>
                <td style="vertical-align: top;text-align: center"></td>
                <td style="vertical-align: top;text-align: center"></td>
                <td style="vertical-align: top;text-align: center"> Kepala Divisi Wilayah 2</td>
            </tr>
        </table>

        <div class="page_break"></div>
        <div class="logo-container">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Logo_PT_Kereta_Api_Indonesia_%28Persero%29_2020.svg/768px-Logo_PT_Kereta_Api_Indonesia_%28Persero%29_2020.svg.png"
                alt="Logo KAI" style="height: 40px;">
            <img src="https://imsservice.co.id/assets/inka-border.png" alt="Logo PT IMSS"
                style="height: 40px; margin-left: 30em;">
        </div>

        <h3 class="text" style="margin-top: 20px;margin-bottom:20px">
            Laporan Availability<br /> KA {{ $detail->nama_kereta }} {{ $bulan }}
            {{ $tahun }}
        </h3>

        <table class="kelas">
            <thead>
                <tr>
                    <th style="text-align: center;" colspan="3">Availability</th>
                    <th style="text-align: center;" colspan="2">Prosentase</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border: 1px solid #ccc;text-align:center;background-color:#f2f2f2;font-weight:bold">
                        Bulan
                    </td>
                    <td style="border: 1px solid #ccc;text-align:center;"> SO</td>
                    <td style="border: 1px solid #ccc;text-align:center;"> TSO</td>
                    <td style="border: 1px solid #ccc;text-align:center;"> SO</td>
                    <td style="border: 1px solid #ccc;text-align:center;"> TSO</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #ccc;text-align:center;background-color:#f2f2f2;font-weight:bold">
                        {{ $bulan }}
                    </td>
                    <td style="border: 1px solid #ccc;text-align:center;"> {{ $availability['so'] }}</td>
                    <td style="border: 1px solid #ccc;text-align:center;"> {{ $availability['tso'] }}</td>
                    <td style="border: 1px solid #ccc;text-align:center;"> {{ $availability['so_p'] }}%</td>
                    <td style="border: 1px solid #ccc;text-align:center;"> {{ $availability['tso_p'] }}%</td>
                </tr>
            </tbody>
        </table>

        <table style="margin-top: 2rem;margin-left:13rem">
            <tr style="text-align: center;">
                <td></td>
                <td></td>
                {{-- <td>PM PERAWATAN KA</td> --}}
                <td>Madiun, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</td>
            </tr>
            <tr style="text-align: center;">
                <td></td>
                <td></td>
                <td class="text">PT Inka Multi Solusi service</td>
            </tr>
            <tr>
                <td style="height: 75px"></td>
                <td style="height: 75px"></td>
                <td style="height: 75px"></td>
                <td style="height: 75px"></td>
            </tr>
            <tr style="text-align: center;">
                <td><span class="underline"></span></td>
                <td><span class="underline"></span></td>
                <td><span class="underline" style="font-weight: bold">HARI SUBEKTI</span></td>
            </tr>
            <tr>
                <td style="vertical-align: top;text-align: center"></td>
                <td style="vertical-align: top;text-align: center"></td>
                <td style="vertical-align: top;text-align: center"> Kepala Divisi Wilayah 2</td>
            </tr>
        </table>

    </div>

</body>

</html>
