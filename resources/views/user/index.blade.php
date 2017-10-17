@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-primary" style="margin-top: -5px!important;padding-top: -5px!important;">
                    <header>Utilizadores</header>
                </div>
            </div><!--end .card -->
        </div>
    </div><!--end .col -->

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable1" class="table no-margin">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Perfil</th>
                            <th>Estado</th>
                            <th>Accao</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->nome}}</td>
                                <td>{{$user->email}}</td>
                                @if(count($user->role)>0)
                                    @foreach($user->role as $role)
                                        <td>{{$role->designacao}}</td>
                                    @endforeach
                                @else
                                    <td>Sem Perfil</td>
                                @endif
                                @if($user->estado ==0)
                                    <td>Inactivo</td>
                                @else
                                    <td>Activo</td>
                                @endif
                                <td>
                                    {{--<button class="edit-user btn btn-success" data-id="{{$user->id}}" data-title="" data-description="">--}}
                                        {{--<span class="glyphicon glyphicon-edit"></span>--}}
                                    {{--</button>--}}

                                    <a href="{{route('user.edit',$user->id)}}"> <button class="edit-user btn btn-success"><span class="glyphicon glyphicon-edit"></span></button></a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div><!--end .table-responsive -->
                <div id="modalUser" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static" style="">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"></h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" role="form" method="post" id="form_edit_caso">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group floating-label">
                                            <select name="responsavel_id" id="responsavel_id" class="form-control">
                                                <option value="" disabled selected>--Reencaminhar para:--</option>
                                                {{--@foreach($resps as $resp)--}}
                                                    {{--<option value="{{$resp->id}}">{{$resp->respnome}}</option>--}}
                                                {{--@endforeach--}}
                                            </select>
                                            {{--<label for="help2">Reencaminhar para:</label>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <input type="hidden" class="form-control" id="caso_id" name="caso_id">
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group floating-label">
                                            <select name="estado_caso" id="estado_caso" class="form-control">
                                                <option value="" disabled selected>--Novo Estado:--</option>
                                                <option value="Assistido">Assistido</option>
                                                <option value="Aberto ou Pendente">Aberto ou Pendente</option>
                                                <option value="No Sistema">No Sistema</option>
                                                <option value="Reencaminhado">Reencaminhado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group floating-label">
                                            <textarea name="mensagem" id="textarea1" class="form-control" rows="3"></textarea>
                                            <label for="help2">Mensagem:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group floating-label">
                                            <select name="tipo_motivo_id" id="categoriamotivo" class="form-control categoriamotivo">
                                                <option value="" disabled selected>--Categoria do Motivo--</option>
                                                {{--@foreach($tipomotivos as $tipomotivo)--}}
                                                    {{--<option value="{{$tipomotivo->id}}">{{$tipomotivo->tipomotivonome}}</option>--}}
                                                {{--@endforeach--}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group floating-label">
                                            {{--<select id="motivo"  class="form-control motivonome" name="motivo_id">--}}
                                                {{--<option value="0" disabled="true" selected="true">--Motivo--</option>--}}
                                            {{--</select>--}}
                                        </div>
                                    </div>

                                </form>

                                <div class="modal-footer">
                                    <button type="button" class="btn actionBtn" data-dismiss="modal" id="edit_user">
                                        <span id="footer_action_button" class='glyphicon'> </span>
                                    </button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                                        <span class='glyphicon glyphicon-remove'></span> Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end .card-body -->
        </div><!--end .card -->
    </div><!--end .col -->
@stop