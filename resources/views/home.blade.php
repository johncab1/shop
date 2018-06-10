@extends('layouts.app')

@section('body-class', 'landing-page')
@section('title', 'App Shop - Dashboard')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/examples/profile_city.jpg') }}');">

    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section">

                    <h2 class="title text-center">Dashboard.</h2>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="nav nav-pills nav-pills-icons" role="tablist">
    <!--
        color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
    -->
    <li class="nav-item ">
        <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
            <i class="material-icons">dashboard</i>
            Carrito de compras
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
            <i class="material-icons">list</i>
            Pedidos realizados
        </a>
    </li>
</ul>


<div class="tab-content tab-space">
    <div class="tab-pane active" id="dashboard-1">
          
          <hr>
          <p>Tu carrito de compras presenta {{ auth()->user()->cart->details->count() }} productos.</p>

      <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="col-md-3 text-center">Nombre</th>                                                                
                                    <th class="col-md-3 text-center">Precio</th>
                                    <th class="col-md-3 text-center">Cantidad</th>
                                    <th>Subtotal</th>
                                    <th class="col-md-3 text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach(auth()->user()->cart->details as $detail)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ $detail->product->featured_image_url }}" height="50">
                                    </td>
                                    <td>
                                        <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank">
                                            {{ $detail->product->name }}
                                        </a>
                                    </td>                                                                        
                                    <td class="text-center">${{ $detail->product->price }}</td>
                                    <td class="text-center">{{ $detail->quantity }}</td>
                                    <td class="text-center">${{ $detail->quantity * $detail->product->price }}</td>
                                    <td class="td-actions text-center">
                                        

                                        <form method="post" action="{{ url('/cart') }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}    
                                            <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}}">
                                            <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank" type="button" rel="tooltip" title="Ver producto" class="btn btn-info">
                                            <i class="material-icons">info</i>
                                        </a>
                                      
                                       

                                            <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
    </div>

    <div class="tab-pane" id="tasks-1">
        Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
        <br><br>Dynamically innovate resource-leveling customer service for state of the art customer service.
    </div>
</div>
                        </div>
                    </div>

            </div>

        </div>
    </div>
    @include('includes.footer')
@endsection



