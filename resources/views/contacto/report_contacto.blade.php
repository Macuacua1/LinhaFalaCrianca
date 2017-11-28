@extends('layouts.master')
@section('style')
    <style type="text/css">
        .chart {
            width: 100%;
            min-height: 450px;
        }
        fieldset.scheduler-border {
            border: 1px groove #ddd !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 100px 0 1.5em 0 !important;
            -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
            height: 180px;
            width: 100%;
        }

        legend.scheduler-border {
            font-size: 1.2em !important;
            font-weight: bold !important;
            text-align: left !important;
            width:auto;
            padding:0 10px;
            border-bottom:none;
        }
    </style>
    @endsection
@section('content')
    @if( Auth::user()->hasRole('admin'))
        <div class="row">
            <div class="col-lg-12" style="margin: -15px 0 0 auto">
                <div class="card">
                    <div class="card-head style-primary" style="margin-top: -5px!important;padding-top: -5px!important;">
                        <header>Estatisticas dos Contactos</header>
                    </div>
                </div><!--end .card -->
            </div>
        </div><!--end .col -->
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-head">
                        <ul class="nav nav-tabs" data-toggle="tabs" id="titulos">
                            <li class="active"><a href="#provincia">Por Provincia</a></li>
                            <li><a href="#distrito">Por Distrito</a></li>
                            <li><a href="#tipo_contacto">Por Tipo de Contacto</a></li>
                            <li><a href="#motivo">Por Motivo</a></li>
                            <li><a href="#idade">Por Idade</a></li>
                            <li><a href="#genero">Por Genero</a></li>
                        </ul>
                    </div><!--end .card-head -->
                    <div class="card-body tab-content" id="conteudo">
                        <div class="tab-pane active" id="provincia">
                            <div class="row">
                                <div class="col-sm-5 col-sm-5">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Filtro por Datas</legend>
                                        <div class="form-group">
                                            <div  class="input-daterange input-group demo-date-range" id="demo-date-range">
                                                <div class="input-group-content">
                                                    <input type="text" class="form-control" name="start" id="startpro"/>
                                                    <label>De</label>
                                                </div>
                                                <span class="input-group-addon">a</span>
                                                <div class="input-group-content">
                                                    <input type="text" class="form-control" name="end" id="endpro" />
                                                    <label>Para</label>
                                                    <div class="form-control-line"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </fieldset>
                                    <div class="row">
                                        <div class="col-md-2 clo-sm-2"></div>
                                        <div class="col-md-2 clo-sm-4" style="margin-top: -5px;">
                                            {{--<a href=""><button class="btn btn-success" type="button" style="margin-left: 20px">--}}
                                                    {{--<span class="glyphicon glyphicon-refresh"></span>--}}
                                                {{--</button></a>--}}
                                        </div>
                                        <div class="col-md-2 clo-sm-6" style="margin-top: -5px;">
                                            <a id="exportprov" href="#" style="display: none;margin-left: 110px" download="FileName"><button class="btn btn-success" type="button">
                                                    <span class="glyphicon glyphicon-download"></span>
                                                    Exportar Imagem
                                                </button></a></div>
                                    </div>



                                </div>
                                <div class="col-md-7 col-sm-7">
                                    <table class="columns">
                                        <tr>
                                            <td><div id="provinciachart" style="border: 1px solid #ccc;margin:60px 10px 0 0;height: 310px"></div></td>
                                            <td style="margin-right: 20px"><div id="provinciatab" style="border: 1px solid #ccc;margin: -15px 0 50px 0;width: 100%!important;"></div></td>
                                        </tr>
                                    </table>
                                    {{--<center>--}}
                                        {{--<div id="provinciachart" class="chart"></div>--}}
                                    {{--</center>--}}

                                </div>
                            </div>

                        </div>

                        <div class="tab-pane active" id="distrito">
                            <div class="row">
                            <div class="col-sm-5 col-sm-5">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Filtro por Datas</legend>
                                    <div class="form-group">
                                        <div class="form-group floating-label">
                                            <select id="prov-id" name="provincia_id" class="form-control prov">
                                                <option value="" disabled selected>--Provincia--</option>
                                                @foreach($prov as $pro)
                                                    <option value="{{$pro->id}}">{{$pro->provincianome}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div  class="input-daterange input-group demo-date-range" id="demo-date-range">
                                            <div class="input-group-content">
                                                <input type="text" class="form-control" name="startdist" id="startdist"/>
                                                <label>De</label>
                                            </div>
                                            <span class="input-group-addon">a</span>
                                            <div class="input-group-content">
                                                <input type="text" class="form-control" name="enddist" id="enddist" />
                                                <label>Para</label>
                                                <div class="form-control-line"></div>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <a id="exportdist" href="#" style="display: none;margin-left: 300px" download="FileName"><button class="btn btn-success" type="button">
                                        <span class="glyphicon glyphicon-download"></span>
                                        {{--<span class='glyphicon glyphicon-download-alt'></span>--}}
                                        Exportar Imagem
                                    </button></a>

                            </div>
                            <div class="col-md-7 col-sm-7">
                                <table class="columns">
                                    <tr>
                                        <td><div id="distritochart" style="border: 1px solid #ccc;margin:60px 10px 0 0;height: 310px"></div></td>
                                        <td style="margin-right: 20px"><div id="distritotab" style="border: 1px solid #ccc;margin: -15px 0 50px 0;width: 100%!important;"></div></td>
                                    </tr>
                                </table>
                            {{--<center>--}}
                                {{--<div id="distritochart" class="chart"></div>--}}
                            {{--</center>--}}
                            </div>

                        </div>
                            </div>
                        <div class="tab-pane active" id="tipo_contacto">
                            <div class="row">
                                <div class="col-sm-5 col-sm-5">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Filtro por Datas</legend>
                                        <div class="form-group">
                                            <div  class="input-daterange input-group demo-date-range" id="demo-date-range">
                                                <div class="input-group-content">
                                                    <input type="text" class="form-control" name="starttipo" id="starttipo"/>
                                                    <label>De</label>
                                                </div>
                                                <span class="input-group-addon">a</span>
                                                <div class="input-group-content">
                                                    <input type="text" class="form-control" name="endtipo" id="endtipo" />
                                                    <label>Para</label>
                                                    <div class="form-control-line"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </fieldset>
                                    <a id="exporttipo" href="#" style="display: none;margin-left: 300px" download="FileName"><button class="btn btn-success" type="button">
                                            <span class="glyphicon glyphicon-download"></span>
                                            Exportar Imagem
                                        </button></a>

                                </div>
                                <div class="col-md-7 col-sm-7">
                                    <table class="columns">
                                        <tr>
                                            <td><div id="tipochart" style="border: 1px solid #ccc;margin:60px 10px 0 0;height: 310px"></div></td>
                                            <td style="margin-right: 20px"><div id="tipotab" style="border: 1px solid #ccc;margin: -15px 0 50px 0;width: 100%!important;"></div></td>
                                        </tr>
                                    </table>
                                    {{--<center>--}}
                                        {{--<div id="tipochart" class="chart"></div>--}}
                                    {{--</center>--}}

                                </div>
                            </div>

                        </div>
                        <div class="tab-pane active" id="motivo">

                            <div class="row">
                                <div class="col-sm-5 col-sm-5">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Filtro por Datas</legend>
                                        <div class="form-group">
                                            <div  class="input-daterange input-group demo-date-range" id="demo-date-range">
                                                <div class="input-group-content">
                                                    <input type="text" class="form-control" name="startmotivo" id="startmotivo"/>
                                                    <label>De</label>
                                                </div>
                                                <span class="input-group-addon">a</span>
                                                <div class="input-group-content">
                                                    <input type="text" class="form-control" name="endmotivo" id="endmotivo" />
                                                    <label>Para</label>
                                                    <div class="form-control-line"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </fieldset>
                                    <a id="exportmotivo" href="#" style="display: none;margin-left: 300px" download="FileName"><button class="btn btn-success" type="button">
                                            <span class="glyphicon glyphicon-download"></span>
                                            {{--<span class='glyphicon glyphicon-download-alt'></span>--}}
                                            Exportar Imagem
                                        </button></a>

                                </div>
                                <div class="col-md-7 col-sm-7">
                                    <table class="columns">
                                        <tr>
                                            <td><div id="motivochart" style="border: 1px solid #ccc;margin:60px 10px 0 0;height: 310px"></div></td>
                                            <td style="margin-right: 20px"><div id="motivotab" style="border: 1px solid #ccc;margin: -15px 0 50px 0;width: 100%!important;"></div></td>
                                        </tr>
                                    </table>
                                    {{--<center>--}}
                                        {{--<div id="top_x_div" class="chart"></div>--}}
                                    {{--</center>--}}

                                </div>
                            </div>

                        </div>
                        <div class="tab-pane active" id="idade">
                            {{--<center>--}}
                                {{--<div id="idadechart" class="chart" style="width: 600px; height: 500px;"></div>--}}
                            {{--</center>--}}
                            <div class="row">
                                <div class="col-sm-5 col-sm-5">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Filtro por Datas</legend>
                                        <div class="form-group">
                                            <div  class="input-daterange input-group demo-date-range" id="demo-date-range">
                                                <div class="input-group-content">
                                                    <input type="text" class="form-control" name="startidade" id="startidade"/>
                                                    <label>De</label>
                                                </div>
                                                <span class="input-group-addon">a</span>
                                                <div class="input-group-content">
                                                    <input type="text" class="form-control" name="endidade" id="endidade" />
                                                    <label>Para</label>
                                                    <div class="form-control-line"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </fieldset>
                                    <a id="exportidade" href="#" style="display: none;margin-left: 300px" download="FileName"><button class="btn btn-success" type="button">
                                            <span class="glyphicon glyphicon-download"></span>
                                            {{--<span class='glyphicon glyphicon-download-alt'></span>--}}
                                            Exportar Imagem
                                        </button></a>

                                </div>
                                <div class="col-md-7 col-sm-7">
                                    <table class="columns">
                                        <tr>
                                            <td><div id="idadechart" style="border: 1px solid #ccc;margin-right: 10px"></div></td>
                                            <td><div id="idadetab" style="border: 1px solid #ccc;margin: -150px 10px 50px 0;width: 100%!important;"></div></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>


                        </div>
                        <div class="tab-pane active" id="genero">
                            <div class="row">
                                <div class="col-sm-5 col-sm-5">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Filtro por Datas</legend>
                                        <div class="form-group">
                                            <div  class="input-daterange input-group demo-date-range" id="demo-date-range">
                                                <div class="input-group-content">
                                                    <input type="text" class="form-control" name="startgenero" id="startgenero"/>
                                                    <label>De</label>
                                                </div>
                                                <span class="input-group-addon">a</span>
                                                <div class="input-group-content">
                                                    <input type="text" class="form-control" name="endgenero" id="endgenero" />
                                                    <label>Para</label>
                                                    <div class="form-control-line"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </fieldset>

                                    <a id="exportgenero" href="#" style="display: none;margin-left: 300px" download="FileName"><button class="btn btn-success" type="button">
                                            <span class="glyphicon glyphicon-download"></span>
                                            {{--<span class='glyphicon glyphicon-download-alt'></span>--}}
                                            Exportar Imagem
                                        </button></a>

                                </div>
                                <div class="col-md-7 col-sm-7">
                                    <table class="columns">
                                        <tr>
                                            <td><div id="generochart" style="border: 1px solid #ccc;margin:60px 10px 0 0;height: 310px"></div></td>
                                            <td style="margin-right: 20px"><div id="generotab" style="border: 1px solid #ccc;margin: -15px 0 50px 0;width: 100%!important;"></div></td>
                                        </tr>
                                    </table>
                                    {{--<center>--}}
                                        {{--<div id="generochart" class="chart"></div>--}}
                                    {{--</center>--}}

                                </div>
                            </div>


                        </div>
                        {{--</div>--}}
                    </div><!--end .card-body -->
                </div><!--end .card -->
            </div><!--end .col -->
        </div><!--end .col -->
    @else
        <!-- BEGIN CONTENT-->
        <div id="content">

            <!-- BEGIN 404 MESSAGE -->
            <section>
                <div class="section-header">
                    <ol class="breadcrumb">
                        <li><a href="">home</a></li>
                        <li class="active">404</li>
                    </ol>

                </div>
                <div class="section-body contain-lg">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1><span class="text-xxxl text-light">404 <i class="fa fa-search-minus text-primary"></i></span></h1>
                            <h2 class="text-light">This page does not exist</h2>
                        </div><!--end .col -->
                    </div><!--end .row -->
                </div><!--end .section-body -->
            </section>
            <!-- END 404 MESSAGE -->

            <!-- BEGIN SEARCH SECTION -->
            <section>
                <div class="section-body contain-sm">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="You're searching for...">
                        <span class="input-group-btn"><button class="btn btn-primary" type="submit">Find</button></span>
                    </div>
                </div><!--end .section-body -->
            </section>
            <!-- END SEARCH SECTION -->

        </div><!--end #content-->
        <!-- END CONTENT -->
    @endif
@endsection
@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {

                google.charts.load('current', {'packages': ['corechart']});
            google.charts.load('current', {'packages':['table']});
//                google.charts.setOnLoadCallback(drawChartee);
                google.charts.setOnLoadCallback(pesquisaDist);
                google.charts.setOnLoadCallback(drawChart);
                google.charts.setOnLoadCallback(drawCharte);
            google.charts.setOnLoadCallback(drawCharti);
            google.charts.setOnLoadCallback(drawStuff);
            google.charts.setOnLoadCallback(drawStu);


            function drawStuff() {
                var data = new google.visualization.arrayToDataTable([
                    ['Motivo', 'Total'],
                        @foreach($motivos as $motivo)
                    ['{{$motivo->motivo}}', {{$motivo->total}}],
                    @endforeach

                ]);

                var options = {
                    width: 400,
                    legend: { position: 'none' },
                    chart: {
                        title: 'Estatísticas por Motivo do Contacto',
                        subtitle: 'Motivo por Contacto' },
                    axes: {
                        x: {
                            0: { side: 'botton', label: 'Motivos'} // Top x-axis.
                        }
                    },
                    bar: { groupWidth: "70%" }
                };
                var chart = new google.visualization.BarChart(document.getElementById('motivochart'));
                var table = new google.visualization.Table(document.getElementById('motivotab'));

//                var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                google.visualization.events.addListener(chart,'ready',function () {
                    var exportdata=chart.getImageURI();
                    $('#exportmotivo').attr({'href':exportdata,'download':'Relatorio por Motivo do Contacto'}).show();
                });
                chart.draw(data, options);
                table.draw(data, {showRowNumber: false, width: '300px', height: '100%'});

            }

            function drawCharti() {

                var data = google.visualization.arrayToDataTable(
                        [
                    ['Provincia', 'Total'],
                    @foreach($provincias as $provincia)
                    ['{{$provincia->provincia}}', {{$provincia->total}}],
                    @endforeach
                ]
                );

                var options = {
                    title: 'Número de Vítimas Por Província'
                };
                var table = new google.visualization.Table(document.getElementById('provinciatab'));
                var chart = new google.visualization.PieChart(document.getElementById('provinciachart'));
                google.visualization.events.addListener(chart,'ready',function () {
                   var exportdata=chart.getImageURI() ;
                    $('#exportprov').attr({'href':exportdata,'download':'Relatorio do Número de Vítimas Por Província'}).show();
                });

                chart.draw(data, options);
                table.draw(data, {showRowNumber: false, width: '300px', height: '100%'});
            }


                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['Tipo', 'Total'],
                            @foreach($tipos as $tipo)
                        ['{{$tipo->tipo_contacto}}', {{$tipo->total}}],
                        @endforeach
                    ]);

                    var options = {
                        title: 'Estatísticas pelo Tipo de Contacto',
                        is3D: true
                    };

                    var table = new google.visualization.Table(document.getElementById('tipotab'));
                    var chart = new google.visualization.PieChart(document.getElementById('tipochart'));
                    google.visualization.events.addListener(chart,'ready',function () {
                        var exportdata=chart.getImageURI() ;
                        $('#exporttipo').attr({'href':exportdata,'download':'Relatorio de Estatísticas pelo Tipo de Contacto'}).show();
                    });

                    chart.draw(data, options);
                    table.draw(data, {showRowNumber: false, width: '300px', height: '100%'});
                }

                function drawCharte() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Idade');
                    data.addColumn('number', 'Total');
                    data.addRows([
                            @foreach($idades as $idade)
                        ['{{$idade->idade}}', {{$idade->total}}],
                        @endforeach
                    ]);

                    var options = {
                        title: 'Estatísticas por Idade das Vítimas ',
                        width:400,
                        height:300,
                        legend: 'none'
                    };
                    var table = new google.visualization.Table(document.getElementById('idadetab'));

                    var chart = new google.visualization.BarChart(document.getElementById('idadechart'));
                    google.visualization.events.addListener(chart,'ready',function () {
                        var exportdata=chart.getImageURI() ;
                        $('#exportidade').attr({'href':exportdata,'download':'Relatorio de Estatísticas por Idade das Vítimas'}).show();
                    });
                    chart.draw(data, options);
                    table.draw(data, {showRowNumber: false, width: '300px', height: '100%'});
                }
            function drawStu() {

                var data = google.visualization.arrayToDataTable([
                    ['Genero', 'Total'],
                        @foreach($generos as $genero)
                    ['{{$genero->genero}}', {{$genero->total}}],
                    @endforeach
                ]);

                var options = {
                    title: 'Número de Vítimas Por Genero'
                };
                var table = new google.visualization.Table(document.getElementById('generotab'));
                var chart = new google.visualization.PieChart(document.getElementById('generochart'));
                google.visualization.events.addListener(chart,'ready',function () {
                    var exportdata=chart.getImageURI() ;
                    $('#exportgenero').attr({'href':exportdata,'download':'Relatorio do Número de Vítimas Por Genero'}).show();
                });

                chart.draw(data, options);
                table.draw(data, {showRowNumber: false, width: '300px', height: '100%'});
            }
            });

        $("#startdist").on('change',function(){
            var minDate = $('#startdist').datepicker('getDate');
            $("#enddist").datepicker("change", { minDate: minDate });
            var inicio=$('#startdist').val();
            var fim= $('#enddist').val();
            var prov_id= $('#prov-id').val();
            pesquisaDist(prov_id,inicio,fim);
        });

        $("#enddist").on('change',function () {
            var maxDate = $('#enddist').datepicker('getDate');
            var inicio=$('#startdist').val();
            var fim= $('#enddist').val();
            var prov_id= $('#prov-id').val();
//          alert(fim);
            pesquisaDist(prov_id,inicio,fim);
        });

        $('#prov-id').on('change',function () {
            var prov_id= $('#prov-id').val();
            var inicio=$('#startdist').val();
            var fim= $('#enddist').val();
            pesquisaDist(prov_id,inicio,fim);
        });

        function pesquisaDist(prov_id,criteria1,criteria2) {
            var chardatd=[];
            var titulo=['Distrito','Total'];
            chardatd.push(titulo);

            $.ajax({
                type: 'post',
                url: '/pesquisadist',
                data: {id:prov_id,inicio:criteria1,fim:criteria2},
                dataType: 'json',
                success: function(data) {

                    data.forEach(function (dados) {
                        chardatd.push([dados.distrito,parseInt(dados.total)]);
                    });
                    drawDistrito(chardatd);

                },error:function () {
                    alert('Erro, plese try again')
                }
            });
        }

        function drawDistrito(datas) {

            var data = google.visualization.arrayToDataTable(datas);

            var options = {
                title: 'Número de Vítimas Por Distrito'
            };
            var table = new google.visualization.Table(document.getElementById('distritotab'));
            var chart = new google.visualization.PieChart(document.getElementById('distritochart'));
            google.visualization.events.addListener(chart,'ready',function () {
                var exportdata=chart.getImageURI() ;
                $('#exportdist').attr({'href':exportdata,'download':'Relatorio do Número de Vítimas Por Distrito'}).show();
            });
            chart.draw(data, options);
            table.draw(data, {showRowNumber: false, width: '300px', height: '100%'});

        }
        $("#startgenero").on('change',function(){
            var minDate = $('#startgenero').datepicker('getDate');
            $("#endgenero").datepicker("change", { minDate: minDate });
            var inicio=$('#startgenero').val();
            var fim= $('#endgenero').val();
            pesquisarGenero(inicio,fim);
        });

        $("#endgenero").on('change',function () {
            var maxDate = $('#endgenero').datepicker('getDate');
            var inicio=$('#startgenero').val();
            var fim= $('#endgenero').val();
//          alert(fim);
            pesquisarGenero(inicio,fim);
        });
        function pesquisarGenero(criteria1,criteria2) {
            var chardatg=[];
            var titulo=['Genero','Total'];
            chardatg.push(titulo);
            $.ajax({
                type: 'post',
                url: '/pesquisagenero',
                data: {inicio:criteria1,fim:criteria2},
                dataType: 'json',
                success: function(data) {
                    data.forEach(function (dados) {
                        chardatg.push([dados.genero,parseInt(dados.total)]);
                    });

                    drawGenero(chardatg);
//                  console.log(data);
                },error:function () {
                    alert('Erro, plese try again')
                }
            });

        }
        function drawGenero(dados) {

            var data = google.visualization.arrayToDataTable(dados);   //chardat

            var options = {
                title: 'Número de Vítimas Por Genero'
            };

            var table = new google.visualization.Table(document.getElementById('generotab'));
            var chart = new google.visualization.PieChart(document.getElementById('generochart'));
            google.visualization.events.addListener(chart,'ready',function () {
                var exportdata=chart.getImageURI() ;
                $('#exportgenero').attr({'href':exportdata,'download':'Relatorio do Número de Vítimas Por Genero'}).show();
            });

            chart.draw(data, options);
            table.draw(data, {showRowNumber: false, width: '300px', height: '100%'});
        }
        $("#startidade").on('change',function(){
            var minDate = $('#startidade').datepicker('getDate');
            $("#endidade").datepicker("change", { minDate: minDate });
            var inicio=$('#startidade').val();
            var fim= $('#endidade').val();
            pesquisarIdade(inicio,fim);
        });

        $("#endidade").on('change',function () {
            var maxDate = $('#endidade').datepicker('getDate');
            var inicio=$('#startidade').val();
            var fim= $('#endidade').val();
//          alert(fim);
            pesquisarIdade(inicio,fim);
        });

        function pesquisarIdade(criteria1,criteria2) {
            var chardati=[];
            var titulo=['Idade','Total'];
            chardati.push(titulo);
            $.ajax({
                type: 'post',
                url: '/pesquisaidade',
                data: {inicio:criteria1,fim:criteria2},
                dataType: 'json',
                success: function(data) {
                    data.forEach(function (dados) {
                        chardati.push([dados.idade,parseInt(dados.total)]);
                    });

                    drawIdade(chardati);
//                  console.log(data);
                },error:function () {
                    alert('Erro, plese try again')
                }
            });

        }
        function drawIdade(dados) {

            var data = google.visualization.arrayToDataTable(dados);   //chardat

            var options = {
                title: 'Estatísticas por Idade das Vítimas ',
                width:400,
                height:300,
                legend: 'none'
            };
            var table = new google.visualization.Table(document.getElementById('idadetab'));

            var chart = new google.visualization.BarChart(document.getElementById('idadechart'));
            google.visualization.events.addListener(chart,'ready',function () {
                var exportdata=chart.getImageURI() ;
                $('#exportidade').attr({'href':exportdata,'download':'Relatorio de Estatísticas por Idade das Vítimas'}).show();
            });
            chart.draw(data, options);
            table.draw(data, {showRowNumber: false, width: '300px', height: '100%'});
        }


        $("#starttipo").on('change',function(){
            var minDate = $('#starttipo').datepicker('getDate');
            $("#endtipo").datepicker("change", { minDate: minDate });
            var inicio=$('#starttipo').val();
            var fim= $('#endtipo').val();
            pesquisarTipo(inicio,fim);
        });

        $("#endtipo").on('change',function () {
            var maxDate = $('#endtipo').datepicker('getDate');
            var inicio=$('#starttipo').val();
            var fim= $('#endtipo').val();
//          alert(fim);
            pesquisarTipo(inicio,fim);
        });
        function pesquisarTipo(criteria1,criteria2) {
            var chardatt=[];
            var titulo=['Tipo','Total'];
            chardatt.push(titulo);
            $.ajax({
                type: 'post',
                url: '/pesquisatipo',
                data: {inicio:criteria1,fim:criteria2},
                dataType: 'json',
                success: function(data) {
                    data.forEach(function (dados) {
                        chardatt.push([dados.tipo_contacto,parseInt(dados.total)]);
                    });

                    drawTipo(chardatt);
//                  console.log(data);
                },error:function () {
                    alert('Erro, plese try again')
                }
            });

        }
        function drawTipo(dados) {

            var data = google.visualization.arrayToDataTable(dados);   //chardat

            var options = {
                title: 'Estatísticas pelo Tipo de Contacto',
                is3D: true
            };
            var table = new google.visualization.Table(document.getElementById('tipotab'));
            var chart = new google.visualization.PieChart(document.getElementById('tipochart'));
            google.visualization.events.addListener(chart,'ready',function () {
                var exportdata=chart.getImageURI() ;
                $('#exporttipo').attr({'href':exportdata,'download':'Relatorio de Estatísticas pelo Tipo de Contacto'}).show();
            });

            chart.draw(data, options);
            table.draw(data, {showRowNumber: false, width: '300px', height: '100%'});
        }
        $("#startpro").on('change',function(){
            var minDate = $('#startpro').datepicker('getDate');
            $("#endpro").datepicker("change", { minDate: minDate });
            var inicio=$('#startpro').val();
            var fim= $('#endpro').val();
            pesquisarPro(inicio,fim);
        });

        $("#endpro").on('change',function () {
            var maxDate = $('#endpro').datepicker('getDate');
            var inicio=$('#startpro').val();
            var fim= $('#endpro').val();
//          alert(fim);
            pesquisarPro(inicio,fim);
        });

        function pesquisarPro(criteria1,criteria2) {
            var chardatp=[];
            var titulo=['Provincia','Total'];
            chardatp.push(titulo);
            $.ajax({
                type: 'post',
                url: '/pesquisapro',
                data: {inicio:criteria1,fim:criteria2},
                dataType: 'json',
                success: function(data) {
                    data.forEach(function (dados) {
                        chardatp.push([dados.provincia,parseInt(dados.total)]);
                    });

                    drawProvincia(chardatp);
//                  console.log(data);
                },error:function () {
                    alert('Erro, plese try again')
                }
            });

        }
        function drawProvincia(dados) {

            var data = google.visualization.arrayToDataTable(dados);   //chardat

            var options = {
                title: 'Número de Vítimas Por Província'
            };

            var table = new google.visualization.Table(document.getElementById('provinciatab'));
            var chart = new google.visualization.PieChart(document.getElementById('provinciachart'));
            google.visualization.events.addListener(chart,'ready',function () {
                var exportdata=chart.getImageURI() ;
                $('#exportprov').attr({'href':exportdata,'download':'Relatorio do Número de Vítimas Por Província'}).show();
            });

            chart.draw(data, options);
            table.draw(data, {showRowNumber: false, width: '300px', height: '100%'});
        }
        $("#startmotivo").on('change',function(){
            var minDate = $('#startmotivo').datepicker('getDate');
            $("#endmotivo").datepicker("change", { minDate: minDate });
            var inicio=$('#startmotivo').val();
            var fim= $('#endmotivo').val();
            pesquisarMotivo(inicio,fim);
        });

        $("#endmotivo").on('change',function () {
            var maxDate = $('#endmotivo').datepicker('getDate');
            var inicio=$('#startmotivo').val();
            var fim= $('#endmotivo').val();
//          alert(fim);
            pesquisarMotivo(inicio,fim);
        });

        function pesquisarMotivo(criteria1,criteria2) {
            var chardatm=[];
            var titulo=['Motivo','Total'];
            chardatm.push(titulo);
            $.ajax({
                type: 'post',
                url: '/pesquisamotivo',
                data: {inicio:criteria1,fim:criteria2},
                dataType: 'json',
                success: function(data) {
                    data.forEach(function (dados) {
                        chardatm.push([dados.motivo,parseInt(dados.total)]);
                    });

                    drawMotivo(chardatm);
//                  console.log(data);
                },error:function () {
                    alert('Erro, plese try again')
                }
            });

        }
        function drawMotivo(dados) {

            var data = google.visualization.arrayToDataTable(dados);   //chardat

            var options = {
                width: 400,
                legend: { position: 'none' },
                chart: {
                    title: 'Estatísticas por Motivo do Contacto',
                    subtitle: 'Motivo por Contacto' },
                axes: {
                    x: {
                        0: { side: 'botton', label: 'Motivos'} // Top x-axis.
                    }
                },
                bar: { groupWidth: "70%" }
            };
            var chart = new google.visualization.BarChart(document.getElementById('motivochart'));
            var table = new google.visualization.Table(document.getElementById('motivotab'));

//                var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            google.visualization.events.addListener(chart,'ready',function () {
                var exportdata=chart.getImageURI();
                $('#exportmotivo').attr({'href':exportdata,'download':'Relatorio por Motivo do Contacto'}).show();
            });
            chart.draw(data, options);
            table.draw(data, {showRowNumber: false, width: '300px', height: '100%'});

        }


    </script>

@stop