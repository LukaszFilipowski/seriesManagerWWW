<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User_Series;

class ShowController extends Controller
{

    private $buttonAddMessage = 'Dodaj do moich seriali';
    private $buttonDelMessage = 'Usuń z moich seriali';

    private function checkIsMy($showId) {
        if(Auth::check()) {
            $series = DB::table('user_series')->where('show_id', $showId)->where('user_id', Auth::user()->id)->count();

            if($series == 0) {
                return false;
            } else {
                return true;
            }

        } else {
            return false;
        }
    }

    public function profile($showId) {
        if($this->checkIsMy($showId)) {
            $isMy = 'danger';
            $mess = $this->buttonDelMessage;
        } else {
            $isMy = 'success';
            $mess = $this->buttonAddMessage;
        }

        return view('show/profile', ['showData' => TmdbController::getShowData($showId), 'imageDir' => TmdbController::getImageDir(), 'isMy' => $isMy, 'isMyBtnTxt' => $mess]);
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
                'status' => 'added',
                'message' => $this->buttonDelMessage
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
                'status' => 'deleted',
                'message' => $this->buttonAddMessage
                ]);
        } else {
            return response()->json([
                'status' => 'error'
                ]);
        }

    }


}
