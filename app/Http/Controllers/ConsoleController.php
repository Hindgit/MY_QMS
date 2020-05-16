<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Console;
use App\Http\Resources\Consoles as ConsolesResource;
use App\Http\Resources\ConsoleCollection;
use App\Http\Requests\NewConsoleRequest;
use App\Http\Requests\UpdateConsoleRequest;

class ConsoleController extends Controller
{
    //Affiche liste Console
    public function index()
    {
      $consoles = new ConsoleCollection(Console::all());
        return view('listconsole',['consoles' => $consoles]);
    }

    //create new Console
    public function store(NewConsoleRequest $request)
    {
        $request->validate([
            'serial',
        ]);
        $consoles = Console::create([
            'name' => $request->name,
            'serial' => $request->serial,
            'updated_at' =>"",
            'created_at' =>"",
         ]);
            return redirect('/consoles');
    }

    //Affiche Liste Console in office
    public function ind()
    {
      $consoles = new ConsoleCollection(Console::all());
        return view('offices',['consoles' => $consoles]);
    }


    public function showconsole($id)
    {
        $console = Console::find($id);
        return view('updateconsole' , ['con' => $console]);
    }

}
