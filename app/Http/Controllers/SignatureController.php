<?php

namespace App\Http\Controllers;

use App\Models\Signature;
use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function index($uid)
    {

        $signature = Signature::with('user')->where('identity', $uid)->first();
        return view('signature', compact('signature'));
    }
}
