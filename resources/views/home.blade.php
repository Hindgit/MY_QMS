@extends('layouts.apphome')
    @section('content')
        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <!-- Widgets -->
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-pink hover-expand-effect">
                                <div class="icon">
                                    <i class='material-icons'>donut_small</i>
                                </div>
                                <div class="content">
                                    <div class="text">SERVICES</div>
                                    <div class="number count-to" data-from="0" data-to="{{ $services }}" data-speed="15" data-fresh-interval="20"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-cyan hover-expand-effect">
                                <div class="icon">
                                    <i class="material-icons">supervisor_account</i>
                                </div>
                                <div class="content">
                                    <div class="text">USERS</div>
                                    <div class="number count-to" data-from="0" data-to="{{ $users }}" data-speed="1000" data-fresh-interval="20"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-light-green hover-expand-effect">
                                <div class="icon">
                                    <i class="material-icons">devices</i>
                                </div>
                                <div class="content">
                                    <div class="text">Console</div>
                                    <div class="number count-to" data-from="0" data-to="{{ $console }}" data-speed="1000" data-fresh-interval="20"></div>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-orange">
                                <div class="icon">
                                    <div class="material-icons" style="font-size: 67px;margin-top: 7px;">group_work</div>
                                </div>
                                <div class="content">
                                    <div class="text">Display</div>
                                    <div class="number count-to" data-from="0" data-to="{{ $dis }}" data-speed="1000" data-fresh-interval="20"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('data')
                </div>
            </div>
        </section>
    @endsection




