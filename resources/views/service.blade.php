@extends('layouts.apphome')
    @section('content')
        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
                        <div class="row clearfix">
                            <div style ="margin-left: 82px; margin-right: 82px;">
                                <div class="card"  style="margin-top: 20px; padding-bottom: 38px; padding-left: 48px; padding-right: 48px;">
                                    <div class="body">
                                        <h2 text-align="center">ADD Services</h2>
                                        <form id="contactform" enctype="multipart/form-data" class="row" name="contactform" method="POST" action="/services"  method="post">
                                            {{ csrf_field() }}
                                            <div class="col-md-12">
                                                <div class="form-line">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="name" id="name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-line">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="description" id="description" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-line">
                                                    <label class="form-label">Start Time</label>
                                                    <input type="text" class="form-control" name="start_time" id="start_time" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-line">
                                                <label class="form-label">End Time</label>
                                                    <input type="text" class="form-control" name="end_time" id="end_time" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-line">
                                                <label class="form-label">Start Counter</label>
                                                    <input type="number" maxlength="3"  id="start_counter"  class="form-control" name="start_counter" required>
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
                                                    <input type="number" maxlength="3" id="end_counter" class="form-control" name="end_counter" required>
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
                                                    <input type="text" id="color" class="form-control" name="color" required>

                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-line">
                                                <label class="form-label">Background Color</label>
                                                    <input type="text" id="background_color"  class="form-control" name="background_color" required>

                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-top: 26px;">
                                                <div class="form-line">
                                                    <label class="form-label">Templaite</label>
                                                    <input type="number" id="service_tp_id" class="form-control" name="service_tp_id" required>
                                                     @error('service_tp_id')
                                                             <div class="alert alert-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <button class="btn btn-primary waves-effect" type="submit" value="submit" id="submit">Ajouter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </Section>
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
