@extends('layouts.apphome')
    @section('content')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <body class="building_version" data-spy="scroll" data-target=".header" id="bd">
            <div class="container" style="margin-top: 75px;margin-left: 335px;">
                <div class="container-fluid" xmlns="http://www.w3.org/1999/html">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 text-align="center">ADD USERS</h2>
                        <div class="card"  style="margin-top: 20px; padding-bottom: 38px; padding-left: 48px; padding-right: 48px;">

                            <form id="contactform" enctype="multipart/form-data" class="row" name="contactform" method="POST" action="/users"  method="post">
                                {{ csrf_field() }}
                                <fieldset class="row-fluid">
                                    <div class="col-md-3">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 35px;">
                                                <input style="margin-left:276px; width:726px;display:none;" type="file"  onchange="readURL(this);" name="photo" class="form-control" id="photo" type="float" placeholder="Chose Image"  >
                                                  <img id="blah" src="http://placehold.it/180" id="photo" name="photo" style="margin-top: 58px;">
                                                </img>
                                        </div>
                                    </div>
                                   <div class="col-md-9" style="margin-top: 27px;">
                                        <div class="col-md-12">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 35px;">
                                                <label>First Name</label>
                                                <input style="width:220%;" name="name" class="form-control" id="name" type="text" placeholder="First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  style="margin-top: 35px;">
                                                <label>Last Name</label>
                                                <input style="width:220%;" name="last_name" class="form-control" id="last_name" type="float" placeholder="Last Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  style="margin-top: 35px;">
                                                <label>User Name</label>
                                                <input style="width:220%;" name="username" class="form-control" id="username" type="text" placeholder="User Name" required>
                                                @error('username')
                                                     <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  style="margin-top: 35px;">
                                        <label>Password</label>
                                        <input name="password" class="form-control" id="password" type="password" placeholder="Password" required>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  style="margin-top: 35px;">
                                        <label>Email</label>
                                        <input name="email" class="form-control" id="email" type="email" placeholder="Email" required>
                                        @error('email')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                         @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  style="margin-top: 35px;">
                                        <label>Phone</label>
                                        <input name="phone" class="form-control" id="phone" type="number" placeholder="Number phone" required>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  style="margin-top: 35px;">
                                        <label>Pin</label>
                                        <input name="pin" class="form-control" id="pin" type="number" placeholder="PIN" required>
                                        @error('pin')
                                                     <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  style="margin-top: 35px;">

                                     <label for="listeuser">Type Users</label>
                                         <select class="form-control show-tick" name="user_type_id">
                                         <option value="0">Select</option>
                                            @foreach($types as $type)
                                            <option value="{{ $type->id }}" class="form-control" id="user_type_id" >{{ $type->name }}</option>
                                            @endforeach

                                        </select>
                                        @error('user_type_id')
                                                     <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  style="margin-top: 35px;">
                                        <div class="form-check">
                                            <input class="form-check-input" name="status" id="status" type="checkbox"  {{ old('status') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status">
                                                Statut
                                            </label>
                                        </div>
                                    </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: 35px;">
                                            <button type="submit" value="submit" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Ajouter</button>
                                        </div>
                                </fieldset>
                             </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <body>
    <style>
        img{
            max-width:180px;
        }
        nput[type=file]{
            padding:10px;
        }
    </style>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        (function ($) {
            $(document).ready(function () {
                uploadImage()
                function uploadImage() {
                    var btn = $('#blah')
                    var uploader = $('#photo')
                    btn.on('click', function () {
                        uploader.click()
                    })
                }
            })
        })(jQuery)
    </script>
    @endsection
