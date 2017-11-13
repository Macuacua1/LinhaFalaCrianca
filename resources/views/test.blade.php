@extends('layouts.master')
@section('content')

        <div class="row">
            <table class="columns">
                <tr>
                    <td><div id="piechart_div" style="border: 1px solid #ccc"></div></td>
                    <td><div id="barchart_div" style="border: 1px solid #ccc"></div></td>
                </tr>
            </table>

        </div><!--end .col -->
        <div id="table_div"></div>

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

    var piechart_options = {title:'Pie Chart: How Much Pizza I Ate Last Night',
    width:400,
    height:300};
    var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
    piechart.draw(data, piechart_options);

    var barchart_options = {title:'Barchart: How Much Pizza I Ate Last Night',
    width:400,
    height:300,
    legend: 'none'};
    var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
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
    @endsection