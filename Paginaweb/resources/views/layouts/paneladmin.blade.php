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
    <!-- <a class="navbar-brand" href="index.html">SB Admin v2.0</a> -->
</div>
<!-- /.navbar-header -->


<!-- /.navbar-top-links -->

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Panel de Control</a>
            </li>
            
            <li>
                <a href="/docentes"><i class="fa fa-bar-chart-o fa-fw"></i> Docentes<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Nuevo</a>
                    </li>
                    <li>
                        <a href="/admin/docentes">Listar</a>
                    </li>
                    <li>
                        <a href="/admin/borrados">Borrados</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Publicadores<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="flot.html">Nuevo</a>
                    </li>
                    <li>
                        <a href="/admin/publicadores">Listar</a>
                    </li>
                    <li>
                        <a href="flot.html">Borrados</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Publicaciones<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="flot.html">Nuevo</a>
                    </li>
                    <li>
                        <a href="/admin/publicaciones">Listar</a>
                    </li>
                    <li>
                        <a href="flot.html">Borrados</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Universidades/Entidades<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="flot.html">Nuevo</a>
                    </li>
                    <li>
                        <a href="/admin/universidades">Listar</a>
                    </li>
                    <li>
                        <a href="flot.html">Borrados</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>