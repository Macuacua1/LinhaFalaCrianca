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
                                        <input type="text" name="nome" class="form-control" id="tooltip2" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Nome">
                                        <label for="help2">Nome</label>
                                    </div>
                                    <div class="form-group floating-label">
                                        <input type="email" name="email" class="form-control" id="tooltip2" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Email">
                                        <label for="help2">Email</label>
                                    </div>
                                    <div class="form-group floating-label">
                                        <input type="password" name="nome" class="form-control" id="tooltip2" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Senha">
                                        <label for="help2">Password</label>
                                    </div>
                                    <div class="form-group floating-label">
                                        <input id="password-confirm" type="password" name="password_confirmation" class="form-control" id="tooltip2" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Confirmar senha">
                                        <label for="password-confirm">Confirmar Password</label>
                                    </div>
                                </div><!--end .card-body -->
                                <div class="card-actionbar">
                                    <div class="card-actionbar-row">
                                        <div class="pull-left">
                                            <a class="btn btn-icon-toggle ink-reaction btn-default"><i class="md md-camera-alt"></i></a>
                                            <a class="btn btn-icon-toggle ink-reaction btn-default"><i class="md md-location-on"></i></a>
                                            <a class="btn btn-icon-toggle ink-reaction btn-default"><i class="md md-attach-file"></i></a>
                                        </div>
                                        <button class="btn btn-success" type="submit" id="" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Actualizar dados do Utilizador">
                                            <span class="glyphicon glyphicon-floppy-save"></span> Registar
                                        </button>
                                    </div><!--end .card-actionbar-row -->
                                </div><!--end .card-actionbar -->
                            </div><!--end .card -->
                        </form>
                        <!-- BEGIN ENTER MESSAGE -->

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
                                                <i class="fa fa-user-circle"></i>
                                            </div>
                                            <div class="tile-text">
                                                {{Auth::user()->nome}}
                                                <small>Nome</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider-inset"></li>
                                    <li class="tile">
                                        <a class="tile-content ink-reaction">
                                            <div class="tile-icon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <div class="tile-text">
                                                {{Auth::user()->email}}
                                                <small>Email</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="tile">
                                        <a class="tile-content ink-reaction">
                                            <div class="tile-icon"></div>
                                            <div class="tile-text">
                                                @if( Auth::user()->hasrole('admin'))
                                                    Administrator
                                                @elseif( Auth::user()->hasrole('user'))
                                                   Conselheiro
                                                @else
                                                   Sem Perfil

                                                @endif

                                                <small>Perfil</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="tile">
                                        <a class="tile-content ink-reaction">
                                            <div class="tile-icon"></div>
                                            <div class="tile-text">
                                                {{Auth::user()->escritorio ? Auth::user()->escritorio:'Sem Escritorio'}}
                                                <small>Escritorio</small>
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