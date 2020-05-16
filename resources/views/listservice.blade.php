@extends('layouts.apphome')
    @section('content')
        <body class="building_version" data-spy="scroll" data-target=".header" id="bd">
        <div class="container" style="margin-top: 75px;margin-left: 335px;">
            <div class="card"  style="margin-top: 20px; padding-bottom: 38px; padding-left: 48px; padding-right: 48px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 text-align="center">All Services</h2>
                        <table id="example"  class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Start Countor</th>
                                <th>End Countor</th>
                                <th>Color</th>
                                <th>Background Color</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach($services as $service)
                                <tr>
                                    <th>{{ $service->name }}</th>
                                    <th>{{ $service->description }}</th>
                                    <th>{{ $service->start_time }}</th>
                                    <th>{{ $service->end_time }}</th>
                                    <th>{{ $service->start_counter }}</th>
                                    <th>{{ $service->end_counter }}</th>
                                    <th>{{ $service->color }}</th>
                                    <th>{{ $service->background_color }}</th>
                                    <th><a type='submit'class='fas fa-edit' style='font-size:24px' href="{{ url('/updat/'.$service->id)}}"  data-id='{{ $service->id }}'></a></th>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .img {
                width:300px;
                height:300px;
            }
            .obj {
                margin-top: 10px;
            }
            button {
                margin-right: 10px;
                margin-left: 10px;
            }
            #im {
                width: 80px;
                background-color: #25c481
            }

            #b {
                width: 100px;
            }

        </style>
   @endsection
