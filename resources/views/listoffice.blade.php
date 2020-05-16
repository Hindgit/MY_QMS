@extends('layouts.apphome')
    @section('content')
        <body class="building_version" data-spy="scroll" data-target=".header" id="bd">
        <div class="container" style="margin-top: 75px;margin-left: 335px;">
            <div class="card"  style="margin-top: 20px; padding-bottom: 38px; padding-left: 48px; padding-right: 48px;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 text-align="center">All Offices</h2>
                        <table id="example"  class="table table-striped">
                            <thead>
                            <tr>
                                <th>User</th>
                                <th>Console</th>
                                <th>Display</th>
                                <th>Service</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach($offices as $office)
                                <tr>
                                    <th>{{ $office->user->name }} {{ $office->user->last_name }}</th>
                                    <th>{{ $office->console->name }}</th>
                                    <th>{{ $office->display->name }}</th>
                                    <th>{{ $office->service->name }}</th>
                                    <th><a type="submit" class="fas fa-edit" style="font-size: 24px" href="{{ url('/upd/'.$office->id)}}" data-id="{{ $office->id }}"></a>&nbsp<a type ='submit' id='contact_us' class='fas fa-trash-alt supprimer ' style='font-size:24px;color:red'  data-id='{{ $office->id }}'></th>
                                </tr>
                            @endforeach
                        </table>
                        <div id="confirmModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h2 class="modal-title">Confirmation</h2>
                                    </div>
                                    <div class="modal-body">
                                        <h4 text-align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" name="ok_button" id="ok_button" class="btn btn-danger" data-id='{{ $office->id }}'>OK</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $(document).on("click",".supprimer" , function(){
                    $("#confirmModal").modal('show');
                });
            });
            $(document).ready(function () {
                $(document).on("click","#ok_button" , function(){
                    var id  = $(this).data("id");
                    location.reload()
                    $.ajax({
                        url : "http://127.0.0.1:8000/api/offices/"+$(this).data('id')+"",
                        method:"DELETE",
                        headers: {
                           "accept": "application/json;odata=verbose",
                           "content-type": "application/json;odata=verbose"
                        },
                        success:function(data){

                        }
                    });
                });
            });
        </script>
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
