@extends('layouts.apphome')
    @section('content')
        <body class="building_version" data-spy="scroll" data-target=".header" id="bd">
        <div class="container" style="margin-top: 75px;margin-left: 335px;">
            <div class="card"  style="margin-top: 20px; padding-bottom: 38px; padding-left: 48px; padding-right: 48px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 text-align="center">All Display</h2>
                        <table id="example"  class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Serial</th>
                            </tr>
                            </thead>
                            @foreach($displays as $display)
                                <tr>
                                    <th>{{ $display->name }}</th>
                                    <th>{{ $display->serial }}</th>
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
