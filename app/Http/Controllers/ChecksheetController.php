<?php

namespace App\Http\Controllers;

use App\Models\Checksheet;
use App\Models\Detail_checksheet;
use App\Models\Foto;
use App\Models\Item_checksheet;
use App\Models\Kategori_checksheet;
use App\Models\Kereta;
use App\Models\Signature;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use iio\libmergepdf\Merger;
use Illuminate\Support\Facades\Auth;
use stdClass;
use Illuminate\Support\Str;

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

        $checksheets = $checksheets->map(function ($item) {
            $item->assman = User::find($item->id_approve_assman);
            $item->upt = User::find($item->id_approve_spv);
            return $item;
        });
        $keretas = Kereta::all();
        return view('master_checksheet.checksheet.index', compact('active', 'checksheets', 'keretas'));
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
        $detail = Checksheet::select('checksheet.*', 'master_kereta.nama_kereta', 'master_kereta.car')
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
                $detail = Detail_checksheet::where('id_item_checksheet', $item->id)->where('id_checksheet', $id)->get();
                $item->detail = $detail;
                return $item;
            });
            return $item;
        });
        $cars = json_decode($detail->car);
        // dd($categories);

        $active = 'master_checksheet';

        return view('master_checksheet.checksheet.detail', compact('active', 'detail', 'categories', 'cars'));
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

        $detail = Checksheet::select('checksheet.*', 'master_kereta.nama_kereta', 'master_kereta.car')
            ->join('master_kereta', 'checksheet.id_kereta', '=', 'master_kereta.id')
            ->where('checksheet.id', $id)
            ->first();
        $detail->tanggal = Carbon::parse($detail->date_time)->isoFormat('dddd, D MMMM Y');
        // $detail->tanggal = Carbon::parse($detail->date_time)->isoFormat('D MMMM Y');
        $detail->jam = Carbon::parse($detail->date_time)->isoFormat('HH:mm');
        $detail->teknisi = User::where('id', $detail->id_user)->first();
        $detail->assman = User::where('id', $detail->id_approve_assman)->first();
        $detail->upt = User::where('id', $detail->id_approve_spv)->first();
        $detail->signature = new stdClass;
        $detail->signature->teknisi = Signature::where('id_checksheet', $detail->id)->where('id_user', $detail->id_user)->first() ?? null;
        $detail->signature->assman = Signature::where('id_checksheet', $detail->id)->where('id_user', $detail->id_approve_assman)->first() ?? null;
        $detail->signature->upt = Signature::where('id_checksheet', $detail->id)->where('id_user', $detail->id_approve_spv)->first() ?? null;

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
                $detail = Detail_checksheet::where('id_item_checksheet', $item->id)->where('id_checksheet', $id)->get();
                $item->detail = $detail;
                $item->is_empty_border = count($item->detail) == 0 && $item->car_index != null;
                return $item;
            });
            return $item;
        });
        $cars = json_decode($detail->car);
        // return view('master_checksheet.checksheet.print', compact('detail', 'categories', 'cars'));
        // dd($categories);

        $pdf = Pdf::loadview('master_checksheet.checksheet.print', compact('detail', 'categories', 'cars'));
        $pdf->setPaper('A4', 'potrait');
        $title = 'Checksheet' . $detail->nama_kereta . ' - ' . $detail->tanggal;

        // Parameters
        $width_paper = $pdf->getPaperSize()[2];
        $x          = $width_paper / 2;
        $y          = 825;
        $text       = "Page {PAGE_NUM} of {PAGE_COUNT}";
        $font       = $pdf->getFontMetrics()->get_font('Helvetica', 'normal');
        $size       = 7;
        $color      = array(0, 0, 0);
        $word_space = 0.0;
        $char_space = 0.0;
        $angle      = 0.0;

        $pdf->getCanvas()->page_text(
            $x,
            $y,
            $text,
            $font,
            $size,
            $color,
            $word_space,
            $char_space,
            $angle
        );

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
            ->orderBy('date_time', 'asc')
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

    public function approve(string $id)
    {
        $auth = Auth::user();

        if ($auth->role == 1) {
            $checksheet = Checksheet::find($id);
            $checksheet->id_approve_assman = $auth->id;
            $checksheet->save();
        } elseif ($auth->role == 2) {
            $checksheet = Checksheet::find($id);
            $checksheet->id_approve_spv = $auth->id;
            $checksheet->save();
        } elseif ($auth->role == 0) {
            $checksheet = Checksheet::find($id);
            $checksheet->is_approve = 1;
            $checksheet->save();
        }

        //add signature
        Signature::create([
            'identity' => Str::uuid()->toString(),
            'id_user' => $auth->id,
            'id_checksheet' => $id
        ]);

        return redirect()->route('checksheet.index')->with('status', 'Data Checksheet berhasil diapprove!');
    }

    public function report_checksheet()
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
        $active = 'report_checksheet';
        return view('checksheet.index', compact('active', 'detail', 'keretas'));
    }

    public function print_report_checksheet(Request $request)
    {
        //get bulan & tahun in query params
        $bulan_asli = $request->bulan;
        $tahun_asli = $request->tahun;
        $detail = Kereta::find(1);
        $detail->checksheet = Checksheet::whereMonth('date_time', $bulan_asli)
            ->whereYear('date_time', $tahun_asli)
            ->orderBy('date_time', 'asc')
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

        setlocale(LC_ALL, 'IND');
        //set locale for vps
        setlocale(LC_TIME, 'id_ID.utf8');
        Carbon::setLocale('id');

        $detail2 = Checksheet::select('checksheet.*', 'master_kereta.nama_kereta', 'master_kereta.car')
            ->join('master_kereta', 'checksheet.id_kereta', '=', 'master_kereta.id')
            ->whereMonth('date_time', $bulan_asli)
            ->whereYear('date_time', $tahun_asli)
            ->get();

        $detail2 = $detail2->map(function ($xitem) {
            $xitem->tanggal = Carbon::parse($xitem->date_time)->isoFormat('dddd, D MMMM Y');
            // $xitem->tanggal = Carbon::parse($xitem->date_time)->isoFormat('D MMMM Y');
            $xitem->jam = Carbon::parse($xitem->date_time)->isoFormat('HH:mm');
            $xitem->teknisi = User::where('id', $xitem->id_user)->first();
            $xitem->assman = User::where('id', $xitem->id_approve_assman)->first();
            $xitem->upt = User::where('id', $xitem->id_approve_spv)->first();
            $xitem->signature = new stdClass;
            $xitem->signature->teknisi = Signature::where('id_checksheet', $xitem->id)->where('id_user', $xitem->id_user)->first() ?? null;
            $xitem->signature->assman = Signature::where('id_checksheet', $xitem->id)->where('id_user', $xitem->id_approve_assman)->first() ?? null;
            $xitem->signature->upt = Signature::where('id_checksheet', $xitem->id)->where('id_user', $xitem->id_approve_spv)->first() ?? null;

            $categories = Kategori_checksheet::where('id_kereta', $xitem->id_kereta)->get();
            $id = $xitem->id;
            $categories = $categories->map(function ($item) use ($id, $xitem) {
                $items = Item_checksheet::where('id_kategori_checksheet', $item->id)->where('id_kereta', $xitem->id_kereta);
                if ($xitem->tipe == 0) {
                    $items = $items->where('harian', "1");
                } else {
                    if ($xitem->p == "P1") {
                        $items = $items->where('p1', "1");
                    } else if ($xitem->p == "P3") {
                        $items = $items->where('p3', "1");
                    } else if ($xitem->p == "P6") {
                        $items = $items->where('p6', "1");
                    } else if ($xitem->p == "P12") {
                        $items = $items->where('p12', "1");
                    }
                }
                $items = $items->get();
                $item->lists = $items->map(function ($item) use ($id) {
                    $xitem = Detail_checksheet::where('id_item_checksheet', $item->id)->where('id_checksheet', $id)->get();
                    $item->detail = $xitem;
                    $item->is_empty_border = count($item->detail) == 0 && $item->car_index != null;
                    return $item;
                });
                return $item;
            });
            $xitem->cars = json_decode($xitem->car);
            $xitem->categories = $categories;

            return $xitem;
        });

        // dd($detail2);

        $pdf = Pdf::loadView('checksheet.print', compact('active', 'detail', 'bulan', 'tahun', 'availability', 'detail2'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('foto.pdf');
    }
}
