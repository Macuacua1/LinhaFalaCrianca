@extends('layouts.master')
@section('content')
    @if( Auth::user()->hasRole('admin'))
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-head style-primary" style="margin-top: -5px!important;padding-top: -5px!important;">
                        <header>Estatisticas dos Casos</header>
                    </div>
                </div><!--end .card -->
            </div>
        </div><!--end .col -->
        <div class="row">
            {{--<div class="col-lg-12">--}}
            {{--<!-- BEGIN LAYOUT LEFT ALIGNED -->--}}
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
                            <center>
                                {!! $chart_estado->render() !!}

                            </center>
                            <div id='chart_div'></div>

                        </div>

                        <div class="tab-pane active" id="instituicao">
                            <div class="row">
                                {{--<div class="col-md-6 col-sm-6">--}}
                                    {{--<center>--}}
                                        {{--{!! $chart_instituicao->render() !!}--}}

                                    {{--</center>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6 col-sm-6">--}}
                                    <center>
                                        <div id="instituicaochart" style="width: 900px; height: 500px;"></div>
                                    </center>
                                {{--</div>--}}
                            </div>

                        </div>
                        <div class="tab-pane active" id="motivo">
                            <div class="row">
                                {{--<div class="col-md-6 col-sm-6">--}}
                                    {{--<center>--}}
                                        {{--{!! $chart_motivo->render() !!}--}}

                                    {{--</center>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6 col-sm-6">--}}
                                    <center>
                                        <div id="motivochartcaso" style="width: 900px; height: 500px;"></div>
                                    </center>
                                {{--</div>--}}
                            </div>

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
                        @foreach($instituicaos as $instituicao)
                    ['{{$instituicao->responsavel}}', {{$instituicao->total}}],
                    @endforeach
                ]);

                var options = {
                    title: 'Estatísticas por Instituição ',
                    is3D: true
                };

                var chart = new google.visualization.PieChart(document.getElementById('instituicaochart'));

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
                    is3D: true
                };

                var chart = new google.visualization.PieChart(document.getElementById('motivochartcaso'));

                chart.draw(data, options);
            }
        });
    </script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Element', 'Density', { role: 'style' }],
                ['Copper', 8.94, '#b87333', ],
                ['Silver', 10.49, 'silver'],
                ['Gold', 19.30, 'gold'],
                ['Platinum', 21.45, 'color: #e5e4e2' ]
            ]);

            var options = {
                title: "Density of Precious Metals, in g/cm^3",
                bar: {groupWidth: '95%'},
                legend: 'none',
            };

            var chart_div = document.getElementById('chart_div');
            var chart = new google.visualization.ColumnChart(chart_div);

            // Wait for the chart to finish drawing before calling the getImageURI() method.
            google.visualization.events.addListener(chart, 'ready', function () {
                chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
                console.log(chart_div.innerHTML);
            });

            chart.draw(data, options);

        }
    </script>



@stop