@extends('layouts.apphome')
    @section('content')
        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                    Console Page
                                    </h2>
                                </div>
                            <div class="body">
                                 <form id="contactform" enctype="multipart/form-data" class="row" name="contactform" method="POST" action="/consoles"  method="post">
                                     {{ csrf_field() }}
                                    <label for="email_address">Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <label for="password">Seriale</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="serial" name="serial" class="form-control" placeholder="Enter Serial">
                                            @error('serial')
                                                     <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <br>
                                    <button type="submit" value="submit" id="submit" class="btn btn-primary m-t-15 waves-effect">Ajouter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </section>

@endsection
