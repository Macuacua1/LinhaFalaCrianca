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
        {{--<div class="row">--}}
            {{--@if ($message = Session::get('erro'))--}}
                {{--<div class="alert alert-danger alert-block" style="margin: auto 30px">--}}
                    {{--<button type="button" class="close" data-dismiss="alert">x</button>--}}
                    {{--<strong>{{ $message }}</strong>--}}
                {{--</div>--}}
                {{--<img src="images/{{ Session::get('image') }}">--}}
            {{--@endif--}}
            {{--@if ($message = Session::get('success'))--}}
                {{--<div class="alert alert-success alert-block" style="margin: auto 30px">--}}
                    {{--<button type="button" class="close" data-dismiss="alert">x</button>--}}
                    {{--<strong>{{ $message }}</strong>--}}
                {{--</div>--}}
                {{--<img src="images/{{ Session::get('image') }}">--}}
            {{--@endif--}}
        {{--</div>--}}

                <section style="margin-top: -40px">
                    <div class="section-body">
                        <div class="card">
                            <!-- BEGIN CONTACT DETAILS -->
                            <div class="card-tiles">
                                <div class="hbox-md col-md-12">
                                    <div class="hbox-column col-md-9">
                                        <div class="row">

                                            <!-- BEGIN CONTACTS MAIN CONTENT -->
                                            <div class="col-sm-8 col-md-8 col-lg-9" style="margin-left: 120px">
                                                <div class="margin-bottom-xxl">
                                                    <div class="pull-left width-3 clearfix hidden-xs">
                                                        <img class="img-circle size-2" src="/img/{{Auth::user()->avatar}}" alt="Avatar" />
                                                    </div>
                                                    <h1 class="text-light no-margin">{{Auth::user()->nome}}</h1>
                                                    <h5>
                                                        {{Auth::user()->role->designacao}}
                                                    </h5>

                                                </div><!--end .margin-bottom-xxl -->
                                                <ul class="nav nav-tabs" data-toggle="tabs">
                                                    <li class="active"><a href="#notes">Dados da Conta</a></li>
                                                </ul>
                                                <div class="tab-content">

                                                    <!-- BEGIN CONTACTS NOTES -->
                                                    <div class="tab-pane active" id="notes">
                                                        <br/>
                                                        <form class="form form-validate" novalidate="novalidate" enctype="multipart/form-data" id="form_edit_user" action="/edituser" accept-charset="utf-8" method="post">
                                                            {{csrf_field()}}
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6">
                                                                    <div class="form-group floating-label">
                                                                        <input type="text" name="nome" class="form-control" id="tooltip2" value="{{Auth::user()->nome}}" disabled>
                                                                        <label for="help2">Nome</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6">
                                                                    <div class="form-group floating-label">
                                                                        <input type="email" name="email" class="form-control" id="tooltip2" value="{{Auth::user()->email}}" disabled>
                                                                        <label for="help2">Email</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6">
                                                                    <div class="form-group floating-label">
                                                                        <input id="avatar" type="file" name="avatar" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6">
                                                                    <div class="form-group floating-label">
                                                                        <input type="password" name="password" class="form-control" data-rule-minlength="4" maxlength="8">
                                                                        <label for="help2">Password</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <input id="user_id" type="hidden" name="user_id" class="form-control" value="{{Auth::user()->id}}">

                                                            <div class="form-group clearfix">
                                                                <button type="submit" class="btn btn-success pull-right">
                                                                    <span class="glyphicon glyphicon-refresh"></span> Actualizar
                                                                </button>
                                                            </div>
                                                        </form>

                                                    </div><!--end #notes -->
                                                    <!-- END CONTACTS NOTES -->
                                                </div><!--end .tab-content -->
                                            </div><!--end .col -->
                                            <!-- END CONTACTS MAIN CONTENT -->

                                        </div><!--end .row -->
                                    </div><!--end .hbox-column -->

                                </div><!--end .hbox-md -->
                            </div><!--end .card-tiles -->
                            <!-- END CONTACT DETAILS -->
                        </div><!--end .card -->
                    </div><!--end .section-body -->
                </section>

    @endif
@endsection
@section('scripts')
    <script type="text/javascript">
                @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>
    @endsection