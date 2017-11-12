@extends('layouts.master')
@section('content')
    @if( Auth::user()->hasRole('admin') or Auth::user()->hasRole('user'))
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-head style-primary" style="margin-top: -5px!important;padding-top: -5px!important;">
                        <header>Minha Conta</header>
                    </div>
                </div><!--end .card -->
            </div>
        </div><!--end .col -->
        <div class="row">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Preencha correctamente os campos!
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
                </div>
                {{--<img src="images/{{ Session::get('image') }}">--}}
            @endif
        </div>

                <div class="row">

                    <!-- BEGIN PROFILE MENUBAR -->
                    <div class=" col-md-4" style="margin-top: 0">
                        <div class="card" style="background-color: #7DA0B1">
                            <div class="card-body no-padding">
                                <div class="container" style="margin: 100px 0 100px 90px" >
                                    <img  class="img-circle border-white border-xl img-responsive auto-width" src="/img/{{Auth::user()->avatar}}" alt="Avatar"  />

                                </div>

                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                    {{--<!-- END PROFILE MENUBAR -->--}}

                    <div class="col-md-8">
                        {{--<h2>Dados da Conta</h2>--}}

                        <!-- BEGIN ENTER MESSAGE -->
                        <form class="form" method="post" enctype="multipart/form-data" id="form_edit_user" action="/edituser">
                            {{csrf_field()}}
                            <div class="card no-margin">
                                <div class="card-body">
                                    <div class="form-group floating-label">
                                        <input type="text" name="nome" class="form-control" id="tooltip2" value="{{Auth::user()->nome}}" disabled>
                                        <label for="help2">Nome</label>
                                    </div>
                                    <div class="form-group floating-label">
                                        <input type="email" name="email" class="form-control" id="tooltip2" value="{{Auth::user()->email}}" disabled>
                                        <label for="help2">Email</label>
                                    </div>
                                    <div class="form-group floating-label">
                                        <input id="avatar" type="file" name="avatar" class="form-control">
                                        {{--<label for="avatar">Browse</label>--}}
                                    </div>
                                    <input id="user_id" type="hidden" name="user_id" class="form-control" value="{{Auth::user()->id}}">
                                    <div class="form-group floating-label">
                                        <input type="password" name="password" class="form-control" id="tooltip2" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Senha">
                                        <label for="help2">Password</label>
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
                                            <span class="glyphicon glyphicon-refresh"></span> Actualizar
                                        </button>
                                    </div><!--end .card-actionbar-row -->
                                </div><!--end .card-actionbar -->
                            </div><!--end .card -->
                        </form>
                        <!-- BEGIN ENTER MESSAGE -->

                    </div><!--end .col -->
                    <!-- END MESSAGE ACTIVITY -->
                </div><!--end .row -->
            {{--</div><!--end .section-body -->--}}
        {{--</section>--}}
        {{--<div class="col-lg-offset-1 col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-body text-center">--}}
                    {{--<button class="btn btn-default-bright btn-raised" data-toggle="modal" data-target="#simpleModal">Simple modal</button>--}}
                    {{--<button class="btn btn-default-bright btn-raised" data-toggle="modal" data-target="#formModal">Form modal</button>--}}
                    {{--<button class="btn btn-default-bright btn-raised" data-toggle="modal" data-target="#textModal">Text modal</button>--}}
                {{--</div><!--end .card-body -->--}}
            {{--</div><!--end .card -->--}}
            {{--<em class="text-caption">Click to see the modals</em>--}}
        {{--</div><!--end .col -->--}}
        {{--<!-- BEGIN FORM MODAL MARKUP -->--}}
        {{--<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">--}}
            {{--<div class="modal-dialog">--}}
                {{--<div class="modal-content">--}}
                    {{--<div class="modal-header">--}}
                        {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                        {{--<h4 class="modal-title" id="formModalLabel">Login to continue</h4>--}}
                    {{--</div>--}}
                    {{--<form class="form-horizontal" role="form">--}}
                        {{--<div class="modal-body">--}}
                            {{--<div class="form-group">--}}
                                {{--<div class="col-sm-3">--}}
                                    {{--<label for="email1" class="control-label">Email</label>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-9">--}}
                                    {{--<input type="email" name="email1" id="email1" class="form-control" placeholder="Email">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<div class="col-sm-3">--}}
                                    {{--<label for="password1" class="control-label">Password</label>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-9">--}}
                                    {{--<input type="password" name="password1" id="password1" class="form-control" placeholder="Password">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<div class="col-sm-3">--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-9">--}}
                                    {{--<div class="checkbox">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox" id="cb1"> Remember me--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="modal-footer">--}}
                            {{--<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>--}}
                            {{--<button type="button" class="btn btn-primary" data-dismiss="modal">Login</button>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div><!-- /.modal-content -->--}}
            {{--</div><!-- /.modal-dialog -->--}}
        {{--</div><!-- /.modal -->--}}
        {{--<!-- END FORM MODAL MARKUP -->--}}
    @endif
@endsection