<?php

namespace App\Http\Controllers;

use App\Models\Checksheet;
use App\Models\Detail_checksheet;
use App\Models\Foto;
use App\Models\Item_checksheet;
use App\Models\Kategori_checksheet;
use App\Models\Kereta;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use iio\libmergepdf\Merger;

class ChecksheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $active = 'master_checksheet';
        $checksheets = Checksheet::select('checksheet.*', 'master_kereta.nama_kereta', 'users.name')
            ->join('master_kereta', 'checksheet.id_kereta', '=', 'master_kereta.id')
            ->join('users', 'checksheet.id_user', '=', 'users.id')
            ->OrderBy('checksheet.created_at', 'desc')
            ->get();
        $detail = Foto::select('foto.*', 'detail_checksheet.*', 'item_checksheet.*', 'checksheet.*', 'master_kereta.nama_kereta', 'checksheet.date_time as datetime')
            ->join('detail_checksheet', 'foto.id_detail', '=', 'detail_checksheet.id')
            ->join('item_checksheet', 'detail_checksheet.id_item_checksheet', '=', 'item_checksheet.id')
            ->join('checksheet', 'detail_checksheet.id_checksheet', '=', 'checksheet.id')
            ->join('master_kereta', 'checksheet.id_kereta', '=', 'master_kereta.id')
            // ->where('checksheet.id', '=', 'detail_checksheet.id_checksheet')
            ->get();
        $keretas = Kereta::all();
        // dump($checksheets);
        return view('master_checksheet.checksheet.index', compact('active', 'checksheets', 'keretas', 'detail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $active = 'master_checksheet';
        $keretas = Kereta::all();
        return view('master_checksheet.checksheet.add', compact('active', 'keretas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'id_kereta' => 'required',
            'date_time' => 'required',
            'no_kereta' => 'required',
            'tipe' => 'required',
            'jam_engine' => 'required'
        ], [
            'id_kereta.required' => 'Nama kereta tidak boleh kosong',
            'date_time.required' => 'Tanggal tidak boleh kosong',
            'no_kereta.required' => 'No kereta tidak boleh kosong',
            'tipe.required' => 'Tipe tidak boleh kosong',
            'jam_engine.required' => 'Jam engine tidak boleh kosong'
        ]);

        Checksheet::create($request->all());
        return redirect()->route('checksheet.index')->with('status', 'Data Checksheet berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $detail = Checksheet::select('checksheet.*', 'master_kereta.nama_kereta')
            ->join('master_kereta', 'checksheet.id_kereta', '=', 'master_kereta.id')
            ->where('checksheet.id', $id)
            ->first();
        $categories = Kategori_checksheet::where('id_kereta', $detail->id_kereta)->get();
        $categories = $categories->map(function ($item) use ($id, $detail) {
            $items = Item_checksheet::where('id_kategori_checksheet', $item->id)->where('id_kereta', $detail->id_kereta);
            if ($detail->tipe == 0) {
                $items = $items->where('harian', "1");
            } else {
                if ($detail->p == "P1") {
                    $items = $items->where('p1', "1");
                } else if ($detail->p == "P3") {
                    $items = $items->where('p3', "1");
                } else if ($detail->p == "P6") {
                    $items = $items->where('p6', "1");
                } else if ($detail->p == "P12") {
                    $items = $items->where('p12', "1");
                }
            }
            $items = $items->get();
            $item->lists = $items->map(function ($item) use ($id) {
                $detail = Detail_checksheet::where('id_item_checksheet', $item->id)->where('id_checksheet', $id)->first();
                $item->dilakukan = $detail->dilakukan ?? null;
                $item->hasil = $detail->hasil ?? null;
                $item->keterangan = $detail->keterangan ?? null;
                return $item;
            });
            return $item;
        });

        $active = 'master_checksheet';

        return view('master_checksheet.checksheet.detail', compact('active', 'detail', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $active = 'master_checksheet';
        $keretas = Kereta::all();
        $checksheets = Checksheet::find($id);
        return view('master_checksheet.checksheet.edit', compact('active', 'keretas', 'checksheets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'id_kereta' => 'required',
            'date_time' => 'required',
            'no_kereta' => 'required',
            'tipe' => 'required',
            'jam_engine' => 'required'
        ], [
            'id_kereta.required' => 'Nama kereta tidak boleh kosong',
            'date_time.required' => 'Tanggal tidak boleh kosong',
            'no_kereta.required' => 'No kereta tidak boleh kosong',
            'tipe.required' => 'Tipe tidak boleh kosong',
            'jam_engine.required' => 'Jam engine tidak boleh kosong'
        ]);

        Checksheet::where('id', $id)
            ->update([
                'id_kereta' => $request->id_kereta,
                'date_time' => $request->date_time,
                'no_kereta' => $request->no_kereta,
                'tipe' => $request->tipe,
                'jam_engine' => $request->jam_engine
            ]);
        return redirect()->route('checksheet.index')->with('status', 'Data Checksheet berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Checksheet::destroy($id);
        return redirect()->route('checksheet.index')->with('status', 'Data Checksheet berhasil dihapus!');
    }

    public function print($id)
    {
        setlocale(LC_ALL, 'IND');
        //set locale for vps
        setlocale(LC_TIME, 'id_ID.utf8');
        Carbon::setLocale('id');

        $detail = Checksheet::select('checksheet.*', 'master_kereta.nama_kereta')
            ->join('master_kereta', 'checksheet.id_kereta', '=', 'master_kereta.id')
            ->where('checksheet.id', $id)
            ->first();
        $detail->tanggal = Carbon::parse($detail->date_time)->isoFormat('dddd, D MMMM Y');
        $detail->jam = Carbon::parse($detail->date_time)->isoFormat('HH:mm');
        $detail->teknisi = User::where('id', $detail->id_user)->first();

        $categories = Kategori_checksheet::where('id_kereta', $detail->id_kereta)->get();
        $categories = $categories->map(function ($item) use ($id, $detail) {
            $items = Item_checksheet::where('id_kategori_checksheet', $item->id)->where('id_kereta', $detail->id_kereta);
            if ($detail->tipe == 0) {
                $items = $items->where('harian', "1");
            } else {
                if ($detail->p == "P1") {
                    $items = $items->where('p1', "1");
                } else if ($detail->p == "P3") {
                    $items = $items->where('p3', "1");
                } else if ($detail->p == "P6") {
                    $items = $items->where('p6', "1");
                } else if ($detail->p == "P12") {
                    $items = $items->where('p12', "1");
                }
            }
            $items = $items->get();
            $item->lists = $items->map(function ($item) use ($id) {
                $detail = Detail_checksheet::where('id_item_checksheet', $item->id)->where('id_checksheet', $id)->first();
                $item->dilakukan = $detail->dilakukan ?? null;
                $item->hasil = $detail->hasil ?? null;
                $item->keterangan = $detail->keterangan ?? null;
                return $item;
            });
            return $item;
        });

        // return view('master_checksheet.checksheet.print', compact('detail', 'categories'));


        $pdf = Pdf::loadview('master_checksheet.checksheet.print', compact('detail', 'categories'));
        $pdf->setPaper('A4', 'potrait');
        $title = $detail->nama_kereta;
        return $pdf->stream($title . '.pdf');
    }

    public function filter($id)
    {
        $checksheets = Checksheet::select('checksheet.*', 'master_kereta.nama_kereta')
            ->join('master_kereta', 'checksheet.id_kereta', '=', 'master_kereta.id')->where('checksheet.id_kereta', $id)
            ->get();
        $keretas = Kereta::all();
        $active = 'master_checksheet';
        return view('master_checksheet.checksheet.index', compact('checksheets', 'keretas', 'active'));
    }

    public function report_so()
    {
        $detail = Checksheet::all();
        //groupBy date_time checksheet by month
        $detail = $detail->map(function ($item) {
            $item->bulan = Carbon::parse($item->date_time)->translatedFormat('F Y');
            return $item;
        });
        //group by but return array example [{month:1,year:2021},{month:2,year:2021}]
        $detail = $detail->groupBy('bulan')->map(function ($item) {
            return [
                'month' => Carbon::parse($item[0]->date_time)->month,
                'year' => Carbon::parse($item[0]->date_time)->year,
                'nama_bulan' => $item[0]->bulan,
            ];
        });
        //remove keys
        $detail = array_values($detail->toArray());
        //change to stdClass
        $detail = json_decode(json_encode($detail));
        $keretas = Kereta::all();
        $active = 'so';
        return view('so.index', compact('active', 'detail', 'keretas'));
    }

    public function print_report_so(Request $request)
    {
        //get bulan & tahun in query params
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $detail = Kereta::find(1);
        $detail->checksheet = Checksheet::whereMonth('date_time', $bulan)
            ->whereYear('date_time', $tahun)
            ->orderBy('id', 'asc')
            ->get();

        $detail->checksheet = $detail->checksheet->map(function ($item) {
            $item->tanggal = Carbon::parse($item->date_time)->translatedFormat('d F Y');

            return $item;
        });

        $bulan = strtoupper(Carbon::parse($detail->checksheet[0]->datetime)->translatedFormat('F'));
        $tahun = strtoupper(Carbon::parse($detail->checksheet[0]->datetime)->year);

        $active = 'Foto';
        // return view('so.print', compact('active', 'detail', 'bulan', 'tahun'));

        $availability_so = $detail->checksheet->where('is_so', "1")->count();
        $availability_tso = $detail->checksheet->where('is_so', "0")->count();

        $availability_so_p = ($availability_so / $detail->checksheet->count()) * 100;
        $availability_tso_p = ($availability_tso / $detail->checksheet->count()) * 100;

        $availability = [
            'so' => $availability_so,
            'tso' => $availability_tso,
            'so_p' => round($availability_so_p),
            'tso_p' => round($availability_tso_p),
        ];

        // dd($availability);

        $pdf = Pdf::loadView('so.print', compact('active', 'detail', 'bulan', 'tahun', 'availability'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('foto.pdf');
    }
}
