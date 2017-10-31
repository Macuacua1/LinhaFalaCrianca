<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <title>Linha Fala Criança</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Linha Fala Criança / UNICEF Mozambique" />
    <meta name="keywords" content="Linha Fala Criança ,UNICEF Mozambique" />
    <meta name="author" content="Linha Fala Criança / UNICEF Mozambique">
    <link rel="icon" href="/img/lfc_logo.png">
    <!-- END META -->

    {{--<meta charset="utf-8">--}}

    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <link type="text/css" rel="stylesheet" href="/css/bootstrap94be.css">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" />--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" />--}}
    <link rel="stylesheet" href="/css/datepicker3f394.css" />
    {{--<link rel="stylesheet" href="/css/bootstrap-datepicker.min.css" />--}}


    {{--<script src="/js/bootstrap-datepicker.js"></script>--}}
    {{--<script src="/js/bootstrap-datepicker.min.js"></script>--}}

    {!! Charts::assets() !!}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" charset="utf-8"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
    {{--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>--}}
    <script src="/js/bootstrap-datepicker.js"></script>
    {{--<script src="/js/bootstrap-datepicker.min.js"></script>--}}
    {{--<script src="/js/custom.js"></script>--}}

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' type="text/css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/css/materialadminb0e2.css">

    {{--<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">--}}
    <link href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css" rel="stylesheet">

    <!-- END STYLESHEETS -->

    <link type="text/css" rel="stylesheet" href="/css/jquery.dataTablesdee9.css">

    <link type="text/css" rel="stylesheet" href="/css/dataTables.colVis941e.css">

    <link type="text/css" rel="stylesheet" href="/css/dataTables.tableTools4029.css">
    <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>








</head>






<body class="menubar-hoverable header-fixed ">
<!-- BEGIN HEADER-->
<header id="header" >



    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="header-nav-brand" >
                    <div class="brand-holder">
                        <a href="{{url('/')}}">
                            {{--<span class="text-lg text-bold text-primary">MATERIAL ADMIN</span>--}}
                            <img class="" style="vertical-align: middle;width: auto;padding: 10px 5px 4px 0px;height: 42px;" src="/img/lfc_logo.png" alt="">
                           <span class="text-lg text-bold text-primary" style="margin: auto!important;">Linha Fala Criança</span>
                        </a>
                    </div>
                </li>
                <li>
                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="headerbar-right">
            <ul class="header-nav header-nav-options">
                <li>
                    <!-- Search form -->
                    <form class="navbar-search" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" name="headerSearch" placeholder="Enter your keyword">
                        </div>
                        <button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
                    </form>
                </li>
                <li class="dropdown hidden-xs">
                    <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
                        <i class="fa fa-bell"></i><sup class="badge style-danger">{{Session::has('utentes') ? count(Session::get('utentes')): ''}}</sup>
                    </a>
                    <ul class="dropdown-menu animation-expand">
                        <li class="dropdown-header">Today's messages</li>
                        <li>
                            <a class="alert alert-callout alert-warning" href="javascript:void(0);">
                                <img class="pull-right img-circle dropdown-avatar" src="/img/modules/materialadmin/avatar2666b.jpg?1422538624" alt="" />
                                <strong>Alex Anistor</strong><br/>
                                <small>Testing functionality...</small>
                            </a>
                        </li>
                        <li>
                            <a class="alert alert-callout alert-info" href="javascript:void(0);">
                                <img class="pull-right img-circle dropdown-avatar" src="/img/modules/materialadmin/avatar3666b.jpg?1422538624" alt="" />
                                <strong>Alicia Adell</strong><br/>
                                <small>Reviewing last changes...</small>
                            </a>
                        </li>
                        <li class="dropdown-header">Options</li>
                        <li><a href="">View all messages <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
                        <li><a href="">Mark as read <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
            </ul><!--end .header-nav-options -->
            <ul class="header-nav header-nav-profile">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                        <img src="/img/{{Auth::user()->avatar}}" alt="Avatar" />
                        <span class="profile-info">
						{{Auth::user()->nome}}
                            @if( Auth::user()->hasrole('admin'))
                                <small>Administrator</small>
                            @elseif( Auth::user()->hasrole('user'))
                                <small>Conselheiro</small>
                            @else
                                <small>Sem Perfil</small>

                            @endif
					</span>
                    </a>
                    <ul class="dropdown-menu animation-dock">
                        <li class="dropdown-header">Config</li>
                        <li><a href="">Meu Perfil</a></li>
                        <li><a href=""><span class="badge style-danger pull-right">16</span>My blog</a></li>
                        <li><a href="">My appointments</a></li>
                        <li class="divider"></li>
                        <li><a href=""><i class="fa fa-fw fa-lock"></i> Lock</a></li>
                        <li><a href="{{route('logout')}}"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
            </ul><!--end .header-nav-profile -->
            <ul class="header-nav header-nav-toggle">
                <li>
                    <a class="btn btn-icon-toggle btn-default" href="#offcanvas-search" data-toggle="offcanvas" data-backdrop="false">
                        <i class="fa fa-ellipsis-v"></i>
                    </a>
                </li>
            </ul><!--end .header-nav-toggle -->
        </div><!--end #header-navbar-collapse -->
    </div>
</header>
<!-- END HEADER-->

<!-- BEGIN BASE-->
<div id="base">
    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas">
    </div><!--end .offcanvas-->
    <!-- END OFFCANVAS LEFT -->

    <!-- BEGIN CONTENT-->
    <div id="content">

        <section>
            <div class="section-body">
                <div class="row">

                   @yield('content')

                </div><!--end .row -->

            </div><!--end .section-body -->
        </section>

    </div><!--end #content-->
    <!-- END CONTENT -->

    <!-- BEGIN MENUBAR-->
    <div id="menubar" class="menubar-inverse ">
        <div class="menubar-fixed-panel">
            <div>
                <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="expanded">
                <a href="{{url('/')}}">
                    {{--<span class="text-lg text-bold text-primary ">MATERIAL&nbsp;ADMIN</span>--}}
                    <img class="" style="vertical-align: middle;width: auto;padding: 10px 5px 4px 0px;height: 42px;" src="/img/lfc_logo.png" alt="">
                    <span class="text-lg text-bold text-primary" style="margin: auto!important;">Linha Fala Criança</span>

                </a>
            </div>
        </div>
        <div class="menubar-scroll-panel">
            <!-- BEGIN MAIN MENU -->




            <ul id="main-menu" class="gui-controls">
            @if( Auth::user()->hasRole('admin'))
                <!-- BEGIN DASHBOARD -->
                <li>
                    <a href="{{'/'}}" class="active">
                        <div class="gui-icon"><i class="fa fa-home fa-fw"></i></div>{{--md md-home--}}
                        <span class="title">Home</span>
                    </a>
                </li><!--end /menu-li -->
                <!-- END DASHBOARD -->

                <!-- BEGIN EMAIL -->
                <li class="gui-folder">
                    <a>
                        <div class="gui-icon"><i class="fa fa-user"></i></div>{{--<i class="md md-email"></i>--}}
                        <span class="title">Utilizador</span>
                    </a>
                    <!--start submenu -->
                    <ul>
                        <li><a href="" ><span class="title">Perfil</span></a></li>

                        <li><a href="{{url('user')}}"><span class="title">Listar</span></a></li>


                    </ul><!--end /submenu -->
                </li><!--end /menu-li -->
                <!-- END EMAIL -->

                <!-- BEGIN UI -->
                <li class="gui-folder">
                    <a>
                        <div class="gui-icon"><i class="fa fa-phone"></i></div>
                        <span class="title">Contacto</span>
                    </a>
                    <!--start submenu -->
                    <ul>
                        <li><a href="{{route('contacto.create')}}" ><span class="title">Registar</span></a></li>

                        <li><a  href="{{url('contacto')}}"  ><span class="title">Listar</span></a></li>
                    </ul><!--end /submenu -->
                </li><!--end /menu-li -->
                <!-- END UI -->
                <li class="gui-folder">
                    <a>
                        <div class="gui-icon"><i class="fa fa-legal"></i></div>
                        <span class="title">Caso</span>
                    </a>
                    <!--start submenu -->
                    <ul>
                        <li><a href="{{url('caso.create')}}" ><span class="title">Registar</span></a></li>

                        <li><a  href="{{url('caso')}}"  ><span class="title">Listar</span></a></li>
                    </ul><!--end /submenu -->
                </li><!--end /menu-li -->
                <!-- END UI -->

                <!-- BEGIN TABLES -->
                <li class="gui-folder">
                    <a>
                        <div class="gui-icon"><i class="fa fa-bar-chart"></i></div>
                        <span class="title">Estatistica</span>
                    </a>
                    <!--start submenu -->
                    <ul>
                        <li><a  href="{{url('/report_contacto')}}" ><span class="title">Contacto</span></a></li>

                        <li><a  href="{{url('/reportacaso')}}"  ><span class="title">Caso</span></a></li>


                    </ul><!--end /submenu -->
                </li><!--end /menu-li -->
                <!-- END TABLES -->
                @endif
                @if( Auth::user()->hasRole('user'))
                    <li>
                        <a href="{{'/'}}" class="active">
                            <div class="gui-icon"><i class="fa fa-home fa-fw"></i></div>{{--md md-home--}}
                            <span class="title">Home</span>
                        </a>
                    </li><!--end /menu-li -->
                    <!-- END DASHBOARD -->

                    <!-- BEGIN EMAIL -->
                    <li class="gui-folder">
                        <a>
                            <div class="gui-icon"><i class="fa fa-user-circle"></i></div>{{--<i class="md md-email"></i>--}}
                            <span class="title">Utilizador</span>
                        </a>
                        <!--start submenu -->
                        <ul>
                            <li><a href="" ><span class="title">Perfil</span></a></li>

                        </ul><!--end /submenu -->
                    </li><!--end /menu-li -->
                    <!-- END EMAIL -->

                    <!-- BEGIN UI -->
                    <li class="gui-folder">
                        <a>
                            <div class="gui-icon"><i class="fa fa-puzzle-piece fa-fw"></i></div>
                            <span class="title">Contacto</span>
                        </a>
                        <!--start submenu -->
                        <ul>
                            <li><a href="{{url('contacto.create')}}" ><span class="title">Registar</span></a></li>

                            <li><a  href="{{url('contacto')}}"  ><span class="title">Listar</span></a></li>
                        </ul><!--end /submenu -->
                    </li><!--end /menu-li -->
                    <!-- END UI -->
                    <li class="gui-folder">
                        <a>
                            <div class="gui-icon"><i class="fa fa-puzzle-piece fa-fw"></i></div>
                            <span class="title">Caso</span>
                        </a>
                        <!--start submenu -->
                        <ul>
                            <li><a href="{{url('caso.create')}}" ><span class="title">Registar</span></a></li>

                            <li><a  href="{{url('caso')}}"  ><span class="title">Listar</span></a></li>
                        </ul><!--end /submenu -->
                    </li><!--end /menu-li -->
                    <!-- END UI -->
                @endif
            </ul><!--end .main-menu -->
            <!-- END MAIN MENU -->

            <div class="menubar-foot-panel">
                <small class="no-linebreak hidden-folded">
                    <span class="opacity-75">Copyright &copy; 2017</span> <strong>Linha Fala Criança </strong>
                </small>
            </div>
        </div><!--end .menubar-scroll-panel-->
    </div><!--end #menubar-->
    <!-- END MENUBAR -->

</div><!--end #base-->
<!-- END BASE -->


<!-- BEGIN JAVASCRIPT -->
<script src="/js/custom.js"></script>

{{--<script src="/js/jquery-migrate-1.2.1.min.js"></script>--}}
{{--<script src="/js/spin.min.js"></script>--}}
{{--<script src="/js/jquery.autosize.min.js"></script>--}}
{{--<script src="/js/moment.min.js"></script>--}}

{{--<script src="/js/bootstrap-datepicker.js"></script>--}}
{{--<script src="/js/typeahead.bundle.min.js"></script>--}}
<script src="/js/ec2c8835c9f9fbb7b8cd36464b491e73.js"></script>
{{--<script src="/js/jquery.knob.min.js"></script>--}}
<script src="/js/jquery.sparkline.min.js"></script> {{--fecharrrrrrrrrrrrrrr--}}
{{--<script src="/js/jquery.nanoscroller.min.js"></script>--}}
<script src="/js/43ef607ee92d94826432d1d6f09372e1.js"></script>
<script src="/js/rickshaw.min.js"></script> {{--fecharrrrrrrrrrrrrrr--}}
<script src="/js/63d0445130d69b2868a8d28c93309746.js"></script>
{{--<script src="/js/Demo.js"></script>--}}
{{--<script src="/js/DemoFormWizard.js"></script>--}}
<script src="/js/DemoTableDynamic.js"></script>
<script src="/js/DemoFormComponents.js"></script>
<script src="/js/DemoDashboard.js"></script>{{--fecharrrrrrrrrrrrrrr--}}
{{--<script src="/js/modules/materialadmin/libs/jquery-ui/jquery-ui.min.js"></script>--}}

{{----}}

@yield('scripts')
<!-- END JAVASCRIPT -->



</body>

<!-- Mirrored from www.codecovers.eu/materialadmin/dashboards/dashboard by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Sep 2017 15:51:26 GMT -->
</html>