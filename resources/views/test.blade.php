@extends('layouts.master')
@section('style')
<style type="text/css">
    .chart {
        width: 100%;
        min-height: 450px;
    }
</style>
@endsection
@section('content')

        <div class="row">
            <table class="columns ">
                <tr>
                    <td><div id="piechart_div" class="chart" style="border: 1px solid #ccc"></div></td>
                    <td><div id="barchart_div" class="chart" style="border: 1px solid #ccc"></div></td>
                    <td><div id="table_div" class="chart" ></div></td>
                </tr>
            </table>
            <div class="col-md-2 clo-sm-6">
                <a id="exporttest" href="#" style="display: none;" download="FileName"><button class="btn btn-success" type="button">
                        <span class="glyphicon glyphicon-download"></span>
                        {{--<span class='glyphicon glyphicon-download-alt'></span>--}}
                        Exportar Imagem
                    </button></a>
            </div>
        </div><!--end .col -->
        {{--<div id="table_div"></div>--}}
        <div id="filter_div"></div>
        <div id="dashboard_div">
            <div id="chart_div"></div>

        </div>
        <div id="png"></div>

@endsection
@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    // Load Charts and the corechart and barchart packages.
    google.charts.load('current', {'packages':['corechart']});

    // Draw the pie chart and bar chart when Charts is loaded.
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Slices');
    data.addRows([
    ['Mushrooms', 3],
    ['Onions', 1],
    ['Olives', 1],
    ['Zucchini', 1],
    ['Pepperoni', 2]
    ]);

    var piechart_options = {title:'Pie Chart: How Much Pizza I Ate Last Night'};
    var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
//        google.visualization.events.addListener(piechart,'ready',function () {
//            var exportdata=piechart.getImageURI() ;
//            $('#exporttest').attr({'href':exportdata,'download':'Relatorio de Teste'}).show();
//        });
    piechart.draw(data, piechart_options);

    var barchart_options = {title:'Barchart: How Much Pizza I Ate Last Night',
    legend: 'none'};
    var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
        google.visualization.events.addListener(barchart,'ready',function () {
//            var exportdata=barchart.getImageURI() ;
//            $('#exporttest').attr({'href':exportdata,'download':'Relatorio de Teste'}).show();
        });
    barchart.draw(data, barchart_options);
    }
    </script>
        <script type="text/javascript">
                google.charts.load('current', {'packages':['table']});
        google.charts.setOnLoadCallback(drawTable);

        function drawTable() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Name');
            data.addColumn('number', 'Salary');
            data.addColumn('boolean', 'Full Time Employee');
            data.addRows([
                ['Mike',  {v: 10000, f: '$10,000'}, true],
                ['Jim',   {v:8000,   f: '$8,000'},  false],
                ['Alice', {v: 12500, f: '$12,500'}, true],
                ['Bob',   {v: 7000,  f: '$7,000'},  true]
            ]);

            var table = new google.visualization.Table(document.getElementById('table_div'));

            table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
        }
    </script>
    <script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.0','packages':['corechart']},{'name':'visualization','version':'1.0','packages':['controls']}]}"></script>
    <script type="text/javascript">
//        google.charts.load('current', {'packages':['corechart']});
        google.setOnLoadCallback(drawDashboard);

        function drawDashboard() {

            // Create our data table.
            var data = google.visualization.arrayToDataTable([
                ['Name', 'Donuts eaten'],
                ['Michael' , 5],
                ['Elisa', 7],
                ['Robert', 3],
                ['John', 2],
                ['Jessica', 6],
                ['Aaron', 1],
                ['Margareth', 8]
            ]);



            // Create a dashboard.
            var dashboard = new google.visualization.Dashboard(
                    document.getElementById('dashboard_div'));

            // Create a range slider, passing some options
            var select = new google.visualization.ControlWrapper({
                'controlType': 'CategoryFilter',
                'containerId': 'filter_div',
                'options': {
                    'filterColumnLabel': 'Donuts eaten'
                }
            });

            // Create a pie chart, passing some options
            var chart = new google.visualization.ChartWrapper({
                'chartType': 'ColumnChart',
                'containerId': 'chart_div',
                'options': {
                    'width': 500,
                    'height': 300,
                    'legend': 'right'
                }
            });

            google.visualization.events.addListener(chart, 'ready', function() {
                var exportdata=chart.getImageURI() ;
                $('#exporttest').attr({'href':exportdata,'download':'Relatorio de Teste'}).show();});

            // Establish dependencies, declaring that 'filter' drives 'pieChart',
            // so that the pie chart will only display entries that are let through
            // given the chosen slider range.
            dashboard.bind(select, chart);

            // Draw the dashboard.
            dashboard.draw(data);
        }
    </script>
    @endsection