<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IdCardController extends Controller
{
    public function index()
    {
        return view('user.idcard');
    }
}
