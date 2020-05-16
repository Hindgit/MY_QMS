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
                    <form id="contactform" enctype="multipart/form-data" class="row" name="contactform" method="POST" action="{{ route('offs.update', $off->id) }}"   method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="listeuser">Liste Users</label>
                                    <select class="form-control show-tick" name="user_id">
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
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
                                        @foreach($consoles as $console)
                                     <option value="{{$console->id}}">{{$console->name}}</option>
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
                                        @foreach($displays as $display)
                                            <option value="{{$display->id}}">{{$display->name}}</option>
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
                                        @foreach($services as $service)
                                            <option value="{{$service->id}}">{{$service->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('service_id')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-primary waves-effect" type="submit" value="submit" id="submit">Modifier</button>
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
