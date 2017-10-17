<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from steelcoders.com/alpha/v1.2/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Jul 2017 11:05:09 GMT -->
<head>

    <!-- Title -->
    <title>Linha Fala Criança</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Linha Fala Criança / UNICEF Mozambique" />
    <meta name="keywords" content="Linha Fala Criança ,UNICEF Mozambique" />
    <meta name="author" content="Linha Fala Criança / UNICEF Mozambique">
    <link rel="icon" href="/img/lfc_logo.png">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/css/materialPreloader.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>


    <!-- Theme Styles -->
    <link href="/css/alpha.min.css" rel="stylesheet" type="text/css"/>
    <link href="/css/custom.css" rel="stylesheet" type="text/css"/>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="signup-page">
{{--<div class="loader-bg"></div>--}}
{{--<div class="loader">--}}
    {{--<div class="preloader-wrapper big active">--}}
        {{--<div class="spinner-layer spinner-blue">--}}
            {{--<div class="circle-clipper left">--}}
                {{--<div class="circle"></div>--}}
            {{--</div><div class="gap-patch">--}}
                {{--<div class="circle"></div>--}}
            {{--</div><div class="circle-clipper right">--}}
                {{--<div class="circle"></div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="spinner-layer spinner-red">--}}
            {{--<div class="circle-clipper left">--}}
                {{--<div class="circle"></div>--}}
            {{--</div><div class="gap-patch">--}}
                {{--<div class="circle"></div>--}}
            {{--</div><div class="circle-clipper right">--}}
                {{--<div class="circle"></div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="spinner-layer spinner-yellow">--}}
            {{--<div class="circle-clipper left">--}}
                {{--<div class="circle"></div>--}}
            {{--</div><div class="gap-patch">--}}
                {{--<div class="circle"></div>--}}
            {{--</div><div class="circle-clipper right">--}}
                {{--<div class="circle"></div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="spinner-layer spinner-green">--}}
            {{--<div class="circle-clipper left">--}}
                {{--<div class="circle"></div>--}}
            {{--</div><div class="gap-patch">--}}
                {{--<div class="circle"></div>--}}
            {{--</div><div class="circle-clipper right">--}}
                {{--<div class="circle"></div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<div class="mn-content valign-wrapper"  style="margin-top: 100px!important;">
    <main class="mn-inner container ">
        <div class="valign">
            <div class="row">
                <div class="col s12 m6 l4 offset-l4 offset-m3">
                    <div class="card white darken-1" style="width: 400px!important;">
                        <div class="card-content ">
                            <span class="card-title">Registo do Utilizador</span>
                            <div class="row">
                                <form class="col s12" role="form" id="form-criar-conta" method="POST" {{--action="{{route('register')}}"--}}>
                                    {{ csrf_field() }}
                                    <div class="input-field col s12">
                                        <input id="name" type="text" class="validate" id="nome" name="nome" value="{{ old('nome') }}">
                                        <label for="nome">Nome</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="password" type="password" class="validate" id="nome" name="password" value="{{ old('password') }}">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="password-confirm" type="password" name="password_confirmation" class="validate">
                                        <label for="password-confirm">Confirm Password</label>
                                    </div>
                                    <div class="col s12 right-align m-t-sm">
                                        <a href="/login" class="waves-effect waves-grey btn-flat" style="font-size: 12px!important;">Login</a>
                                        <a href="" type="submit" id="registar-user" class="waves-effect waves-light btn teal" style="font-size: 12px!important;">Registar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Javascripts -->
<script src="/js/materialPreloader.min.js"></script>
<script src="/js/jquery.blockui.js"></script>
<script src="/js/alpha.min.js"></script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#registar-user').on('click', function (e) {
            e.preventDefault();

            var dados = $('#form-criar-conta').serialize();

            $.ajax({
                method: 'Post',
                url: '/register',
//                enctype: 'multipart/form-data',
                data: dados,
                success: function (data) {

                    if (data) {

                        setTimeout(function(){ Materialize.toast('Registado com Sucesso!', 4000) }, 4000);
                        $('#form-criar-conta')[0].reset();
                        window.location.href = '/';
//                        alert('Salvo com Sucesso!');

                    }
                    else {
                        alert(error)

                    }
                }
            });

        })


    });
</script>

</body>

</html>