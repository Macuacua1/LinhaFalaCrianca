
        <!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {{--<link href="/css/materialPreloader.min.css" rel="stylesheet">--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>


    <!-- Theme Styles -->
    {{--<link href="/css/alpha.min.css" rel="stylesheet" type="text/css"/>--}}
    <link href="/css/custom.css" rel="stylesheet" type="text/css"/>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="signin-page">

<div class="mn-content valign-wrapper" style="margin-top: 150px!important;">
    <main class="mn-inner container">
        <div class="valign">
            <div class="row">
                <div class="col s12 m6 l4 offset-l4 offset-m3">
                    <div class="card white darken-1" style="width: 400px!important;">
                        <div class="card-content ">
                            <span class="card-title">Login</span>
                            <div class="row">
                                <form class="col s12"  id="form-login"  method="post">
                                    {{csrf_field()}}
                                    <div class="input-field col s12">
                                        <input id="email" type="email" name="email" class="validate">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="password" type="password" name="password" class="validate"  required>
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="col s12 right-align m-t-sm">
                                        <a type="submit" id="log-user" class="waves-effect waves-light btn teal">Login</a>
                                        <a href="{{ route('password.request') }}"  id="pass-reset">Esqueceu a Senha?</a>
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
{{--<script src="/js/parsley.js"></script>--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
{{--<script src="/js/jquery.validate.min.js"></script>--}}
{{--<script src="/js/additional-methods.min.js"></script>--}}
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#log-user').on('click', function (e) {
            e.preventDefault();

            var dados = $('#form-login').serialize();

            $.ajax({
                method: 'Post',
                url: '/login',
                //                enctype: 'multipart/form-data',
                data: dados,
                success: function (data) {
                    //
                    if (data) {
                        window.location.href = '/';

                    }
                    else {
                        window.location.href = '/login';

                    }
                }
            });

        })


    });
</script>


</body>
</html>