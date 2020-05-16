<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Ticket</h2>
            </div>
            <!-- Bar Chart -->
            <div class="body" style="width:500px;height:400px;">
                {!! $cha->container() !!}
                {!! $cha->script() !!}
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Service</h2>
            </div>
            <!-- Pie Chart -->
            <div class="body" style="width:500px;height:400px;">
                {!! $char->container() !!}
                {!! $char->script() !!}
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6">
                        <h2>Users</h2>
                    </div>

                </div>
            </div>
            <!-- Line Chart -->
            <div class="body" style="width:100%;height:400px;">
                {!! $chart->container() !!}
                {!! $chart->script() !!}
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6">
                        <h2>Users</h2>
                    </div>

                </div>
            </div>
            <!-- Line Chart -->
            <div class="body" style="width:100%;height:400px;">
                {!! $chs->container() !!}
                {!! $chs->script() !!}
            </div>
        </div>
    </div>
</div>
