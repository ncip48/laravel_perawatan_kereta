<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Checksheet;
use App\Models\Detail_checksheet;
use App\Models\Foto;
use App\Models\Item_checksheet;
use App\Models\Kategori_checksheet;
use App\Models\Kereta;
use App\Models\Signature;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use stdClass;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function getAll($id)
    {
        $authuser = auth()->user();
        $categories = Kategori_checksheet::where('id_kereta', $authuser->id_kereta)->get();
        $oldChecksheet = Checksheet::where('id_kereta', $authuser->id_kereta)->where('id', $id)->first();
        $checksheet = new stdClass();
        $checksheet->id = $oldChecksheet->id ?? null;
        $checksheet->is_so = $oldChecksheet->is_so ?? null;
        $checksheet->categories = $categories;
        return ResponseController::customResponse(true, 'Berhasil mendapakan Kategori!', $checksheet);
    }

    //cehecksheet
    public function getstatuschecksheet(Request $request)
    {
        $type = $request->type;
        $authuser = auth()->user();
        $result = [];
        // if ($type == 0) {
        $data = Checksheet::where('id_kereta', $authuser->id_kereta)->whereDate('date_time', Carbon::today()->setTimezone('Asia/Jakarta'))->where('tipe', $type);
        if ($data->count() == 0) {
            $result = [
                'found' => false,
                'data' => null
            ];
        } else {
            $result = [
                'found' => true,
                'data' => $data->first()
            ];
        }
        // } else {
        //     $result = [
        //         'found' => false,
        //         'data' => null,
        //     ];
        // }
        return ResponseController::customResponse(true, 'Berhasil mendapakan checksheet!', $result);
    }

    public function createChecksheet(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $authuser = auth()->user();

        $data = json_decode($request->getContent(), true);

        $rules = [
            'no_kereta' => 'required',
            'jam_engine' => 'required',
        ];

        $messages = [
            'no_kereta.required' => 'No kereta tidak boleh kosong',
            'jam_engine.required' => 'Jam engine tidak boleh kosong'
        ];

        if ($request->tipe == 1) {
            $rules['p'] = 'required';
            $messages['p.required'] = 'Kolom ini tidak boleh kosong';
        }


        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            $response = $validator->messages();
            $response = [
                'validation' => true,
                'message' => [
                    'no_kereta' => $response->first('no_kereta') != '' ? $response->first('no_kereta') : null,
                    'jam_engine' => $response->first('jam_engine') != '' ? $response->first('jam_engine') : null,
                    'p' => $response->first('p') != '' ? $response->first('p') : null
                ],
            ];
            return ResponseController::customResponse(false, 'Gagal menambahkan Checksheet!', $response);
        }

        $data = Checksheet::create([
            'id_kereta' => $authuser->id_kereta, //URGENT
            'id_user' => $authuser->id,
            'date_time' => Carbon::now()->setTimezone('Asia/Jakarta'),
            'no_kereta' => $request->no_kereta,
            'tipe' => $request->tipe,
            'jam_engine' => $request->jam_engine,
            'p' => $request->p ?? null
        ]);

        Signature::create([
            'identity' => Str::uuid()->toString(),
            'id_user' => $authuser->id,
            'id_checksheet' => $data->id,
        ]);

        return ResponseController::customResponse(true, 'Berhasil menambahkan Checksheet!', $data);
    }

    //list item checksheet
    public function getAllList()
    {
        $authuser = auth()->user();
        $categories = Item_checksheet::where('id_kereta', $authuser->id_kereta)->get();
        $categories = $categories->map(function ($item) {
            $detail = Detail_checksheet::where('id_item_checksheet', $item->id)->first();
            $item->dilakukan = $detail->dilakukan ?? null;
            $item->hasil = $detail->hasil ?? null;
            $item->keterangan = $detail->keterangan ?? null;
            $item->foto = Foto::where('id_detail', $detail->id)->get();
            return $item;
        });
        return ResponseController::customResponse(true, 'Berhasil mendapakan item checklist!', $categories);
    }

    public function getAllListById($id, $id_checksheet)
    {
        $authuser = auth()->user();
        $categories = Item_checksheet::where('id_kereta', $authuser->id_kereta)->where('id_kategori_checksheet', $id)->get();
        $categories = $categories->map(function ($item) use ($id_checksheet) {
            $detail = Detail_checksheet::where('id_item_checksheet', $item->id)->where('id_checksheet', $id_checksheet)->first();
            $item->dilakukan = $detail->dilakukan ?? null;
            $item->hasil = $detail->hasil ?? null;
            $item->keterangan = $detail->keterangan ?? null;
            if ($detail) {
                $item->foto = Foto::where('id_detail', $detail->id)->get();
                $item->foto = $item->foto->map(function ($item) {
                    $item->foto = asset('foto/' . $item->foto);
                    return $item;
                });
            } else {
                $item->foto = [];
            }
            $item->id_detail_checksheet = $detail->id ?? null;
            return $item;
        });
        return ResponseController::customResponse(true, 'Berhasil mendapakan item checklist!', $categories);
    }

    public function getAllListByIdv2(Request $request)
    {
        $id = $request->id;
        $id_checksheet = $request->id_checksheet;
        $tipe = $request->tipe;
        $periode = $request->periode;
        $authuser = auth()->user();
        $categories = Item_checksheet::where('id_kereta', $authuser->id_kereta)->where('id_kategori_checksheet', $id);
        if ($tipe == 0) {
            $categories = $categories->where('harian', "1");
        } else {
            if ($periode == "P1") {
                $categories = $categories->where('p1', "1");
            } else if ($periode == "P3") {
                $categories = $categories->where('p3', "1");
            } else if ($periode == "P6") {
                $categories = $categories->where('p6', "1");
            } else if ($periode == "P12") {
                $categories = $categories->where('p12', "1");
            }
        }
        $categories = $categories->get();
        $categories = $categories->map(function ($item) use ($id_checksheet) {
            $detail = Detail_checksheet::where('id_item_checksheet', $item->id)->where('id_checksheet', $id_checksheet)->first();
            $item->car_index = json_decode($item->car_index);
            $item->dilakukan = $detail->dilakukan ?? null;
            $item->hasil = $detail->hasil ?? null;
            $item->keterangan = $detail->keterangan ?? null;
            if ($detail) {
                $item->foto = Foto::where('id_detail', $detail->id)->get();
                $item->foto = $item->foto->map(function ($item) {
                    $item->foto = asset('foto/' . $item->foto);
                    return $item;
                });
            } else {
                $item->foto = [];
            }
            $item->id_detail_checksheet = $detail->id ?? null;
            return $item;
        });
        return ResponseController::customResponse(true, 'Berhasil mendapakan item checklist!', $categories);
    }

    public function getAllListByIdv3(Request $request)
    {
        $id = $request->id;
        $id_checksheet = $request->id_checksheet;
        $tipe = $request->tipe;
        $periode = $request->periode;
        $authuser = auth()->user();
        $categories = Item_checksheet::where('id_kereta', $authuser->id_kereta)->where('id_kategori_checksheet', $id);
        if ($tipe == 0) {
            $categories = $categories->where('harian', "1");
        } else {
            if ($periode == "P1") {
                $categories = $categories->where('p1', "1");
            } else if ($periode == "P3") {
                $categories = $categories->where('p3', "1");
            } else if ($periode == "P6") {
                $categories = $categories->where('p6', "1");
            } else if ($periode == "P12") {
                $categories = $categories->where('p12', "1");
            }
        }
        $categories = $categories->get();
        $categories = $categories->map(function ($item) use ($id_checksheet) {
            $detail = Detail_checksheet::where('id_item_checksheet', $item->id)->where('id_checksheet', $id_checksheet)->get();
            $item->detail = $detail;
            $car_index = json_decode($item->car_index);
            //find in $kereta->car find by index in $car_index then combine {index:x, name:y}
            $car_name = Kereta::where('id', $item->id_kereta)->first()->car;
            $car_name = json_decode($car_name);
            $new_car_index = [];
            if ($car_index) {
                foreach ($car_index as $key) {
                    $new_car_index[] = ['index' => $key, 'name' => $car_name[$key]];
                }
            }
            $item->car_index = $new_car_index;
            // $item->dilakukan = $detail->dilakukan ?? null;
            // $item->hasil = $detail->hasil ?? null;
            // $item->keterangan = $detail->keterangan ?? null;
            if (isset($detail[0])) {
                if ($detail[0]) {
                    $item->foto = Foto::where('id_detail', $detail[0]->id)->get();
                    $item->foto = $item->foto->map(function ($item) {
                        $item->foto = asset('foto/' . $item->foto);
                        return $item;
                    });
                } else {
                    $item->foto = [];
                }
                $item->keterangan = $detail[0]->keterangan ?? null;
            } else {
                $item->foto = [];
                $item->keterangan = null;
            }
            $item->id_detail_checksheet = $detail[0]->id ?? null;
            return $item;
        });
        return ResponseController::customResponse(true, 'Berhasil mendapakan item checklist!', $categories);
    }
}
