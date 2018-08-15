<?php 
use Illuminate\Support\Facades\DB;



?>
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Aieka</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
     
        



    </head>
    <body>




  @include('partials.nav')</a>


            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100"  src="https://res.cloudinary.com/elem/image/upload/c_crop,h_557/v1534287974/desktopwallpapers.org.ua-7377_rjavvz.jpg" alt="First slide">
       <div class="carousel-caption d-none d-md-block">
      <h5>Sistema de Reserva de comida</h5>
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100"   src="https://res.cloudinary.com/elem/image/upload/c_crop,h_398,w_1366/v1534288833/comida-rapida-casera_kd8o2h.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://res.cloudinary.com/elem/image/upload/c_crop,h_398,w_1366/v1534291221/recetas-de-comida-_C3_A1rabe-libanesa_nr20qb.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        

        

            <div class="container">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">


                <h1 >Comidas</h1>

                

             

              

                

               <div>
                    @foreach ($comidas as $comida)
                    <a   data-toggle="modal" data-target="#{{ $comida->detalle }}">

                     
<!-- Modal -->
                        <div class="card" style="float: left;">
                          <img  width="150px" src="<?php echo imagenProducto($comida->imagen) ?>">
                            <div class="card-body">
                              <h5 class="card-title"> {{ $comida->nombre }} </h5>
                              <div class="btn btn-primary">${{ $comida->precio }}</div>
                            </div>
                          </div>
                        </a>
                  </div>


                        <div class="modal fade" id="{{ $comida->detalle }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ $comida->nombre }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                      <div class="col-sm">

                                        <img width="150px" src=" <?php echo imagenProducto($comida->imagen) ?>">
                                      </div>
                                    
                                      
                                      <div class="col-sm">
                                          <form method="POST" action="{{route('cart.store')}}">
                                             <div class="form-group">
                                              <label for="exampleFormControlSelect1">Cantidad</label>
                                              <select name="cantidad" class="form-control" id="exampleFormControlSelect1">
                                                <option value="1">1</option>
                                                <option value="2">2</option>|
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                              </select>
                                            </div>
                                             <?php  echo stocknivel($comida->unidad); ?>
                                       <?php 
                                     $ingredientes = DB::table('ingrediente_comida')->join('ingredientes', 'ingrediente_comida.ingrediente_id', '=', 'ingredientes.id')->select('ingrediente_comida.*', 'ingredientes.nombre')->where('ingrediente_comida.comida_id', $comida->id)->get();

                                        foreach ($ingredientes as $ingrediente) {
                                          # code...
                                         
                                          ?> 
                                          
                                         
                                          <div class="form-check">
                                            <input type="checkbox" name="ingrediente[]" value="{{ $ingrediente->ingrediente_id }}" id="{{ $ingrediente->ingrediente_id }}">
                                          <label class="form-check-label" for="{{ $ingrediente->ingrediente_id }}">
                                            {{ $ingrediente->nombre }} 
                                          </label>
                                          </div>
                                          <?php

                                        }

                                        ?>
                                      <?php echo $comida->descripcion ; ?>

                                      <div class="form-group">
                                          <label for="exampleFormControlTextarea1">Instrucciones Adicionales</label>
                                          <textarea name="instrucciones" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                      </div>
                                  
                                </div>
                              </div>
                              </div>
    
         
                  
                    
              
                {{ csrf_field()}}
                <input type="hidden" name="id" value="{{$comida->id}}">
                <input type="hidden" name="name" value="{{$comida->nombre}}">
                <input type="hidden" name="price" value="{{$comida->precio}}">
              
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                          <?php  if ($comida->unidad >  0) {
                                          # code...
                                          echo ' <button type="submit" class="btn btn-primary">Agregar Al Carrito</button>';
                                        }   ?> 
        </form>
      </div>
    </div>
  </div>
</div>

                    @endforeach

                </div> <!-- end products -->

                <br>
                <br>
                <br>

            </div> <!-- end container -->

        </div> <!-- end featured-section -->




    </body>
</html>



