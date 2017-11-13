
@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-primary" style="margin-top: -5px!important;padding-top: -5px!important;">
                    <header>Detalhes do Caso</header>
                </div>
            </div><!--end .card -->
        </div>
    </div><!--end .row -->
    {{--<section>--}}
        {{--<div class="section-header">--}}
            {{--<ol class="breadcrumb">--}}
                {{--<li class="active">Timeline</li>--}}
            {{--</ol>--}}

        {{--</div>--}}
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body tab-content" id="conteudo">
        <div class="section-body">
            <div class="container">
                <!-- BEGIN FIXED TIMELINE -->
                <span style="margin-left: 10px;font-size: 16px;color: black"><b>Mensagens</b></span>
                <ul class="timeline collapse-lg timeline-hairline">
                    @foreach($msgs as $msg)
                    <li class="timeline-inverted">
                        <div class="timeline-circ circ-xl style-primary"><span class="fa fa-quote-left"></span></div>
                        <div class="timeline-entry">
                            <div class="card style-default-light">
                                <div class="card-body small-padding">
                                    {{--<img class="img-circle img-responsive pull-left width-1" src="../../assets/img/modules/materialadmin/avatar9463a.jpg?1422538626" alt="" />--}}
                                    <span class="text-medium">{{$msg->mensagem}}</span><br/>
                                    <span class="opacity-50" style="color:#ed0000">
										{{date('d-M-Y',strtotime($msg->created_at))}}, {{date('H:m:s',strtotime($msg->created_at))}}
									</span>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </div><!--end .timeline-entry -->
                    </li>
                        @endforeach
                </ul>
                <!-- END FIXED TIMELINE -->

            </div><!--end .container -->
        </div><!--end .section-body -->
    {{--</section>--}}
                </div>
            </div>
    </div>

@endsection