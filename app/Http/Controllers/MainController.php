<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advert;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    //Отображение главной страницы
    public function index() {
        $ads = Advert::paginate(5);
        foreach ($ads as $ad) {
            $ad->description = mb_strimwidth($ad->description, 0, 500, "...");
        }

        return view('main')->with('ads', $ads);
    }

    public function login () {
        return Redirect::to('/');
    }

    public function logout () {
        Auth::logout();
        return Redirect::to('/');
    }

}
