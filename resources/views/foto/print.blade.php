<!DOCTYPE html>
<html>

<head>
    <title>Print Foto - {{ $kereta->nama_kereta }}</title>
    <style>
        @page {
            margin: 0px;
        }

        body {
            margin-top: 0.4cm;
            margin-left: 1cm;
            margin-right: 1cm;
            margin-bottom: 1cm;
            /* border: 1px solid black; */
        }

        * {
            font-family: Verdana, Arial, sans-serif;
            /* font-size: 0.9rem; */
        }

        h5 {
            font-size: 18px !important;
            font-weight: bold;
        }

        h5 {
            margin: 0px;
        }

        p {
            text-align: center;
            margin: 5px;
        }

        img {
            /* width: 100%; */
        }

        .photo {
            border: 1px solid black;
            padding: 18px;
            /* margin-top: 0.7px;
            margin-left: 8rem;
            margin-right: 8rem; */
            text-align: center;
            width: 355px;
            alignt-self: center;
            margin: auto;
        }

        .date {
            font-size: 10px;
            margin-top: 5px;
        }

        .page_break {
            page-break-before: always;
        }

        .small {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <table align="center" style="width: 100%;">
            <thead>
                <tr>
                    <th colspan="2" style="text-align: center;height:1.6cm">
                        <h5>DOKUMENTASI PERAWATAN HARIAN PERIODE {{ $bulan }} {{ $tahun }}</h5>
                        <h5>KERETA {{ strtoupper($kereta->nama_kereta) }}</h5>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($detail_harian as $item)
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <div class="photo">
                                @php
                                    $filePath = public_path('foto/' . $item->foto);
                                    $gambar = file_get_contents($filePath);
                                    $gambar = base64_encode($gambar);
                                    $gambar = 'data:image/jpeg;base64,' . $gambar;
                                @endphp
                                <img src="{{ $gambar }}" alt="{{ $item->nama_item }}" width="340px" height="265px"
                                    style="object-fit: fill">
                            </div>
                            <p class="small">{{ $item->nama_item }}</p>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <p>Tidak ada foto</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="page_break"></div>
        <table align="center" style="width: 100%;">
            <thead>
                <tr>
                    <th colspan="2" style="text-align: center;height:1.6cm">
                        <h5>DOKUMENTASI PERAWATAN {{ $detail_bulanan[0]->p }} PERIODE {{ $bulan }}
                            {{ $tahun }}</h5>
                        <h5>KERETA {{ strtoupper($kereta->nama_kereta) }}</h5>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($detail_bulanan as $item)
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <div class="photo">
                                @php
                                    $filePath = public_path('foto/' . $item->foto);
                                    $gambar = file_get_contents($filePath);
                                    $gambar = base64_encode($gambar);
                                    $gambar = 'data:image/jpeg;base64,' . $gambar;
                                @endphp
                                <img src="{{ $gambar }}" alt="{{ $item->nama_item }}" width="340px"
                                    height="265px" style="object-fit: fill">
                            </div>
                            <p class="small">{{ $item->nama_item }}</p>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <p>Tidak ada foto</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>
