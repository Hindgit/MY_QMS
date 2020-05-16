@extends('layouts.apphome')
    @section('content')
        <head>
            <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
            <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
        </head>
        <body>
        <div class="col-md-3"></div>
        <div class="col-md-6 well" style="margin-top: 110px">
            <hr style="border-top:1px dotted #ccc;"/>
            <div class="col-md-12" style="height:75px; border:1px solid #000; text-align:center; padding-top:2%;">
                <label style="font-size:30px;" id="input1" draggable="true" ondragstart="drag(event)">Textbox</label> |
                <label style="font-size:30px;" id="input2" draggable="true" ondragstart="drag(event)">Date</label> |
                <label style="font-size:30px;" id="input3" draggable="true" ondragstart="drag(event)">Nombre</label> |
                <label style="font-size:30px;" id="input4" draggable="true" ondragstart="drag(event)">Select</label>
            </div>
            <br style="clear:both;"/><br />
            <div class="col-md-3"></div>
            <div class="col-md-6" style="border:1px solid #000; height:200px; padding-top:10%; padding-left:10%;" ondrop="drop(event)" ondragover="dragOver(event)">
                <h2>DROP HERE</h2>
            </div>
            <a id="submit"><span></span></a>
            <form id="jsonform" action="merge.php" method="POST">
				<input id="jsondata" name="jsondata" type="hidden" value="" autocomplete="off"></input>
			</form>
        </div>
        <script src="../../js/scrip.js"></script>

@endsection
