<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ResponseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'nip' => 'required',
            'password' => 'required',
        ], [
            'nip.required' => 'NIP harus diisi',
            'password.required' => 'Password harus diisi'
        ]);

        if (auth()->attempt(array('nip' => $input['nip'], 'password' => $input['password']))) {
            $user = User::where('nip', $input['nip'])->first();
            //cek login jika teknisi maka tolak
            if ($user->role == 3) {
                return redirect()->route('login')
                    ->with('error', 'Tidak diijinkan masuk.');
            }
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->route('login')
                ->with('error', 'NIP atau Password salah.');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
