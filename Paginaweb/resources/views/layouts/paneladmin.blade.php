@extends('layouts.admin')

@section('panel')

    
<!--
    <div class="navbar-header">
        <div class="container">
            <a class="navbar-brand" href="/">
              <img id="logo" alt="logo" src="{{ URL::asset('img/logo-imagen.png') }}">
              <img id="texto" alt="nombre" src="{{ URL::asset('img/logomun-texto.png') }}">
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
    </div>
    -->
    <!-- /.navbar-header -->


    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Buscar...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </div>
                    <!-- /input-group -->
                </li>

                @if( Auth::check() )

                    @if( Auth::user()->idrol === 2)
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Publicaciones<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/publicacion/create">Nuevo</a>
                                </li>
                                <li>
                                    <a href="/publicacion">Listar</a>
                                </li>
                                <li>
                                    <a href="/publicacion/borrados">Borrados</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                    @elseif( Auth::user()->idrol === 3)
                        <li>
                            <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> Panel de Control</a>
                        </li>
                        
                        <li>
                            <a href="/docentes"><i class="fa fa-table fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/usuario/create">Nuevo</a>
                                </li>
                                <li>
                                    <a href="/usuario">Listar</a>
                                </li>
                                <li>
                                    <a href="/usuario/borrados">Borrados</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Publicaciones<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/publicacion/create">Nuevo</a>
                                </li>
                                <li>
                                    <a href="/publicacion">Listar</a>
                                </li>
                                <li>
                                    <a href="/publicacion/borrados">Borrados</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Universidades/Entidades<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/establecimiento/create">Nuevo</a>
                                </li>
                                <li>
                                    <a href="/establecimiento">Listar</a>
                                </li>
                                <li>
                                    <a href="/establecimiento/borrados">Borrados</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    @endif
                @endif

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
@stop