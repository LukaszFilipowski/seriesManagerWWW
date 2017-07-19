<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User_Series;

class ShowController extends Controller
{
    public function profile($showId) {

        return view('show/profile', ['showData' => TmdbController::getShowData($showId), 'imageDir' => TmdbController::getImageDir()]);
    }

    public function checkIsMyAndDelOrAdd($showId) {
        if(Auth::check()) {
            $series = DB::table('user_series')->where('show_id', $showId)->where('user_id', Auth::user()->id)->count();

            if($series == 0) {
                $response = $this->addToMy($showId);
            } else {
                $response = $this->delFromMy($showId);
            }
        }

        return $response;
    }

    private function addToMy($showId) {

        $user_series = new User_Series;
        $user_series->show_id = $showId;
        $user_series->user_id = Auth::user()->id;
        if($user_series->save()) {
            return response()->json([
                'status' => 'added'
                ]);
        } else {
            return response()->json([
                'status' => 'error'
                ]);
        }

    }

    private function delFromMy($showId) {

        if(DB::table('user_series')->where('show_id', $showId)->where('user_id', Auth::user()->id)->delete()) {
            return response()->json([
                'status' => 'deleted'
                ]);
        } else {
            return response()->json([
                'status' => 'error'
                ]);
        }

    }


}
