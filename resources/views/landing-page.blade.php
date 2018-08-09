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
     

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css.map') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css.map') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css.map') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css.map') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-reebot.min.css.map') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-reebot.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-reebot.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-reebot.min.css.map') }}">
        <link rel="stylesheet" href="{{ asset('sass/responsive.css') }}">

        <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.js.map') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js.map') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.js.map') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js.min') }}"></script>




    </head>
    <body>

<script src="{{asset('components/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>

        
            
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('sass/responsive.css') }}">
  @include('partials.nav')</a>


            <div class="jumbotron">
                <div >
                  
                    <h1>Aieka</h1>
                    <p>Aieka pedidos es la nueva aplicación que te ayudara a que puedas reservar tu almuerzo, asi no te demoras</p>
                    
                </div> <!-- end hero-copy -->

               <!-- end hero-image -->
            </div> <!-- end hero -->
        

        

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
                                            <input type="checkbox" name="ingrediente[]" value="{{ $ingrediente->ingrediente_id }}">
                                          <label class="form-check-label" for="defaultCheck1">
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



