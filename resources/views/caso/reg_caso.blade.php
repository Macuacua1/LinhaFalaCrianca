@extends('layouts.master')
@section('content')
    <div class="row">
    <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-primary" style="margin-top: -5px!important;padding-top: -5px!important;">
                    <header>Registo de Caso</header>
                </div>
            </div><!--end .card -->
        </div>
    </div><!--end .col -->
    {{--<div class="row" style="background-color: yellow!important;margin-left: 218px;margin-right: 218px">--}}
        {{--<div class="col-lg-4"> <h3>CA-001</h3></div>--}}
        {{--<div class="col-lg-4"></div>--}}
        {{--<div class="col-lg-4"><a href="" class="btn btn-success glyphicon-lock"  style="margin-top: 15px">Trancar</a></div>--}}
    {{--</div>--}}
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <form class="form" method="post" id="form_add_caso">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group floating-label">
                                <select name="responsavel_id" id="responsavel_id" class="form-control">
                                    <option value="" disabled selected>--Reencaminhar para:--</option>
                                    @foreach($resps as $resp)
                                        <option value="{{$resp->id}}">{{$resp->respnome}}</option>
                                    @endforeach
                                </select>
                                {{--<label for="help2">Reencaminhar para:</label>--}}
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group floating-label">
                                <textarea name="mensagem" id="textarea1" class="form-control" rows="3"></textarea>
                                <label for="help2">Mensagem:</label>
                            </div>
                            <a href="" class="btn btn-success glyphicon-lock" id="add_caso"  type="submit">Gravar</a>
                        </div>
                        </form>
                        {{--<a href="" class="btn btn-success glyphicon-lock" id="add_caso"  type="submit" style="margin-top: 15px;margin-left: 680px">Gravar</a>--}}

                    </div>


                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>

    @endsection