<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8" />
    

    <title>Mundocente | @yield('titulo-pagina')</title>
 
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}"> 
    <!-- <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- MetisMenu CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('bower_components/metisMenu/dist/metisMenu.min.css') }}"> 
    <!-- <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet"> -->

    <!-- Timeline CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/css/timeline.css') }}"> 
    <!-- <link href="../dist/css/timeline.css" rel="stylesheet"> -->

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/css/sb-admin-2.css') }}"> 
    <!-- <link href="../dist/css/sb-admin-2.css" rel="stylesheet"> -->

    <!-- Morris Charts CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('bower_components/morrisjs/morris.css') }}"> 
    <!-- <link href="../bower_components/morrisjs/morris.css" rel="stylesheet"> -->

    <!-- Custom Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('bower_components/font-awesome/css/font-awesome.min.css') }}"> 
    <!-- <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/estilos.css')!!}
    <!-- <script src="../js/jquery-1.12.3.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilos.css') }}">
</head>

<body>


    @include('layouts.navbar')


    <div id="wrapper">

        <!-- Navigation -->
        <!-- <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0"> -->
            @yield('panel')
            <!-- /.navbar-static-side -->
        <!-- </nav> -->

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('titulo-pagina')</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> @yield('titulo-pagina')
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Filtrar
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            @yield('contenido')
                        </div>
                        <!-- /.panel-body -->
                    </div>                   
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->

                <div style="visibility:hidden;position:absolute;z-index=2;height:50px;width:100px;">
                    <div id="morris-area-chart" style="width:100%;height:100%;"></div>
                    <div id="morris-bar-chart" style="width:100%;height:100%;"></div>
                    <div id="morris-donut-chart" style="width:100%;height:100%;"></div>
                </div>


            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script type="text/javascript" src="{{ URL::asset('bower_components/jquery/dist/jquery.min.js') }}"></script>    
    <!-- <script src="../bower_components/jquery/dist/jquery.min.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->

    <!-- Metis Menu Plugin JavaScript -->
    <script type="text/javascript" src="{{ URL::asset('bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>
    <!-- <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script> -->

    <!-- Morris Charts JavaScript -->
    <script type="text/javascript" src="{{ URL::asset('bower_components/raphael/raphael-min.js') }}"></script>
    <!-- <script src="../bower_components/raphael/raphael-min.js"></script> -->
    <script type="text/javascript" src="{{ URL::asset('bower_components/morrisjs/morris.min.js') }}"></script>
    <!-- <script src="../bower_components/morrisjs/morris.min.js"></script> -->
    <script type="text/javascript" src="{{ URL::asset('js/morris-data.js') }}"></script>
    <!-- <script src="../js/morris-data.js"></script> -->

    <!-- Custom Theme JavaScript -->
    <script type="text/javascript" src="{{ URL::asset('dist/js/sb-admin-2.js') }}"></script>
    <!-- <script src="../dist/js/sb-admin-2.js"></script> -->

    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>


    <script type="text/javascript">

        $(document).ready(function(){

            formularioFuncionario=function(metodo,id){
                    
                event.preventDefault();
                var route=$("#"+id).attr('action');
                var valor=document.getElementById('token').value;

                $.ajax({
                    url:route,
                    headers:{"X-CSRF-TOKEN":valor},
                    method:metodo,
                    data:$("#"+id).serialize(),
                    success:function(resp){

                        if(metodo=="PUT"){
                            document.getElementById('btn-correo').innerHTML=resp.email;
                        }
                        else if(id=="formularioFuncionario" && metodo=="POST"){
                            window.location="http://localhost:8000/publicacion";
                        }
                            else if(id=="formularioDocente" && metodo=="POST"){
                            window.location="http://localhost:8000";
                        }

                    },
                    error:function(error){
                            
                            //console.log(error.responseText);
                            var html=$('<div   id="error-panel" class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span >&times;</span></button><ul id="error-lista"></ul></div>');    
                            $('#error').html(html); 
                            result = $.parseJSON(error.responseText);   
                            var ul=document.getElementById('error-lista');
                            ul.innerHTML="";
                            for(var k in result){
                                    ul.innerHTML+='<li>'+result[k]+'</li>';
                            }

                            $(".modal").animate({
                                scrollTop: 0
                            }, 600); 

                    }                   
                });
                return false;
            };
            $('#submit-editar-docente').click(function(){   
                        
                formularioFuncionario("PUT","formularioDocente");
            });
            $('#submit-editar-funcionario').click(function(){

                formularioFuncionario("PUT","formularioFuncionario");
            });
            $('#submit-registrar-funcionario').click(function(){
                formularioFuncionario("POST","formularioFuncionario");
            });
            $('#submit-registrar-docente').click(function(){
                formularioFuncionario("POST","formularioDocente");
            });


    });

    </script>

</body>

</html>
