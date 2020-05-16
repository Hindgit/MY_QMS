@extends('layouts.apphome')
    @section('content')
        <div class="row clearfix" style="margin-left: 307px;margin-right: 116px;margin-top: 95px;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Offices
                        </h2>
                    </div>
                    <form id="form" enctype="multipart/form-data" class="row" name="form" method="POST" action="/officess" methode="post">
                                {{ csrf_field() }}
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="listeuser">Liste Users</label>
                                    <select class="form-control show-tick" name="user_id">
                                        <option value="0">Select</option>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}" class="form-control" id="user_id" >{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="listeuser">Liste Console</label>
                                    <select class="form-control show-tick" name="console_id">
                                     <option value="0">Select</option>
                                        @foreach($consoles as $console)
                                        <option value="{{$console->id}}" class="form-control" id="console_id" >{{$console->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('console_id')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                     @enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="listeuser">Liste Display</label>
                                   <select class="form-control show-tick" name="display_id">
                                   <option value="0">Select</option>
                                       @foreach($displays as $display)
                                        <option value="{{$display->id}}" class="form-control"id="display_id" >{{$display->name}}</option>
                                        @endforeach
                                   </select>
                                    @error('display_id')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="listeuser">Liste Services</label>
                                    <select class="form-control show-tick" name="service_id">
                                     <option value="0">Select</option>
                                     @foreach($services as $service)
                                        <option value="{{$service->id}}" class="form-control" id="service_id" >{{$service->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('service_id')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-primary waves-effect" type="submit" value="submit" id="submit">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.mdb-select').materialSelect();
            });
        </script>
    @endsection
