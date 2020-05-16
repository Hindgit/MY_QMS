@extends('layouts.apphome')
    @section('content')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <body class="building_version" data-spy="scroll" data-target=".header" id="bd">
        <div class="container" style="margin-top: 75px;margin-left: 335px;">
            <div class="container-fluid" xmlns="http://www.w3.org/1999/html">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card"  style="margin-top: 20px; padding-bottom: 38px; padding-left: 48px; padding-right: 48px;">
                            <h2 text-align="center">Update Service</h2>
                            <form id="contactform" enctype="multipart/form-data" class="row" name="contactform" method="POST" action="{{ route('pots.updat', $pot->id) }}"   method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="col-md-12">
                                    <div class="form-line">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{ $pot->name }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-line">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" id="description" cols="30" rows="5" class="form-control no-resize" value="{{ $pot->description }}"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-line">
                                        <label class="form-label">Start Time</label>
                                        <input type="text" class="form-control" name="start_time" id="start_time" value="{{ $pot->start_time }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-line">
                                        <label class="form-label">End Time</label>
                                        <input type="text" class="form-control" name="end_time" id="end_time" value="{{ $pot->end_time }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-line">
                                        <label class="form-label">Start Counter</label>
                                        <input type="number" maxlength="3"  id="start_counter"  class="form-control" name="start_counter" value="{{ $pot->start_counter }}">
                                         @error('start_counter')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-line">
                                        <label class="form-label">End Counter</label>
                                        <input type="number" maxlength="3" id="end_counter" class="form-control" name="end_counter" value="{{ $pot->end_counter }}">
                                         @error('end_counter')
                                                 <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-line">
                                        <label class="form-label">Text Color</label>
                                        <input type="text" id="color" class="form-control" name="color" value="{{ $pot->color }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-line">
                                        <label class="form-label">Background Color</label>
                                        <input type="text" id="background_color"  class="form-control" name="background_color" value="{{ $pot->background_color }}">
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-top: 26px;">
                                    <div class="form-line">
                                        <label class="form-label">Templaite</label>
                                        <input type="number" id="service_tp_id" class="form-control" name="service_tp_id" value="{{ $pot->service_tp_id }}">
                                        @error('service_tp_id')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: 35px;">
                                    <button type="submit" value="submit" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Modifier</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<style>
    img{
        max-width:180px;
        }
    input[type=file]{
        padding:10px;
        }
</style>
<script type="text/javascript">

    flatpickr("#start_time",{
        enableTime: true,
        noCalendar: true,
        time_24hr: true,
        dateFormat: "H:i",
        onClose: function(selectedDates, dateStr, instance){
           lastdate();
        }
    })

    flatpickr("#end_time",{
        enableTime: true,
        noCalendar: true,
        time_24hr: true,
        dateFormat: "H:i",
    })

    function lastdate() {
        let mindate = document.getElementById('start_time').value;
        document.getElementById('end_time').value = mindate;
        flatpickr("#end_time",{
            enableTime: true,
            noCalendar: true,
            time_24hr: true,
            dateFormat: "H:i",
            minTime: mindate,
            defaultDate: mindate
        })
    }

</script>
    @endsection
