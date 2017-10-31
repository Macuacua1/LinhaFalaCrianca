@extends('layouts.master')
@section('content')
    @if( Auth::user()->hasRole('admin'))
        <div class="row">
            <div class="col-lg-12">
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
                        </ul>
                    </div><!--end .card-head -->
                    <div class="card-body tab-content" id="conteudo">
                        <div class="tab-pane active" id="provincia">
                            <center>
                                <div id="provinciachart" style="width: 900px; height: 500px;"></div>
                            </center>

                        </div>

                        <div class="tab-pane active" id="distrito">
                            <center>
                                <div id="distritochart" style="width: 900px; height: 500px;"></div>
                            </center>

                        </div>
                        <div class="tab-pane active" id="tipo_contacto">
                            <center>
                                <div id="tipochart" style="width: 900px; height: 500px;"></div>
                            </center>

                        </div>
                        <div class="tab-pane active" id="motivo">
                            <center>
                                <div id="motivochart" style="width: 900px; height: 500px;"></div>
                            </center>

                        </div>
                        {{--</div>--}}
                    </div><!--end .card-body -->
                </div><!--end .card -->
            </div><!--end .col -->
        </div><!--end .col -->
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
            google.charts.setOnLoadCallback(drawCharti);

            function drawCharti() {

                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    {{--@foreach($results as $result)--}}
                    {{--['{{$result->stockName}}', {{$result->total}}],--}}
                    {{--@endforeach--}}
                ]);

                var options = {
                    title: 'My Daily Activities'
                };

                var chart = new google.visualization.PieChart(document.getElementById('provinciachart'));

                chart.draw(data, options);
            }

                function drawChartee() {

                    var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                            {{--@foreach($results as $result)--}}
                        {{--['{{$result->stockName}}', {{$result->total}}],--}}
                        {{--@endforeach--}}
                    ]);

                    var options = {
                        title: 'My Daily Activities'
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('distritochart'));

                    chart.draw(data, options);
                }

                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                            @foreach($tipos as $tipo)
                        ['{{$tipo->tipo_contacto}}', {{$tipo->total}}],
                        @endforeach
                    ]);

                    var options = {
                        title: 'Estatísticas pelo Tipo de Contacto',
                        is3D: true
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('tipochart'));

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
                        title: 'Estatísticas por Motivo do Contacto',
                        is3D: true
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('motivochart'));

                    chart.draw(data, options);
                }
            });
    </script>


@stop