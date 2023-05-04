<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LogOutController extends Controller
{

    public function logout()
    {
        $user=Auth::user();
        $user->currentAccessToken()->delete();
    }
}
