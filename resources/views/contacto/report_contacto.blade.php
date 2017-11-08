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
                                            <div  class="input-daterange input-group" id="demo-date-range">
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

                                </div>
                                <div class="col-md-7 col-sm-7">
                                    <center>
                                        <div id="provinciachart" class="chart"></div>
                                    </center>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane active" id="distrito">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group floating-label">
                                        <select id="provincia-id" name="provincia_id" class="form-control provincia">
                                            <option value="" disabled selected>--Provincia--</option>
                                            @foreach($prov as $pro)
                                                <option value="{{$pro->id}}">{{$pro->provincianome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group floating-label">
                                        <select id="distrito"  class="form-control distritonome" name="distrito_id">
                                            <option value="0" disabled="true" selected="true">--Distrito--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group floating-label">
                                        <select id="localidade" class="form-control localidadenome" name="localidade_id">
                                            <option value="0" disabled="true" selected="true">--Localidade--</option>
                                        </select>
                                    </div>
                                </div>
                                </div>
                            <center>
                                <div id="distritochart" class="chart" style="width: 900px; height: 500px;"></div>
                            </center>

                        </div>
                        <div class="tab-pane active" id="tipo_contacto">
                            <center>
                                <div id="tipochart" class="chart" style="width: 900px; height: 500px;"></div>
                            </center>

                        </div>
                        <div class="tab-pane active" id="motivo">
                            <center>
                                {{--<div id="motivochart" style="width: 900px; height: 500px;"></div>--}}
                                <div id="top_x_div" class="chart" style="width: 600px; height: 500px;"></div>
                            </center>


                        </div>
                        <div class="tab-pane active" id="idade">
                            <center>
                                {{--<div id="motivochart" style="width: 900px; height: 500px;"></div>--}}
                                <div id="idadechart" class="chart" style="width: 600px; height: 500px;"></div>
                            </center>


                        </div>
                        <div class="tab-pane active" id="genero">
                            <center>
                                {{--<div id="motivochart" style="width: 900px; height: 500px;"></div>--}}
                                <div id="generochart" class="chart" style="width: 600px; height: 500px;"></div>
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
            google.charts.setOnLoadCallback(drawStuff);
            google.charts.setOnLoadCallback(drawStu);

            function drawStuff() {
                var data = new google.visualization.arrayToDataTable([
                    ['Move', 'Percentage'],
                        @foreach($motivos as $motivo)
                    ['{{$motivo->motivo}}', {{$motivo->total}}],
                    @endforeach

                ]);

                var options = {
                    width: 600,
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

                var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                // Convert the Classic options to Material options.
                chart.draw(data, google.charts.Bar.convertOptions(options));
            }

            function drawCharti() {

                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    @foreach($provincias as $provincia)
                    ['{{$provincia->provincia}}', {{$provincia->total}}],
                    @endforeach
                ]);

                var options = {
                    title: 'Número de Vítimas Por Província'
                };

                var chart = new google.visualization.PieChart(document.getElementById('provinciachart'));

                chart.draw(data, options);
            }

                function drawChartee() {

                    var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                            @foreach($distritos as $distrito)
                        ['{{$distrito->distrito}}', {{$distrito->total}}],
                        @endforeach
                    ]);

                    var options = {
                        title: 'Número de Vítimas Por Distrito'
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
                            @foreach($idades as $idade)
                        ['{{$idade->idade}}', {{$idade->total}}],
                        @endforeach
                    ]);

                    var options = {
                        title: 'Estatísticas por Idade das Vítimas ',
                        is3D: true
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('idadechart'));

                    chart.draw(data, options);
                }
            function drawStu() {

                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                        @foreach($generos as $genero)
                    ['{{$genero->genero}}', {{$genero->total}}],
                    @endforeach
                ]);

                var options = {
                    title: 'Número de Vítimas Por Província'
                };

                var chart = new google.visualization.PieChart(document.getElementById('generochart'));

                chart.draw(data, options);
            }
            });
    </script>
  <script type="text/javascript">
      $("#startpro").on('change',function(){
          var minDate = $('#startpro').datepicker('getDate');
          $("#endpro").datepicker("change", { minDate: minDate });
          var inicio=$('#startpro').val();
          var fim= $('#endpro').val();
          pesquisarCaso(inicio,fim);
      });

      $("#endpro").on('change',function () {
          var maxDate = $('#endpro').datepicker('getDate');
          var inicio=$('#startpro').val();
          var fim= $('#endpro').val();
//          alert(fim);
          pesquisarCaso(inicio,fim);
      });
      function pesquisarCaso(criteria1,criteria2) {
          var dados= " ";
          $.ajax({
              type: 'post',
              url: '/pesquisapro',
              data: {inicio:criteria1,fim:criteria2},
              success: function(data) {
                  if (data) {
//                      $('#provinciachart').empty();

                  }else {
                      $('#provinciachart').empty();
//                            alert('Nao Existem dados');

                  }
              }
          });

      }
  </script>
@stop