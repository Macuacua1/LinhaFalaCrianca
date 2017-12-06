
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

        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body tab-content" id="conteudo">
        <div class="section-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
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

                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="row">
                            <div class="col-md-12 col-sm-12" style="border: 1px solid #ccc;margin: 45px 10px 20px 0;height: auto">
                               {{--<div class="row" style="width: 30%;height: 15px;margin:-25px 20px 0 200px">--}}
                               <div class="row">
                                    <div class="col-md-8 col-sm-8">
                                        <span style="margin: -15px 0 0 10px;font-size: 16px;color: black"><b><center>Contacto Principal</center></b></span>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li class="clearfix" style="background-color: #f2f3f3;margin: 5px auto">
                                                <a href="details.html">
                                                    <i class="fa fa-phone" aria-hidden="true"></i> Contacto<br/>
                                                    <span class="opacity-50">
											<i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;25-11-2017
										</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12" style="border: 1px solid #ccc;margin:-5px 10px 20px 0;height: 100px">
                                <span style="margin-left: 10px;font-size: 16px;color: black"><b>Contactos de Cobrança </b></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!--end .container -->
        </div><!--end .section-body -->
    {{--</section>--}}
                </div>
            </div>
    </div>

@endsection