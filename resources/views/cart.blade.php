
@include('partials.nav')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="//platform-api.sharethis.com/js/sharethis.js#property=5b634641f3742d0012c886fa&product=inline-follow-buttons"></script>
<div class="container">

 @if (session()->has('success_message'))
 
<div class="alert alert-success alert-dismissible fade show" role="alert">
   {{ session()->get('success_message') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
                    
                
            @endif

    @if (Cart::count() > 0)

    <h2>{{Cart::count()}} comida/s en el carrito</h2>
    <table class="table table-hover">
  <thead>
    <tr>
      
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      
      <th scope="col">Cant.</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  	@foreach(Cart::content() as $item)
    <tr>

      
      <td>{{$item->model->nombre}}</td>
      <td>${{$item->model->precio}}</td>
      
      <td>{{$item->qty}}</td>


      
      <td><form action="{{route('cart.destroy',$item->rowId)}}" method="POST" >
      	{{ csrf_field()}}
      	{{ method_field('DELETE')}}
      	<button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
      </form></td>
    </tr>
    
   @endforeach
  </tbody>
</table>
<a href="{{route('landing-page')}}" type="button" class="btn btn-primary">Continuar Comprando</a>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">{{Cart::total()}}</h1>
    <a href="{{route('checkout.index')}}" type="button" class="btn btn-primary btn-lg">Finalizar Compra</a>
    
  </div>
</div>

    @else
    <h2>Sin comida en el carrito</h2>
    <script type="text/javascript" src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <a href="{{route('landing-page')}}">Continuar Comprando</a>
    @endif
           </div>

          