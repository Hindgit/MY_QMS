<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Offices;
use App\Http\Resources\Offices as OfficesResource;
use App\Http\Resources\OfficesCollection;
use App\User;
use App\Http\Resources\Users as UsersResource;
use App\Http\Resources\UsersCollection;
use App\Http\Requests\NewOfficeRequest;
use App\Http\Requests\UpdateOfficeRequest;
use App\Console;
use App\Display;
use App\Services;
use App\Http\Resources\Services as ServicesResource;
use App\Http\Resources\ServiceCollection;
use App\Http\Resources\Consoles as ConsolesResource;
use App\Http\Resources\ConsoleCollection;
use App\Http\Resources\Displays as DisplaysResource;
use App\Http\Resources\DisplayCollection;

class OfficeController extends Controller
{
    //Affiche Liste Offices
    public function index()
    {
      $offices = new OfficesCollection(Offices::all());
        return view('listoffice',
            ['offices' => $offices]);
    }


    //create New Office
    public function store(NewOfficeRequest $request)
    {
         $request->validate([

            'user_id',
            'service_id',
            'display_id',
            'console_id'
        ]);

        $offices = Offices::create([
            'user_id' => $request->user_id,
            'service_id' => $request->service_id,
            'display_id'=> $request->display_id,
            'console_id' =>$request->console_id,
            'updated_at' =>"",
            'created_at' =>"",
                    ]);
        return redirect('/officess');
    }

    //Update Office
     public function update(UpdateOfficeRequest $request, Offices $office)
    {

         $request->validate([

            'user_id',
            'service_id',
            'display_id',
            'console_id'
        ]);

        $office->user_id = $request->input('user_id');
        $office->service_id = $request->input('service_id');
        $office->display_id = $request->input('display_id');
        $office->console_id = $request->input('console_id');


        $office->save();

       return redirect('/officess');
    }

    public function showoffice($id)
    {
          $users = new UsersCollection(User::all());
          $consoles = new ConsoleCollection(Console::all());
          $services = new ServiceCollection(Services::all());
          $displays = new DisplayCollection(Display::all());
          $office = Offices::find($id);
            return view('updateoffice',
                [
                    'users' => $users,
                    'consoles' => $consoles,
                    'services' => $services,
                    'displays' => $displays,
                    'off' => $office
                ]
        );

    }

    public function destroy($id)
    {
        $office = Offices::findOrfail($id);
        if (is_null($office)) {
            return response()->json(['error' => 'id :'.$id.' ne correspond a aucun USer'], 404);
        }
        else{
            DB::table('offices')->delete($id);
            return response()->json(['success' => 'Bien supprimé' ,
                'id Office' =>$id], 401);
        }
    }

}

