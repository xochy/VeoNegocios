<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<audio src="../images/audio.mp3" autoplay="autoplay"></audio>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>VeoNegocios</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <!--boostrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!--boostrap-->
        <link href="{{ asset('css/animation.css') }}" rel="stylesheet">

        <style>
            html, body {
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                background: #fff;
                color: black;
                padding: 10px 25px;
                font-size: 13px;
                font-weight: 600;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .home-main{
                background: #42a4f5;
                color:#fff;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref home-main">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ route('login') }}">Ingresar</a>

                        @if (Route::has('register'))
                        <a href="{{ url('/prospecto') }}"><i class="far fa-plus-square"></i>Registrar mi Negocio</a>
                            <!--<a href="{{ route('register') }}">Registro</a>-->
                        @endif
                    @endauth
                </div>
            @endif

            
            <div class="content">

                
           
            <br>
            <br>
            
                <div class="title m-b-md animated pulse" style="font-size:10vw">
                    VeoNegocios<span class="blinker">.</span>com
                    
                </div>
                <div  style="margin-top: -40px;">
                <label style="font-weight: bold;color: yellow; font-size: calc(1em + 1vw);">Directorio Comercial Digital </label>
                <img width="10%" height="10%"  src="/system/public/images/ilustrasion1.png"/>
                </div>
                <br><br>

                <div class="links">
                    {{-- @guest
                        <a class="m-5" href="{{ url('/home') }}">Inicio</a>
                    @endguest --}}
                    {{-- <a class="m-5" href="{{ route('categories.index') }}">Categorías</a>
                    <a class="m-5" href="{{ route('stores.index') }}">Negocios</a> --}}
                    <a href="{{ route('stores.loadFromCity', 'an') }}">Antúnez</a> 
                    <a  href="{{ route('stores.loadFromCity', 'ap') }}">Apatzingán</a>

                </div>

      <br>
                <div class="row">

                    <div class="btn btn-primary"  style="margin-left: auto; margin-right: auto;">
                    Contamos con <span class="badge badge-dark">@php echo contador()." Visitas"; @endphp</span>
                    </div>
                    <br>
                  @php
                     function contador()
                        {
                            $archivo = "contador.txt";
                            if (file_exists($archivo)) {

                                    $fp = fopen($archivo,"r");
                                    $contador = fgets($fp);
                                    ++$contador;
                                    $fp = fopen($archivo,"w+");
                                    fwrite($fp, $contador);
                                    fclose($fp);
                                 
                            }else {
                                $f = fopen($archivo, "w+");
                                if($f)
                                {
                                    $contador=0;
                                    fwrite($f, $contador);
                                    fclose($f);
                                }
                                echo "No existe el fichero $contador";
                            }
                    return $contador;
                    }
                    @endphp

                </div>
                     <br>
                     <br>
                     <br>
                     <br>
            </div>
        </div>

                       <!--INICIO PIE-->
     <div class="row" style="color:black; background: white;">
           <div class="col-xs-12 col-sm-4 col-md-4" style="text-align: justify;" ><br>
                <b>¿Que es <span class="informacion" style="color: blue; "><b>VeoNegocios.com</b></span>?</b><br> Es un servicio en linea, el cual nos ofrece una ayuda rapida y confiable,      
                al momento de localizar algun establecimiento o servicio, conociendo sus contactos, ubicación, referencias, horarios
                y promociones disponibles, en Antúnez y Apatzingán Michoacán

             </div>
            <div class="col-xs-12 col-sm-4 col-md-4" ><br>
                   <!-- <img class="img-responsive " width="100%" height="150px" src="../images/logoinicio.png"/>-->
                   <img class="img-responsive " width="100%" height="150px" src="/system/public/images/logoinicio.png"/>
             </div>
            <div class="col-xs-12 col-sm-4 col-md-4" style="text-align: justify;">
                
                <h4><span class="glyphicon glyphicon-map-marker" aria-hidden="true"> Localización</span></h4>
                    
                      Estamos ubicados en calle José Sotero de Castañeda
                      Altos 1 Col. Centro, Apatzingán, Mich<br>
                     

             <h4><span class="glyphicon glyphicon-phone" aria-hidden="true"> Contactos</span></h4>
              Comunicate con Nosotros.
                    <br> <abbr title="Phone">Cel:</abbr><a href="tel://4531022978"><b> 453-102-29-78</b></a>

             </div>
    </div>
           
            <!--FIN PIE-->
   

    </body>
</html>
