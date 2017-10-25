@extends('layouts.master')
@section('content')
    @if( Auth::user()->hasRole('admin') or Auth::user()->hasRole('user'))
        {{--<div class="row">--}}
            {{--<div class="col-lg-12">--}}
                {{--<div class="card">--}}
                    {{--<div class="card-head style-primary" style="margin-top: -5px!important;padding-top: -5px!important;">--}}
                        {{--<header>Meu Perfil</header>--}}
                    {{--</div>--}}
                {{--</div><!--end .card -->--}}
            {{--</div>--}}
        {{--</div><!--end .col -->--}}
            <section class="full-bleed" style="padding-top: 0px!important; margin-top: -22px;margin-left: -10px;margin-right: -10px;">
                <div class="section-body style-default-dark force-padding text-shadow">
                    <div class="img-backdrop" style="background-image: url('/img/modules/materialadmin/img16.jpg')"></div>
                    <div class="overlay overlay-shade-top stick-top-left height-3"></div>
                    <div class="row">
                        <div class="col-md-3 col-xs-5">
                            <img class="img-circle border-white border-xl img-responsive auto-width" src="/img/{{Auth::user()->avatar}}" alt="Avatar"  />
                            <h3>{{Auth::user()->nome}}<br/>
                                @if( Auth::user()->hasrole('admin'))
                                    <small>Administrator</small>
                                @elseif( Auth::user()->hasrole('user'))
                                    <small>Conselheiro</small>
                                @else
                                    <small>Sem Perfil</small>

                                @endif

                                </h3>
                        </div><!--end .col -->
                        <div class="col-md-9 col-xs-7">
                            <div class="width-3 text-center pull-right">
                                <strong class="text-xl">643</strong><br/>
                                <span class="text-light opacity-75">followers</span>
                            </div>
                            <div class="width-3 text-center pull-right">
                                <strong class="text-xl">108</strong><br/>
                                <span class="text-light opacity-75">following</span>
                            </div>
                        </div><!--end .col -->
                    </div><!--end .row -->
                    <div class="overlay overlay-shade-bottom stick-bottom-left force-padding text-right">
                        <a class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Contact me"><i class="fa fa-envelope"></i></a>
                        <a class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Follow me"><i class="fa fa-twitter"></i></a>
                        <a class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Personal info"><i class="fa fa-facebook"></i></a>
                    </div>
                </div><!--end .section-body -->
            </section>
        {{--<section>--}}
            {{--<div class="section-body no-margin">--}}
                <div class="row">
                    <div class="col-md-8">
                        <h2>Dados da Conta</h2>

                        <!-- BEGIN ENTER MESSAGE -->
                        <form class="form">
                            <div class="card no-margin">
                                <div class="card-body">
                                    <div class="form-group floating-label">
                                        <textarea name="status" id="status" class="form-control autosize" rows="1"></textarea>
                                        <label for="status">What's on your mind?</label>
                                    </div>
                                </div><!--end .card-body -->
                                <div class="card-actionbar">
                                    <div class="card-actionbar-row">
                                        <div class="pull-left">
                                            <a class="btn btn-icon-toggle ink-reaction btn-default"><i class="md md-camera-alt"></i></a>
                                            <a class="btn btn-icon-toggle ink-reaction btn-default"><i class="md md-location-on"></i></a>
                                            <a class="btn btn-icon-toggle ink-reaction btn-default"><i class="md md-attach-file"></i></a>
                                        </div>
                                        <a href="javascript:void(0);" class="btn btn-flat btn-accent ink-reaction">Post</a>
                                    </div><!--end .card-actionbar-row -->
                                </div><!--end .card-actionbar -->
                            </div><!--end .card -->
                        </form>
                        <!-- BEGIN ENTER MESSAGE -->

                        <!-- BEGIN MESSAGE ACTIVITY -->
                        <div class="tab-pane" id="activity">
                            <ul class="timeline collapse-lg timeline-hairline">
                                <li class="timeline-inverted">
                                    <div class="timeline-circ circ-xl style-primary"><i class="md md-event"></i></div>
                                    <div class="timeline-entry">
                                        <div class="card style-default-light">
                                            <div class="card-body small-padding">
                                                <span class="text-medium">Received a <a class="text-primary" href="http://www.codecovers.eu/materialadmin/mail/inbox">message</a> from <span class="text-primary">Ann Lauren</span></span><br/>
                                                <span class="opacity-50">
												Saturday, Oktober 18, 2014
											</span>
                                            </div>
                                        </div>
                                    </div><!--end .timeline-entry -->
                                </li>
                                <li>
                                    <div class="timeline-circ circ-xl style-primary-dark"><i class="md md-access-time"></i></div>
                                    <div class="timeline-entry">
                                        <div class="card style-default-light">
                                            <div class="card-body small-padding">
                                                <p>
                                                    <span class="text-medium">User login at <span class="text-primary">8:15 pm</span></span><br/>
                                                    <span class="opacity-50">
													Saturday, August 2, 2014
												</span>
                                                </p>
                                                Check out my new location.
                                            </div>
                                        </div>
                                    </div><!--end .timeline-entry -->
                                </li>
                                <li>
                                    <div class="timeline-circ circ-xl style-primary"><i class="md md-location-on"></i></div>
                                    <div class="timeline-entry">
                                        <div class="card style-default-light">
                                            <div class="card-body small-padding">
                                                <img class="img-circle img-responsive pull-left width-1" src="/img/modules/materialadmin/avatar2666b.jpg?1422538624" alt="" />
                                                <span class="text-medium">Meeting in the <span class="text-primary">conference room</span></span><br/>
                                                <span class="opacity-50">
												Saturday, Juli 29, 2014
											</span>
                                            </div>
                                            <div class="card-body">
                                                <p><em>Walked all the way home...</em></p>
                                                <img class="img-responsive" src="/img/modules/materialadmin/img14fbf5.jpg?1422538632" alt="" />
                                            </div>
                                        </div>
                                    </div><!--end .timeline-entry -->
                                </li>
                            </ul>
                        </div><!--end #activity -->
                    </div><!--end .col -->
                    <!-- END MESSAGE ACTIVITY -->

                    <!-- BEGIN PROFILE MENUBAR -->
                    <div class=" col-md-4" style="margin-top: 65px">
                        <div class="card card-underline style-default-dark">
                            <div class="card-head">
                                <header class="opacity-75"><small>Dados da Conta</small></header>
                                <div class="tools">
                                    <a class="btn btn-icon-toggle ink-reaction"><i class="md md-edit"></i></a>
                                </div><!--end .tools -->
                            </div><!--end .card-head -->
                            <div class="card-body no-padding">
                                <ul class="list">
                                    <li class="tile">
                                        <a class="tile-content ink-reaction">
                                            <div class="tile-icon">
                                                <i class="md md-location-on"></i>
                                            </div>
                                            <div class="tile-text">
                                                621 Johnson Ave, Suite 600
                                                <small>Street</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="tile">
                                        <a class="tile-content ink-reaction">
                                            <div class="tile-icon"></div>
                                            <div class="tile-text">
                                                San Francisco, CA 54321
                                                <small>City</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider-inset"></li>
                                    <li class="tile">
                                        <a class="tile-content ink-reaction">
                                            <div class="tile-icon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <div class="tile-text">
                                                (123) 456-7890
                                                <small>Mobile</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="tile">
                                        <a class="tile-content ink-reaction">
                                            <div class="tile-icon"></div>
                                            <div class="tile-text">
                                                (323) 555-6789
                                                <small>Work</small>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                    {{--<!-- END PROFILE MENUBAR -->--}}

                </div><!--end .row -->
            {{--</div><!--end .section-body -->--}}
        {{--</section>--}}

    @endif
@endsection