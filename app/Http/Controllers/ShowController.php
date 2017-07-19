<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function profile($showId) {

        return view('show/profile', ['showData' => TmdbController::getShowData($showId), 'imageDir' => TmdbController::getImageDir()]);
    }
}
