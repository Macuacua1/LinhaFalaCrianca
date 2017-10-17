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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    {{--<link type="text/css" rel="stylesheet" href="/css/bootstrap94be.css">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <link href="/fonts/CWB0XYA8bzo0kSThX0UTuA.woff2">
    <link href="/fonts/d-6IYplOFocCacKzxwXSOFtXRa8TVwTICgirnJhmVJw.woff2">
    <link href="/fonts/glyphicons-halflings-regular.woff2">
    <link href="/fonts/Material-Design-Iconic-Font.woff">
    <link href="/fonts/RxZJdnzeo3R5zSexge8UUVtXRa8TVwTICgirnJhmVJw.woff2">
    <link href="/fonts/vPcynSL0qHq_6dX7lKVByfesZW2xOQ-xsNqO47m55DA.woff2">



    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' type="text/css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/css/materialadminb0e2.css">
    <link type="text/css" rel="stylesheet" href="/css/rickshawd56b.css">
    <link type="text/css" rel="stylesheet" href="/css/morris.core5e0a.css">

    <link type="text/css" rel="stylesheet" href="/css/jquery-ui-theme5e0a.css">

    <link type="text/css" rel="stylesheet" href="/css/typeaheadfa6c.css">

    <!-- END STYLESHEETS -->

    <link type="text/css" rel="stylesheet" href="/css/jquery.dataTablesdee9.css">

    <link type="text/css" rel="stylesheet" href="/css/dataTables.colVis941e.css">

    <link type="text/css" rel="stylesheet" href="/css/dataTables.tableTools4029.css">
    <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

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
                <li class="dropdown hidden-xs">
                    <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
                        <i class="fa fa-area-chart"></i>
                    </a>
                    <ul class="dropdown-menu animation-expand">
                        <li class="dropdown-header">Server load</li>
                        <li class="dropdown-progress">
                            <a href="javascript:void(0);">
                                <div class="dropdown-label">
                                    <span class="text-light">Server load <strong>Today</strong></span>
                                    <strong class="pull-right">93%</strong>
                                </div>
                                <div class="progress"><div class="progress-bar progress-bar-danger" style="width: 93%"></div></div>
                            </a>
                        </li><!--end .dropdown-progress -->
                        <li class="dropdown-progress">
                            <a href="javascript:void(0);">
                                <div class="dropdown-label">
                                    <span class="text-light">Server load <strong>Yesterday</strong></span>
                                    <strong class="pull-right">30%</strong>
                                </div>
                                <div class="progress"><div class="progress-bar progress-bar-success" style="width: 30%"></div></div>
                            </a>
                        </li><!--end .dropdown-progress -->
                        <li class="dropdown-progress">
                            <a href="javascript:void(0);">
                                <div class="dropdown-label">
                                    <span class="text-light">Server load <strong>Lastweek</strong></span>
                                    <strong class="pull-right">74%</strong>
                                </div>
                                <div class="progress"><div class="progress-bar progress-bar-warning" style="width: 74%"></div></div>
                            </a>
                        </li><!--end .dropdown-progress -->
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
                        <div class="gui-icon"><i class="fa fa-user-circle"></i></div>{{--<i class="md md-email"></i>--}}
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

                <!-- BEGIN TABLES -->
                <li class="gui-folder">
                    <a>
                        <div class="gui-icon"><i class="fa fa-table"></i></div>
                        <span class="title">Estatistica</span>
                    </a>
                    <!--start submenu -->
                    <ul>
                        <li><a  href=""  ><span class="title">Contacto</span></a></li>

                        <li><a  href=""  ><span class="title">Caso</span></a></li>


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
                            <div class="gui-icon"><i class="md md-email"></i></div>
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
                            <li><a href="" ><span class="title">Registar</span></a></li>

                            <li><a  href=""  ><span class="title">Listar</span></a></li>
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
                            <li><a href="" ><span class="title">Registar</span></a></li>

                            <li><a  href=""  ><span class="title">Listar</span></a></li>
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

    <!-- BEGIN OFFCANVAS RIGHT -->
    <div class="offcanvas">



        <!-- BEGIN OFFCANVAS SEARCH -->
        <div id="offcanvas-search" class="offcanvas-pane width-8">
            <div class="offcanvas-head">
                <header class="text-primary">Search</header>
                <div class="offcanvas-tools">
                    <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
                        <i class="md md-close"></i>
                    </a>
                </div>
            </div>

            <div class="offcanvas-body no-padding">
                <ul class="list ">
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>A</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="/img/modules/materialadmin/avatar42dba.jpg?1422538625" alt=""/>
                            </div>
                            <div class="tile-text">
                                Alex Nelson
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="/img/modules/materialadmin/avatar9463a.jpg?1422538626" alt=""/>
                            </div>
                            <div class="tile-text">
                                Ann Laurens
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>J</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="/img/modules/materialadmin/avatar2666b.jpg?1422538624" alt="" />
                            </div>
                            <div class="tile-text">
                                Jessica Cruise
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="/img/modules/materialadmin/avatar8463a.jpg?1422538626" alt="" />
                            </div>
                            <div class="tile-text">
                                Jim Peters
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>M</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="/img/modules/materialadmin/avatar52dba.jpg?1422538625" alt="" />
                            </div>
                            <div class="tile-text">
                                Mabel Logan
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="/img/modules/materialadmin/avatar114335.jpg?1422538623" alt="" />
                            </div>
                            <div class="tile-text">
                                Mary Peterson
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="/img/modules/materialadmin/avatar3666b.jpg?1422538624" alt="" />
                            </div>
                            <div class="tile-text">
                                Mike Alba
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>N</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="/img/modules/materialadmin/avatar6463a.jpg?1422538626" alt="" />
                            </div>
                            <div class="tile-text">
                                Nathan Peterson
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>P</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="/img/modules/materialadmin/avatar7463a.jpg?1422538626" alt="" />
                            </div>
                            <div class="tile-text">
                                Philip Ericsson
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>S</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="/img/modules/materialadmin/avatar104335.jpg?1422538623" alt="" />
                            </div>
                            <div class="tile-text">
                                Samuel Parsons
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                </ul>
            </div><!--end .offcanvas-body -->
        </div><!--end .offcanvas-pane -->
        <!-- END OFFCANVAS SEARCH -->




        <!-- BEGIN OFFCANVAS CHAT -->
        <div id="offcanvas-chat" class="offcanvas-pane style-default-light width-12">
            <div class="offcanvas-head style-default-bright">
                <header class="text-primary">Chat with Ann Laurens</header>
                <div class="offcanvas-tools">
                    <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
                        <i class="md md-close"></i>
                    </a>
                    <a class="btn btn-icon-toggle btn-default-light pull-right" href="#offcanvas-search" data-toggle="offcanvas" data-backdrop="false">
                        <i class="md md-arrow-back"></i>
                    </a>
                </div>
                <form class="form">
                    <div class="form-group floating-label">
                        <textarea name="sidebarChatMessage" id="sidebarChatMessage" class="form-control autosize" rows="1"></textarea>
                        <label for="sidebarChatMessage">Leave a message</label>
                    </div>
                </form>
            </div>

            <div class="offcanvas-body">
                <ul class="list-chats">
                    <li>
                        <div class="chat">
                            <div class="chat-avatar"><img class="img-circle" src="/img/modules/materialadmin/avatar14335.jpg?1422538623" alt="" /></div>
                            <div class="chat-body">
                                Yes, it is indeed very beautiful.
                                <small>10:03 pm</small>
                            </div>
                        </div><!--end .chat -->
                    </li>
                    <li class="chat-left">
                        <div class="chat">
                            <div class="chat-avatar"><img class="img-circle" src="/img/modules/materialadmin/avatar9463a.jpg?1422538626" alt="" /></div>
                            <div class="chat-body">
                                Did you see the changes?
                                <small>10:02 pm</small>
                            </div>
                        </div><!--end .chat -->
                    </li>
                    <li>
                        <div class="chat">
                            <div class="chat-avatar"><img class="img-circle" src="/img/modules/materialadmin/avatar14335.jpg?1422538623" alt="" /></div>
                            <div class="chat-body">
                                I just arrived at work, it was quite busy.
                                <small>06:44pm</small>
                            </div>
                            <div class="chat-body">
                                I will take look in a minute.
                                <small>06:45pm</small>
                            </div>
                        </div><!--end .chat -->
                    </li>
                    <li class="chat-left">
                        <div class="chat">
                            <div class="chat-avatar"><img class="img-circle" src="/img/modules/materialadmin/avatar9463a.jpg?1422538626" alt="" /></div>
                            <div class="chat-body">
                                The colors are much better now.
                            </div>
                            <div class="chat-body">
                                The colors are brighter than before.
                                I have already sent an example.
                                This will make it look sharper.
                                <small>Mon</small>
                            </div>
                        </div><!--end .chat -->
                    </li>
                    <li>
                        <div class="chat">
                            <div class="chat-avatar"><img class="img-circle" src="/img/modules/materialadmin/avatar14335.jpg?1422538623" alt="" /></div>
                            <div class="chat-body">
                                Are the colors of the logo already adapted?
                                <small>Last week</small>
                            </div>
                        </div><!--end .chat -->
                    </li>
                </ul>
            </div><!--end .offcanvas-body -->
        </div><!--end .offcanvas-pane -->
        <!-- END OFFCANVAS CHAT -->

    </div><!--end .offcanvas-->
    <!-- END OFFCANVAS RIGHT -->

</div><!--end #base-->
<!-- END BASE -->


<!-- BEGIN JAVASCRIPT -->

<script src="/js/custom.js"></script>
<script src="/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/js/spin.min.js"></script>
<script src="/js/jquery.autosize.min.js"></script>
<script src="/js/moment.min.js"></script>

<script src="/js/bootstrap-datepicker.js"></script>
<script src="/js/typeahead.bundle.min.js"></script>
<script src="/js/ec2c8835c9f9fbb7b8cd36464b491e73.js"></script>
<script src="/js/jquery.knob.min.js"></script>
<script src="/js/jquery.sparkline.min.js"></script>
<script src="/js/bootstrap-datepicker.js"></script>
<script src="/js/jquery.nanoscroller.min.js"></script>
<script src="/js/43ef607ee92d94826432d1d6f09372e1.js"></script>
<script src="/js/rickshaw.min.js"></script>
<script src="/js/63d0445130d69b2868a8d28c93309746.js"></script>
<script src="/js/Demo.js"></script>
<script src="/js/DemoFormWizard.js"></script>
<script src="/js/DemoTableDynamic.js"></script>
<script src="/js/DemoFormComponents.js"></script>
{{--<script src="/js/DemoDashboard.js"></script>--}}
<script src="/js/modules/materialadmin/libs/jquery-ui/jquery-ui.min.js"></script>

{{----}}


<!-- END JAVASCRIPT -->



</body>

<!-- Mirrored from www.codecovers.eu/materialadmin/dashboards/dashboard by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Sep 2017 15:51:26 GMT -->
</html>