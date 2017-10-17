@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-primary" style="margin-top: -5px!important;padding-top: -5px!important;">
                    <header>Actualizar Utilizador</header>
                </div>
            </div><!--end .card -->
        </div>
    </div><!--end .col -->

    <!-- BEGIN VERTICAL FORM FLOATING LABELS -->
    <div class="row">

        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form class="form" role="form" id="form-criar-conta" method="POST" action="{{route('user.update',$users->id)}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group floating-label">
                            <input type="text" class="form-control" id="nome" name="nome" disabled value="{{$users->nome}}">
                            <label for="nome">Nome</label>
                        </div>
                        <div class="form-group floating-label">
                            <input  id="email" type="email" class="form-control" name="email" disabled value="{{$users->email}}">
                            <label for="email">Email</label>
                        </div>
                        <div class="form-group">
                            <select name="role_id" class="form-control">
                                @if(!$users->role ==null)
                                    @foreach($users->role as $perfil)
                                        @if($perfil->id ==2)
                                            <option value="{{$perfil->id}}" selected>{{$perfil->designacao}}</option>
                                            <option value="1">Administrador</option>
                                        @else
                                            <option value="{{$perfil->id}}" selected>{{$perfil->designacao}}</option>
                                            <option value="2">Conselheiro</option>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach($perfils as $perf)
                                        <option value="{{$perf->id}}">{{$perf->designacao}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <label for="perfil">Perfil</label>
                        </div>
                        <div class="form-group">
                            <select name="escritorio" class="form-control">
                                <option value="{{$users->escritorio}}">{{$users->escritorio}}</option>
                                <option value="Linha Central">Linha Central</option>
                                <option value="Marracuene">Marracuene</option>
                            </select>
                            <label for="escritorio">Escritorio</label>
                        </div>
                        <div class="form-group">
                            <select name="estado" class="form-control">
                                <option value="{{$users->estado}}">{{$users->estado}}</option>
                                @if($users->estado ==0)
                                    <option value="0" selected>Inactivo</option>
                                    <option value="1">Activo</option>
                                @else
                                    <option value="1" selected>Activo</option>
                                    <option value="0">Inactivo</option>
                                @endif
                            </select>
                            <label for="estado">Estado</label>
                        </div>
                        <div class="card-actionbar">
                            <div class="card-actionbar-row">
                                <button type="submit" class="btn btn-success ">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div><!--end .card-body -->
            </div><!--end .card -->
        </div><!--end .col -->
    </div><!--end .row -->
    <!-- END VERTICAL FORM FLOATING LABELS -->

@endsection