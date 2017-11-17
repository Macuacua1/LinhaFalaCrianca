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
                        <header>Estatisticas dos Casos</header>
                    </div>
                </div><!--end .card -->
            </div>
        </div><!--end .col -->
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-head">
                        <ul class="nav nav-tabs" data-toggle="tabs" id="titulos">
                            <li class="active"><a href="#estado">Por Estado</a></li>
                            <li><a href="#instituicao">Por Instituição</a></li>
                            <li><a href="#motivo">Por Motivo</a></li>
                        </ul>
                    </div><!--end .card-head -->
                    <div class="card-body tab-content" id="conteudo">
                        <div class="tab-pane active" id="estado">
                            {{--<center>--}}
                                {{--{!! $chart_estado->render() !!}--}}

                            {{--</center>--}}
                            {{--<div id='chart_div'></div>--}}
                            <div class="row">
                                <div class="col-sm-5 col-sm-5">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Filtro por Datas</legend>
                                        <div class="form-group">
                                            <div  class="input-daterange input-group demo-date-range" id="demo-date-range">
                                                <div class="input-group-content">
                                                    <input type="text" class="form-control" name="start" id="startestado"/>
                                                    <label>De</label>
                                                </div>
                                                <span class="input-group-addon">a</span>
                                                <div class="input-group-content">
                                                    <input type="text" class="form-control" name="end" id="endestado" />
                                                    <label>Para</label>
                                                    <div class="form-control-line"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </fieldset>
                                    <a id="exportestado" href="#" style="display: none;margin-left: 300px" download="FileName"><button class="btn btn-success" type="button">
                                            <span class="glyphicon glyphicon-download"></span>
                                            {{--<span class='glyphicon glyphicon-download-alt'></span>--}}
                                            Exportar Imagem
                                        </button></a>

                                </div>
                                <div class="col-md-7 col-sm-7">
                                    <center>
                                        <div id="estadochart" class="chart"></div>
                                    </center>

                                </div>
                            </div>

                        </div>

                        <div class="tab-pane active" id="instituicao">
                            <div class="row">

                                    {{--<center>--}}
                                        {{--<div id="instituicaochart" style="width: 900px; height: 500px;"></div>--}}
                                    {{--</center>--}}
                                <div class="row">
                                    <div class="col-sm-5 col-sm-5">
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">Filtro por Datas</legend>
                                            <div class="form-group">
                                                <div  class="input-daterange input-group demo-date-range" id="demo-date-range">
                                                    <div class="input-group-content">
                                                        <input type="text" class="form-control" name="start" id="startinst"/>
                                                        <label>De</label>
                                                    </div>
                                                    <span class="input-group-addon">a</span>
                                                    <div class="input-group-content">
                                                        <input type="text" class="form-control" name="end" id="endinst" />
                                                        <label>Para</label>
                                                        <div class="form-control-line"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </fieldset>
                                        <a id="exportinst" href="#" style="display: none;margin-left: 300px" download="FileName"><button class="btn btn-success" type="button">
                                                <span class="glyphicon glyphicon-download"></span>
                                                {{--<span class='glyphicon glyphicon-download-alt'></span>--}}
                                                Exportar Imagem
                                            </button></a>

                                    </div>
                                    <div class="col-md-7 col-sm-7">
                                        <center>
                                            <div id="instituicaochart" class="chart"></div>
                                        </center>

                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="tab-pane active" id="motivo">
                            <div class="row">
                                    {{--<center>--}}
                                        {{--<div id="motivochartcaso" style="width: 900px; height: 500px;"></div>--}}
                                    {{--</center>--}}
                                <div class="row">
                                    <div class="col-sm-5 col-sm-5">
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">Filtro por Datas</legend>
                                            <div class="form-group">
                                                <div  class="input-daterange input-group demo-date-range" id="demo-date-range">
                                                    <div class="input-group-content">
                                                        <input type="text" class="form-control" name="start" id="startmot"/>
                                                        <label>De</label>
                                                    </div>
                                                    <span class="input-group-addon">a</span>
                                                    <div class="input-group-content">
                                                        <input type="text" class="form-control" name="end" id="endmot" />
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
                                        {{--<td><div id="motivochartcaso" style="border: 1px solid #ccc"class="chart"></div></td>--}}
                                        <center>
                                            <div id="motivochartcaso" class="chart"></div>
                                        </center>

                                    </div>
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
        {{--<div id="content">--}}

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

        {{--</div><!--end #content-->--}}
        <!-- END CONTENT -->

    @endif

@endsection
@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {

            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawChartee);
            google.charts.setOnLoadCallback(drawChart);
            google.charts.setOnLoadCallback(drawCharte);
//            google.charts.setOnLoadCallback(drawCharti);


            function drawChartee() {

                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    @foreach($estados as $estado)
                    ['{{$estado->estado}}', {{$estado->total}}],
                    @endforeach
                ]);

                var options = {
                    title: 'Estatísticas por Estado'
                };

                var chart = new google.visualization.PieChart(document.getElementById('estadochart'));
                google.visualization.events.addListener(chart,'ready',function () {
                    var exportdata=chart.getImageURI() ;
                    $('#exportestado').attr({'href':exportdata,'download':'Relatorio de Estatísticas por Estado'}).show();
                });

                chart.draw(data, options);
            }

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                        @foreach($instituicaos as $instituicao)
                    ['{{$instituicao->responsavel}}', {{$instituicao->total}}],
                    @endforeach
                ]);

                var options = {
                    title: 'Estatísticas por Instituição ',
                    is3D: true
                };

                var chart = new google.visualization.PieChart(document.getElementById('instituicaochart'));
                google.visualization.events.addListener(chart,'ready',function () {
                    var exportdata=chart.getImageURI() ;
                    $('#exportinst').attr({'href':exportdata,'download':'Relatorio de Estatísticas por Instituição'}).show();
                });

                chart.draw(data, options);
            }

            function drawCharte() {

                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                        @foreach($motivos as $motivo)
                    ['{{$motivo->motivo}}', {{$motivo->total}}],
                    @endforeach
                ]);

                var options = {
                    title: 'Estatísticas por Motivo do Caso',
                    width:400,
                    height:300,
                    legend: 'none'
                };

//                var chart = new google.visualization.PieChart(document.getElementById('motivochartcaso'));
                var chart = new google.visualization.BarChart(document.getElementById('motivochartcaso'));
                google.visualization.events.addListener(chart,'ready',function () {
                    var exportdata=chart.getImageURI() ;
                    $('#exportmotivo').attr({'href':exportdata,'download':'Relatorio por Motivo do Caso'}).show();
                });

                chart.draw(data, options);
            }
        });
    </script>
@stop