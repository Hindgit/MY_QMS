<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Typography | Bootstrap Based Admin Template - Material Design</title>
    <style>
        .fill{
            background-color: white;
        }
        img{
            width: 50px;
        }
        .right-sidebar .nav-tabs + .tab-content{
            padding: 0;
        }
        .right-sidebar p {
            margin: 20px 15px 15px 15px;
            font-weight: bold;
            text-align: center;
        }
        .right-sidebar #settings .setting-list {
            list-style: none;
            padding-left: 0;
            margin-bottom: 20px;
        }
        .right-sidebar #settings .setting-list li {
            padding: 15px;
            position: relative;
            border-top: 1px solid #eee;
        }
        .right-sidebar #settings .setting-list li .switch {
            position: absolute;
            top: 15px;
            right: 5px;
        }
        .right-sidebar {
            width: 600px;
            height: 100vh;
            position: fixed;
            right: -600px;
            top: 0px;
            background: #fdfdfd;
            z-index: 11 !important;
            -webkit-box-shadow: -2px 2px 5px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: -2px 2px 5px rgba(0, 0, 0, 0.1);
            -ms-box-shadow: -2px 2px 5px rgba(0, 0, 0, 0.1);
            box-shadow: -2px 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            -moz-transition: 0.5s;
            -o-transition: 0.5s;
            -webkit-transition: 0.5s;
            transition: 0.5s;
        }
        .right-sidebar.open {
            right: 0;
        }
        .right-sidebar .nav-tabs {
            font-weight: 600;
            font-size: 13px;
            width: 100%;
            margin-left: 2px;
        }
        .right-sidebar .nav-tabs li {
            text-align: center;
        }
        .right-sidebar .nav-tabs li > a {
            margin-right: 0;
        }
        .right-sidebar .nav-tabs li:first-child {
            width: 45%;
        }
        .right-sidebar .nav-tabs li:last-child {
            width: 55%;
        }
        .mat{
            position: relative;
            top:6px;
        }
    </style>
    <!-- Favicon-->

    <!-- Google Fonts -->
    <link href="css/Roboto.css" rel="stylesheet" type="text/css">
    <link href="css/icon.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="equal-height-columns.css">
    <style>
        a{
            color: #b73333;
        }
        .infos tr{
            height: 70px;
        }
        .infos{
            position: relative;
            top:120px;
        }
        @media(max-width:800px){
            tr{
                height: 40px;
            }
            .infos{
                position: relative;
                top:40px;
            }
        }
    </style>
</head>

<body>
<section>
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <div class="tab-content" style="margin: 15px;">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Numéro</th>
                        <th>Heure d'arrivée</th>
                        <th>Temps d'attente</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th colspan="4">Total des visiteurs en attent : <span id="count_user">0</span></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <tr>
                        <td><a href="javascript:void(0);"><i class="material-icons">call</i></a></td>
                        <td>001</td>
                        <td>10:00:00</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>
<div class=" fill">
    <div class="">
        <div class="pull-right" style="margin: 10px">
            <span id="service" class="h3">Serive 1</span><br>
            <center id="user" class="small">
                <div style="font-size: 19px;">
                    {{ Auth::user()->name }}
                </div>
            </center>
        </div>
        <div><i class="material-icons" style="position: relative;top: 6px;">access_time</i>&nbsp;<span style="font-size: 16px;" id="time"></span></div>
    </div>
    <div class="infos">
        <div class="col-sm-offset-2 col-sm-8">
            <table style="width: 100%">
                <tr>
                    <td style="font-weight: bold; font-size: 15px;text-align: right">Appel du visiteur</td>
                    <td style="text-align: center">Appel en cours</td>
                </tr>
                <tr>
                    <td>Ticket numéro : <span id="ticket_number">---</span></td>
                    <td>Service demandé : <span id="service_name">---</span></td>
                </tr>
                <tr>
                    <td>Heure d'arrivée : <span id="time_in">00:00:00</span></td>
                    <td>Temps d'attente : <span id="time_waite">00:00:00</span></td>
                </tr>
            </table>
        </div>

    </div>

    <div style="
        position:  absolute;
        width:  100%;
        bottom: 50px;
    ">
        <div class="col-sm-1 col-xs-2 col-sm-offset-3"><span></span><a href="javascript:void(0);"><i class="material-icons mat">arrow_forward</i> Suivant</a></span></div>
        <div class="col-sm-1 col-xs-2"><span><a href="javascript:void(0);"><i class="material-icons mat" >arrow_back</i> Précédent</a></span></div>
        <div class="col-sm-1 col-xs-2"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons mat">group</i> En attente</a></div>
        <div class="col-sm-1 col-xs-2"><span><a href="javascript:void(0);"><i class="material-icons mat">person</i> Son ticket</a></span></div>
        <div class="col-sm-1 col-xs-2"><span><a href="javascript:void(0);"><i class="material-icons mat">pause</i> Pause Ser</a></span></div>
        <div class="col-sm-1 col-xs-2">
            <span><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <i class="material-icons mat">close</i> Fermé</a>
            </span>
        </div>
    </div>
    <div class="pull-bottom" style="width: 100%; margin-top: 720px;">
        <div class="pull-right" style="margin-right: 10px;">
            <i class="material-icons" style="position: relative;top: 6px;">timer</i>&nbsp;<span>00:00:00</span>
        </div>
        <div class="" style="margin-left: 10px;">
            <i class="material-icons" style="position: relative;top: 6px;">access_alarm</i>&nbsp;<span>00:00:00</span>
        </div>
    </div>
</div>
<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/tables/jquery-datatable.js"></script>
<!-- Demo Js -->
<script src="js/demo.js"></script>
<!-- Jquery DataTable Plugin Js -->
<script>
    $(document).ready(function(){
        function startTime() {
            var today = new Date();
            var M=today.getMonth();
            var Y=today.getFullYear();
            var d=today.getDate();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            d=checkTime(d);
            M=checkTime(M)
            $('#time').text(d+'/'+M+'/'+Y+' '+h+':'+m+':'+s);
            var t = setTimeout(startTime, 1000);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
        startTime();
        function call(val,service,called=-1){
            $.ajax({
                type: 'GET',
                url: 'console/'+$(this).val()+'/1/'+($(this).val()=='call'?$('#text').val():''),
                success: function(data) {
                    $('#text').val(data);
                },
                error: function(req, status, error) { }
            });
        }
        $("input[type='button']").on('click',function(){

        });
    });
</script>
</body>

</html>
