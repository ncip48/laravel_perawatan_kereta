<!DOCTYPE html>
<html>

<head>
    <title>Checksheet - {{ $detail->nama_kereta }}</title>
    <style>
        /* CSS untuk styling lembar list */
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            /* margin-top: 0.5cm;
            margin-bottom: 0.3cm; */
        }

        @page {
            margin-top: 0.5cm;
            margin-bottom: 0.5cm;
            margin-left: 0.5cm;
            margin-right: 0.5cm;
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
            /* border: 1px solid #ccc; */
            padding: 2px;
            text-align: left;
            font-size: 10px;
        }

        .kelas {
            border-collapse: separate;
            border-spacing: 0 0px;
        }

        th {
            /* background-color: #f2f2f2; */
            text-align: center;
        }

        td>.underline {
            display: inline-block;
            border-bottom: 2px solid black;
        }

        .header-table {
            /* margin-bottom: 20px; */
        }

        .logo-container {
            display: flex;
            flex-direction: column;
            margin-bottom: 5px;
            /* background-color: aquamarine */
        }

        .logo-container img {
            margin-bottom: 2px;
        }

        .icon {
            width: 12px;
        }

        /* .page-break {
            page-break-before: always;
        } */

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

        /* @page {
            margin-top: 0.3cm;
            margin-bottom: 2.5cm;
        }

        @page :first {
            margin-top: 0.3cm;
            header: first-page-header;
        }

        @page :header {
            content: "DOKUMENTASI PERAWATAN HARIAN PERIODE SEPTEMBER 2023\n{{ $detail->nama_kereta }}";
            margin-top: 0.3cm;
        }

        @page :nth-child(n+4) {
            header: third-page-header;
            margin-top: 0.3cm;
        }

        @page :nth-child(2) {
            header: no-header;
        }

        @page fourth-page {
            margin-top: 5cm;
            content: "Header on the fourth page content";
        } */

        /* .header-on-fourth-page {
            position: unset;
            ;
            top: 0;
            left: 1cm;
            right: 1cm;
            height: 5cm;
        } */

        .bordered tr,
        .bordered td,
        .bordered th {
            border-bottom: 1px solid black;
        }

        .bordered td:first-child,
        .bordered td:nth-child(2),
        .bordered td:nth-child(3) {
            border-right: 1px solid black;
        }

        .tgl tr,
        .tgl td {
            border: none !important;
            font-size: 10px;
        }

        h3 {
            margin-bottom: 0px !important
        }
    </style>
</head>

<body>
    <div style="border: 1px solid black;">
        <div class="header-table">
            <table class="bordered">
                <tr>
                    <td class="padding" style="width:8rem;text-align: center;"">
                        <img src="https://imsservice.co.id/assets/inka-border.png" alt="Logo PT IMSS"
                            style="height: 35px;">
                    </td>
                    <td class="padding" style="width:14rem;padding-left:25px;padding-right:25px">
                        <h3 class="text" style="font-size: 13px">
                            CHECKSHEET PERAWATAN {{ $detail->nama_kereta }}
                        </h3>
                    </td>
                    <td class="padding" style="padding-left:10px;padding-right:10px;width:4rem;">
                        <h3 class="text" style="font-size: 13px">
                            {{ $detail->tipe == '0' ? 'HARIAN' : "BULANAN ($detail->p)" }}
                        </h3>
                    </td>
                    <td style="padding:0px!important">
                        <table class="tgl">
                            <tr style="border-bottom: 1px solid black!important;padding-bottom:5px">
                                <td style="text-align: left;width: 7rem;height:15px">Tgl. Pemeriksaan</td>
                                <td>:</td>
                                <td>{{ $detail->tanggal }} {{ $detail->jam }}</td>
                            </tr>
                            <tr style="border-bottom: 1px solid black!important;padding-bottom:5px">
                                <td style="text-align: left;width: 7rem;height:15px">No. Rangkaian Kereta</td>
                                <td>:</td>
                                <td>{{ $detail->no_kereta }}</td>
                            </tr>
                            <tr>
                                <td style="text-align: left;width: 7rem;height:15px">Jam Engine</td>
                                <td>:</td>
                                <td>{{ $detail->jam_engine }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <table class="kelas" style="margin-top:5px;padding-left:10px;padding-right:10px">
            <thead>
                <tr>
                    {{-- <th style="text-align: center;" rowspan="2">No</th> --}}
                    <th style="text-align: center" rowspan="2" colspan="2">Item Perawatan dan
                        Pengecekan</th>
                    <th style="text-align: center;" rowspan="2">Standar</th>
                    @foreach ($cars as $car)
                        <th style="text-align: center;padding-right:11px" colspan="3">{{ $car }}</th>
                    @endforeach
                    {{-- <th style="text-align: center;" rowspan="2"></th> --}}
                </tr>
                <tr>
                    @foreach ($cars as $car)
                        <th style="text-align: center;width:10px">OK</th>
                        <th style="text-align: center;width:10px">NG</th>
                        <th style="width:2px"></th>
                    @endforeach
                </tr>
            </thead>
            @foreach ($categories as $key => $category)
                <tbody>
                    <tr>
                        <td style="font-weight:bold;" colspan="{{ count($cars) * 2 + 3 }}">
                            {{ $key + 1 }}. {{ $category->nama }}
                        </td>
                    </tr>
                    @forelse ($category->lists as $key => $list)
                        <tr>
                            <td style="text-align: right;width:1.3rem;padding-right:5px">
                                {{ chr(96 + $loop->iteration) }}.</td>
                            <td style="width:18rem">{{ $list->nama_item }}</td>
                            <td>
                                @if ($list->standar == null)
                                @else
                                    - {{ $list->standar }}
                                @endif
                            </td>
                            @if ($list->car_index == null)
                                <td colspan="3" class="text-center"></td>
                            @else
                                @if ($list->is_empty_border)
                                    @foreach ($cars as $key => $car)
                                        @if (in_array($key, json_decode($list->car_index)))
                                            <td style="text-center;border: 1px solid black; border-right: none;">
                                            </td>
                                            <td style="text-center;border: 1px solid black;">
                                            </td>
                                            <td></td>
                                        @else
                                            <td colspan="3" class="text-center"></td>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach ($cars as $key => $car)
                                        @if ($list->detail->where('car', $key)->first() == null)
                                            <td colspan="3" class="text-center"></td>
                                        @else
                                            <td style="text-align: center;border: 1px solid black;border-right:none">
                                                @if ($list->detail->where('car', $key)->first()->hasil == '1')
                                                    {{-- <img class="icon"
                                                        src="templates/source/assets/images/check-symbol.png"
                                                        alt=""> --}}
                                                    <div style="background-color: black; height: 12px;">
                                                    </div>
                                                @endif
                                            </td>
                                            <td style="text-align: center;border: 1px solid black">
                                                @if ($list->detail->where('car', $key)->first()->hasil == '0')
                                                    {{-- <img class="icon"
                                                        src="templates/source/assets/images/check-symbol.png"
                                                        alt=""> --}}
                                                    <div style="background-color: black; height: 12px;">
                                                    </div>
                                                @endif
                                            </td>
                                            <td></td>
                                        @endif
                                    @endforeach
                                @endif
                            @endif

                            {{-- <td>{{ $list->detail->first()->keterangan ?? '' }}</td>= --}}
                        </tr>
                        <tr>
                            <td style="height:2px"></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ count($cars) * 2 + 3 }}" style="text-align: center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            @endforeach
        </table>
        <table class="kelas" style="margin-top:5px">
            <tr style="border-top: 1px solid black!important;">
                {{-- <td style="text-align: right;width:1.8rem;border-top: 1px solid black!important;">
                </td> --}}
                <td style="border-top: 1px solid black!important;padding-left:13px">
                    <h4 style="padding:0px;margin:0px;font-size:13px">Kesimpulan</h4>
                </td>
            </tr>
            <tr>
                {{-- <td style="text-align: right;width:1.8rem">
                </td> --}}
                <td style="padding-left: 13px">
                    <h4 style="font-size:10px;font-weight:normal;padding:0px;margin:0px">- Berdasarkan hasil
                        pemeriksaan,
                        maka sarana tersebut
                        diatas
                        dinyatakan :
                        @if (isset($detail->is_so))
                            @if ($detail->is_so == 1)
                                SO
                            @elseif($detail->is_so == 0)
                                TSO
                            @endif
                        @else
                            SO/TSO
                        @endif
                    </h4>
                </td>
            </tr>
        </table>
        <table class="kelas" style="margin-top:5px">
            <tr style="border-top: 1px solid black!important;">
                {{-- <td style="text-align: right;width:1.8rem;border-top: 1px solid black!important;">
                </td> --}}
                <td style="border-top: 1px solid black!important;padding-left:13px">
                    <h4 style="padding:0px;margin:0px;font-size:13px">Keterangan</h4>
                </td>
            </tr>
            <tr>
                {{-- <td style="text-align: right;width:1.8rem">
                </td> --}}
                <td style="padding-left: 13px">
                    <h4 style="font-size:10px;font-weight:normal;padding:0px;margin:0px">- Pemeriksaan dilakukan saat
                        engine hidup
                    </h4>
                </td>
            </tr>
        </table>
        <table class="kelas" style="margin-top:5px;margin-bottom:10px;">
            <tr>
                <td style="height:10px;border-top: 1px solid black!important;padding-left:13px""></td>
            </tr>
            <tr>
                <td style="padding-left:13px">
                    <table>
                        <tr style="text-align: center;">
                            <td style="text-align: center;">Mengetahui:</td>
                            <td style="text-align: center;">SPV RUAS LUAR</td>
                            {{-- <td>PM PERAWATAN KA</td> --}}
                            <td style="text-align: center;">TEKNISI</td>
                        </tr>
                        <tr style="text-align: center;">
                            <td style="text-align: center;">Assman. UPT Depo Lok Solo</td>
                            <td style="text-align: center;">UPT Depo Lok Solo</td>
                            {{-- <td>PT Inka Multi Solusi service</td> --}}
                            <td style="text-align: center;">PT Inka Multi Solusi service</td>
                        </tr>
                        <tr style="text-align: center;">
                            <td style="height: 75px;text-align: center;">
                                @if (isset($detail->assman))
                                    @php $sign_assman = $detail->assman->nip . '|' . $detail->assman->name @endphp
                                    <img src="data:image/png;base64, {!! base64_encode(QrCode::size(70)->generate($sign_assman)) !!} ">
                                @else
                                @endif
                            </td>
                            <td style="height: 75px;text-align: center;">
                                @if (isset($detail->upt))
                                    @php $sign_upt = $detail->upt->nip . '|' . $detail->upt->name @endphp
                                    <img src="data:image/png;base64, {!! base64_encode(QrCode::size(70)->generate($sign_upt)) !!} ">
                                @else
                                    -
                                @endif
                            </td>
                            <td style="text-align: center;">
                                @php $sign_teknisi = $detail->teknisi->nip . '|' . $detail->teknisi->name @endphp
                                <img src="data:image/png;base64, {!! base64_encode(QrCode::size(70)->generate($sign_teknisi)) !!} ">
                            </td>
                        </tr>
                        <tr style="text-align: center;">
                            <td style="text-align: center;"><span class="underline">
                                    @if (isset($detail->assman))
                                        {{ $detail->assman->name }}
                                    @else
                                    @endif
                                </span></td>
                            <td style="text-align: center;"><span class="underline">
                                    @if (isset($detail->upt))
                                        {{ $detail->upt->name }}
                                    @else
                                    @endif
                                </span></td>
                            {{-- <td><span class="underline">____________</span> </td> --}}
                            <td style="text-align: center;"><span class="underline">{{ $detail->teknisi->name }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;text-align: center">NIP. @if (isset($detail->assman))
                                    {{ $detail->assman->nip }}
                                @else
                                    -
                                @endif
                            </td>
                            <td style="vertical-align: top;text-align: center"> NIP. @if (isset($detail->upt))
                                    {{ $detail->upt->nip }}
                                @else
                                    -
                                @endif
                            </td>
                            <td style="vertical-align: top;text-align: center"> NIP. {{ $detail->teknisi->nip }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>
