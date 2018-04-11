<?php

namespace App\Http\Controllers;

use App\Advert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdController extends Controller
{

    protected $request;
    private $ad;

    public function __construct(Request $request)
    {

        $this->request = $request;
        $this->ad = Advert::find($this->request->route('id'));

        if (($this->request->url() != route('create')) && !$this->ad) {

            abort(404);
        }

    }
    //Показ одного обявления
    public function showAd () {

        return view('ad')->with('ad',$this->ad);

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
    public function edit () {

        if (Auth::user()->name != $this->ad->author_name) {
            return Redirect::to('/' . $this->ad->id);
        }

        if ($this->request->isMethod('post')) {
            $this->ad->title = $this->request['title'];
            $this->ad->description = $this->request['desc'];
            $this->ad->save();
            return Redirect::to('/' . $this->ad->id);
        }

        return view('ad_edit')->with('ad', $this->ad);

    }
    //Удаление обявления
    public function delete () {

        if (Auth::user()->name != $this->ad->author_name) {
            return Redirect::to('/' . $this->ad->id);
        }

        Advert::destroy($this->ad->id);
        return Redirect::to('/');
    }

}
