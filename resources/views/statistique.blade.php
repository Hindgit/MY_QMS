@extends('layouts.apphome')
@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-xs-3">
                        <button type="button" class="btn bg-indigo waves-effect refreche">
                            <i class="material-icons">trending_up</i>
                            <span>TRENDING UP</span>
                        </button>
                    </div>
                    <div class="col-xs-9">
                        <div id="reportrange" name="range" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                            <i class="fa fa-calendar"></i>&nbsp;
                            <span></span> <i class="fa fa-caret-down"></i>
                        </div>
                    </div>
                </div>
                <div class="container" id="refe" style="    margin-top: 30px;">
                </div>
                <div class="dataa" id="refe" style="    margin-top: 30px;">
                    @include('data')
                </div>
            </div>
        </div>

    </section>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript">


        var date1 = moment().subtract(1, 'month').startOf('month');
        var date2 = moment().subtract(1, 'month').endOf('month');

        function cb(date1, date2) {
            $('#reportrange span').html(date1.format('D-MM-YYYY') + ' - ' + date2.format('D-MM-YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: date1,
            endDate: date2,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(date1, date2);
        $(document).ready(function () {

            $(".refreche").click(function(){
                $.ajax(
                    {
                        url: "/dashboard/"+date1.format('D-MM-YYYY')+"/"+date2.format('D-MM-YYYY'),
                        type: 'GET',
                    }).done(
                    function(data)
                    {
                        $('.container').html(data.html);
                    }
                );
            });

        });
    </script>
@endsection
