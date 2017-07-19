<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\TmdbController;

class TmdbController extends Controller
{
    private static $imageAddress = 'https://image.tmdb.org/t/p/w1000';
    private static $apiAddress = 'https://api.themoviedb.org/3/';
    private static $apiKey = '9936b88d2a7832a818b19e3020cc25be';
    private static $lang = 'pl-PL';

    static function getBestSeries() {

        $client = new Client();

        $urlString = self::$apiAddress.'discover/tv?api_key='.self::$apiKey.'&language='.self::$lang;
        $urlString .= '&sort_by=popularity.desc&air_date.lte=2017-07-18&page=1';
        $urlString .= '&timezone=America%2FNew_York&include_null_first_air_dates=false';

        $res = $client->request('GET', $urlString);
        $bestSeries = json_decode($res->getBody()->getContents());

        return $bestSeries->results;
    }

    static function getOnAirShows() {
        $client = new Client();
        $res = $client->request('GET', self::$apiAddress.'tv/on_the_air?api_key='.self::$apiKey.'&language='.self::$lang.'&page=1');
        $result = json_decode($res->getBody()->getContents());

        return $result->results;

    }

    static function getShowData($showId) {
        $client = new Client();
        $res = $client->request('GET', self::$apiAddress.'tv/'.$showId.'?api_key='.self::$apiKey.'&language='.self::$lang);
        $result = json_decode($res->getBody()->getContents());

        $client = new Client();
        $res = $client->request('GET', self::$apiAddress.'tv/'.$showId.'/images?api_key='.self::$apiKey);
        $images = json_decode($res->getBody()->getContents());

        for($i = 0; $i < 15; $i++) {
            if(isset($images->backdrops[$i])) {
                $result->images[$i] = $images->backdrops[$i];
            }
        }

        return $result;
    }

    static function getNewTvShows() {
        $client = new Client();
        $res = $client->request('GET', self::$apiAddress.'tv/on_the_air?api_key='.self::$apiKey.'&language='.self::$lang.'&page=1');
        $result = json_decode($res->getBody()->getContents());

        return $result->results;
    }

    static function getTopRatedShows() {
        $client = new Client();
        $res = $client->request('GET', self::$apiAddress.'tv/top_rated?api_key='.self::$apiKey.'&language='.self::$lang.'&page=1');
        $result = json_decode($res->getBody()->getContents());

        return $result->results;
    }

    public static function getImageDir() {
        return self::$imageAddress;
    }

}
