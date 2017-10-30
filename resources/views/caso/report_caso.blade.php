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

                        </div>

                        <div class="tab-pane active" id="instituicao">
                            <center>
                                {!! $chart_instituicao->render() !!}

                            </center>
                        </div>
                        <div class="tab-pane active" id="motivo">
                            <center>
                                {!! $chart_motivo->render() !!}

                            </center>
                        </div>
                        {{--</div>--}}
                    </div><!--end .card-body -->
                </div><!--end .card -->
            </div><!--end .col -->
        </div><!--end .col -->
        {{--<div class="row">--}}
            {{--<div class="col-md-12 col-sm-12" style="margin-bottom: 15px">--}}

                {{--<center>--}}
                    {{--{!! $chart_estado->render() !!}--}}

                {{--</center>--}}


            {{--</div><!--end .col -->--}}
            {{--<div class="col-md-6 col-sm-6" style="margin-bottom: 15px">--}}


                {{--<center>--}}
                    {{--{!! $caso->render() !!}--}}

                {{--</center>--}}


            {{--</div><!--end .col -->--}}
        {{--</div>--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-6 col-sm-6">--}}

                {{--<center>--}}
                    {{--{!! $chart->render() !!}--}}

                {{--</center>--}}


            {{--</div><!--end .col -->--}}
            {{--<div class="col-md-6 col-sm-6">--}}

                {{--<center>--}}
                    {{--{!! $case->render() !!}--}}

                {{--</center>--}}


            {{--</div><!--end .col -->--}}

        {{--</div><!--end .row -->--}}
    @endif

@endsection