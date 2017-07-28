<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function profile($userId) {
        $userData = User::find($userId);
        $series = TmdbController::getUserSeries($userId);
            return view('user.profile', ['seriesData' => $series, 'userData' => $userData, 'imageDir' => TmdbController::getImageDir()]);
    }
}
