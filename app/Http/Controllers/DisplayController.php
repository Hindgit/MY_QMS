<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Display;
use App\Http\Resources\Displays as DisplaysResource;
use App\Http\Resources\DisplayCollection;
use App\Http\Requests\NewDisplayRequest;
use App\Http\Requests\UpdateDisplayRequest;


class DisplayController extends Controller
{
    //Affiche Liste Display
    public function index()
    {
      $displays = new DisplayCollection(Display::all());
        return view('listdisplay',['displays' => $displays]);
    }

    //create new Diplay
    public function store(NewDisplayRequest $request)
    {

         $request->validate([
            'serial',
        ]);

        $displays = Display::create([
            'name' => $request->name,
            'serial' => $request->serial,
            'updated_at' =>"",
            'created_at' =>"",
         ]);
            return redirect('/displays');
    }


     public function showdisplay($id)
    {
        $display = Display::find($id);
        return view('updatedisplay' , ['di' => $display]);
    }

}
