<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="{{asset('/img/img_panelPrincipal/home.png')}}"/></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="{{asset('/img/img_panelPrincipal/home.png')}}"/> </span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle <button--></button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div >




            <ul class="nav navbar-nav">

                <li class="active"><a href="{{ url('/resenia_historica')}}">Reseña histórica<span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="{{ url('/mision') }}">Misión<span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="{{ url('/vision') }}">Visión<span class="sr-only">(current)</span></a></li>


                <li class="active"><a href="{{ url('/contactos') }}">Contactos<span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="{{ url('/ayuda') }}">Ayuda<span class="sr-only">(current)</span></a></li>
            </ul>

        </div>






        <!-- Navbar Right Menu -->
        <div data-id="{{ Auth::id() }}" class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a  href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i  class="fa fa-bell-o"></i>

                        {{--*/ $id_user=Auth::id();



                              $num_users=DB::table('notificacions')->where('id_user', $id_user)->get();

                              $num_users=count($num_users);

                           /* --}}

                        @if ($num_users != 0)

                            <span class="label label-warning">
                            {{
                                $num_users
                             }}
                            </span>

                        @endif



                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Usted tiene {{ $num_users  }} notification(es)</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="ion ion-ios-people info"></i> Titulo Notificacion
                                    </a>
                                </li>
                                ...
                            </ul>
                        </li>
                        <li class="footer"><a href="#">Ver Todos</a></li>
                    </ul>
                </li>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{asset('/img/img_panelPrincipal/user4.png')}}" class="user-image" alt="User Image"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{asset('/img/img_panelPrincipal/user4.png')}}" class="img-circle" alt="User Image" />
                            <p>
                                {{ Auth::user()->name }}
                                <small>Logueado</small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                {{-- */$id_user=Auth::id(); /* --}}
                                <a href="{{ url('/admin/users/' . $id_user . '/edit') }}" class="btn btn-default btn-flat">Perfil</a>
                            </div>

                            <div class="pull-right">
                                <a href="{{ url('/auth/logout') }}" class="btn btn-default btn-flat">Salir</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>