@extends('layouts.app')

@section('body-class', 'profile-page')
@section('title', 'App Shop - Dashboard')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('/img/city.jpg');"></div>
<div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">

                        <div class="profile">
                            <div class="avatar">
                                <img src="{{ $category->featured_image_url }}" alt="Imagen representativa de la categoria {{ $category->name }}" class="img-raised rounded-circle img-fluid">
                            </div>                         


                            <div class="name">
                                <h3 class="title">{{ $category->name }}</h3>
                                <h6>{{$category->name }}</h6>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="description text-center">
                    <p>{{$category->description }} </p>
                </div>


                   @if (session('notification'))
                                <div class="alert alert-success">
                                {{ session('notification') }}
                                </div>
                            @endif


               


                     <div class="team text-center">
                    <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-4">
                            <div class="team-player">
                                <div class="card card-plain">
                                    <div class="col-md-6 ml-auto mr-auto">
                                        <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                                    </div>
                                    <h4 class="card-title">
                                        <a href="{{ url('/products/'.$product->id) }}">{{ $product->name }}</a>
                                        <br>
                                        <small class="card-description text-muted">{{ $product->category_name }}</small>
                                    </h4>
                                    <div class="card-body">
                                        <p class="card-description">{{ $product->description }}</p>
                                    </div>
                                    
                                </div>                                
                            </div>
                        </div>
                        @endforeach
                       
                      
                    </div>

                    <div class="row">
                        {{ $products->links() }}
                    </div>

                </div>
                </div>



                <div class="row">
                    
                </div>
               
            </div>
        </div>
    </div>




    <!-- Modal -->
<div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Seleccione la cantidad que desea agregar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <form method="post" action="{{ url('/cart') }}">
            {{ csrf_field() }}
            <input type="hidden" name="product_id" value="{{ $product->id }}">
          <div class="modal-body">
            <input type="number" name="quantity" value="1" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Añadir al carrito.</button>
      </div>
      </form>
    </div>
  </div>
</div>
    @include('includes.footer')
@endsection



