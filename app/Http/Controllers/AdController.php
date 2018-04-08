<?php

namespace App\Http\Controllers;

use App\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdController extends Controller
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    //Показ одного обявления
    public function showAd ($id) {

        if (!$advert = Advert::find($id)) {
            abort(404);
        }
        return view('ad')->with('advert',$advert);

    }
    //Создание обявления
    public function create () {

        if ($this->request->isMethod('post')) {
            $ad = new Advert();
            $ad->title = $this->request['title'];
            $ad->description = $this->request['desc'];
            $ad->author_name = $this->request['author_name'];
            $ad->save();
            return Redirect::to('/' . $ad->id);
        }

        return view('edit');
    }
    //Редактирование обявления
    public function edit ($id) {

        if (!$ad = Advert::find($id)) {
            abort(404);
        }

        if ($this->request->isMethod('post')) {
            $ad->title = $this->request['title'];
            $ad->description = $this->request['desc'];
            $ad->save();
            return Redirect::to('/' . $ad->id);
        }

        return view('ad_edit')->with('ad', $ad);

    }
    //Удаление обявления
    public function delete ($id) {
        Advert::destroy($id);
        return Redirect::to('/');
    }
}
