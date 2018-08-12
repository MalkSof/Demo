@include('partials.nav')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

<div class="container">

	@if (session()->has('success_message'))
 
<div class="alert alert-success alert-dismissible fade show" role="alert">
   {{ session()->get('success_message') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
                    
                
            @endif
	 @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif

 

  <div class="row">
    <div class="col-sm">
      <form method="POST" autocomplete="on" action="{{route('checkout.store')}}">
 	{{ csrf_field()}}
   <input type="hidden" value="{{$newtotal}}" name="total">
   <input type="hidden" name="entrega" value="{{ $entrega }}">

   
<!--<h3>Entrega</h3>

<div id="myRadioGroup" >
<div class="form-check form-check-inline">
  <input checked="checked" class="form-check-input" type="radio" name="retiro" id="inlineRadio1" value="1">
  <label class="form-check-label" for="inlineRadio1">Retiro en Aieka</label>
</div>
<div class="form-check form-check-inline">
  <input  class="form-check-input" type="radio" name="retiro" id="inlineRadio2" value="2">
  <label class="form-check-label" for="inlineRadio2">En ORT. (Servicio ofrecido para los chicos de 7)</label>
</div>
</div>
<script type="text/javascript">$(document).ready(function() {
    $("input[name$='retiro']").click(function() {
        var test = $(this).val();

        $("div.desc").hide();
        $("#Retiro" + test).show();
    });
});</script>
    <div id="Retiro1" class="desc">
        
    </div>
    <div id="Retiro2" class="desc" style="display: none;">
        <div class="form-group">
    <label for="exampleInputEmail1">Nombre y apellido del Chico</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa Nombre" >
    <small id="emailHelp" class="form-text text-muted">Es para identificar a quien le entregaremos la comida</small>
  </div>
    </div>
<h3>Pago</h3>

	<div class="form-check form-check-inline">
	  <input  checked="checked" class="form-check-input" type="radio" name="pago"  value="1">
	  <label class="form-check-label" for="inlineRadio1">En efectivo</label>
	</div>
	<div class="form-check form-check-inline">
	  <input   class="form-check-input" type="radio" name="pago" value="2">
	  <label class="form-check-label" for="inlineRadio2">Mercado Pago</label>
	</div>

 	
  -->
                 <fieldset>
                <!-- Address form -->

                

<?php 
                if ($entrega == "envio") { ?>
                
                  <h2>Envio</h2>
         
                <!-- full-name input-->
              
                <!-- address-line1 input-->
                <div class="form-group">
                    <label class="form-group">Direccion</label>
                    <div class="controls">
                        <input id="address-line1" name="addressline1" type="text" placeholder="Direccion"
                        class="form-control">
                        <p class="help-block">Lugar donde quieren que le entreguen la comida</p>
                    </div>
                </div>
                <!-- address-line2 input-->
                
                <!-- city input-->
                <div class="form-group">
                    <label class="control-label">Cuidad/ Municipio</label>
                    <div class="controls">
                        <input id="city" name="city" type="text" placeholder="Cuidad" class="form-control">
                        <p class="help-block"></p>
                    </div>
                </div>
               
                
                <!-- postal-code input-->
                <div class="form-group">
                    <label class="control-label">Codigo Postal</label>
                    <div class="controls">
                        <input id="postal" name="postal-code" type="text" placeholder="Codigo Postal"
                        class="form-control">
                        <p class="help-block"></p>
                    </div>
                </div>

                
                <?php
                }



                ?>

        <h4>Horario:</h4>
        <div class="form-group">
                  <input id="address-line1" name="hora" type="time" placeholder="Direccion"
                        class="form-control" required="true">
                </div>
  <h4>Reservar Mesa Para:</h4>
 <div class="form-group">
   
    <select name="mesa"  class="form-control" id="exampleFormControlSelect1">
      <option value="0">0 personas</option>
      <option value="1">1 persona</option>
      <option value="2">2 personas</option>
      <option value="3">3 personas</option>
      <option value="4">4 personas</option>
      <option value="5">5 personas</option>
      <option value="6">6 personas</option>
      <option value="7">7 personas</option>
      <option value="8">8 personas</option>
      <option value="9">9 personas</option>
      <option value="10">10 personas</option>
      <option value="11">11 personas</option>
      <option value="12">12 personas</option>
      <option value="13">13 personas</option>
      <option value="14">14 personas</option>
      <option value="15">15 personas</option>
    </select>
  </div>

    <div >
<input value="Confirmar"  type="submit" class="btn btn-primary btn-lg"></input>

</div>

 </form>

 
    </div>
    <div class="col-sm">
	     <table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">Cant</th>
			      <th scope="col">Nombre</th>
			      <th scope="col">Precio</th>
			   
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach (Cart::content() as $item)
			    <tr>
			    	
			      <th scope="row">{{$item->qty}}</th>
			      <td>{{$item->model->nombre}}</td>
			      <td>${{$item->model->precio}}</td>
			      
			    
			    </tr>
			      @endforeach
			  </tbody>

		</table>
		<div >
		<form class="form-inline"   action="{{ route('cupon.store') }}" method="POST" >
			{{ csrf_field()}}
		    <div class="form-group mb-2">
   			 <label >Tenes un Cupon?</label>
    
  			</div>
		  <div class="form-group mx-sm-3 mb-2">
		    <input type="text" class="form-control" name="cupon_cod" id="Cod" placeholder="Codigo">
		  </div>
		  <button type="submit" class="btn btn-primary mb-2">Aplicar</button>
		</form>
		</div>
		<div class="jumbotron jumbotron-fluid">
  <div class="container">
  	<hr>
  	  <div class="row">
    	<div class="col-sm">
    		@if (session()->has('cupon'))
    		<p>Subtotal</p>
    		<p>Descuento({{ session()->get('cupon')['nombre'] }})</p>
    		@endif

      <h1 class="display-4">Total</h1>
    	</div>
    	<div class="col-sm">
     
    	</div>
    	<div class="col-sm">
    		@if (session()->has('cupon'))
    		<p>{{Cart::total()}}</p>
    			<p> - ${{ session()->get('cupon')['descuento'] }}</p>
    			@endif
      <h1 class="display-4">${{$newtotal}}</h1>
   	 </div>
  </div>
    
    
    
  </div>
</div>
	</div>
	</div>
</div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.map"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.map"> </script>
 



