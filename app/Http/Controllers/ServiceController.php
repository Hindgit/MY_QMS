<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Services;
use App\Http\Resources\Services as ServicesResource;
use App\Http\Resources\ServiceCollection;
use App\Http\Requests\NewServiceRequest;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //Affiche List Service
    public function index()
    {
      $services = new ServiceCollection(Services::all());
        return view('listservice',['services' => $services]);
    }

    //Create New Service
    public function store(NewServiceRequest $request)
    {
         $request->validate([

            'service_tp_id',
            'start_counter',
            'end_counter'
        ]);

        $services = Services::create([
            'service_tp_id' => $request->service_tp_id,
            'name' => $request->name,
            'description' => $request->description,
            'start_time' => $request->start_time, 
            'end_time' => $request->end_time,
            'start_counter' => $request->start_counter, 
            'end_counter' => $request->end_counter,
            'color' => $request->color,
            'background_color' => $request->background_color,
            'updated_at' =>"",
            'created_at' =>"",           
        ]);
            return redirect('/services');
    }

    //Update Service
     public function update(NewServiceRequest $request,Services $service)
    {
         $request->validate([

            'service_tp_id',
            'start_counter',
            'end_counter'
        ]);
         
        $service->service_tp_id = $request->input('service_tp_id');
        $service->name = $request->input('name');
        $service->description = $request->input('description');
        $service->start_time = $request->input('start_time');
        $service->end_time = $request->input('end_time');
        $service->start_counter = $request->input('start_counter');
        $service->end_counter = $request->input('end_counter');
        $service->color = $request->input('color');
        $service->background_color = $request->input('background_color');

        
        $service->save();

       return redirect('/services');
    }
    public function showservice($id)
    {
        $service = Services::find($id);
        return view('updateservice' , ['pot' => $service]);
    }
     

}
