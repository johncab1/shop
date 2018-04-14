@extends('layouts.app')

@section('body-class', 'landing-page')
@section('title', 'Imagenes de productos')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/examples/profile_city.jpg') }}');">

    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">

                    <h2 class="title text-center">Imagenes del producto "{{$product->name}}"</h2>

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form method="post" action="" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="file" name="photo" required="true">
                                        <button type="submit" class="btn btn-primary btn-round">Subir nueva imagen</button>
                                    </form>
                                </div>
                            </div>
                            
                            

                            <a href="{{ url('/admin/products')}}" class="btn btn-primary btn-round">Volver al listado de productos</a>

                            <div class="row">
                            @foreach($images as $image)
                            <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <img src="{{ $image->url }}" width="250">
                                    <form method="post" action="">
                                        {{ csrf_field() }}

                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="image_id" value = "{{ $image->id }}">
                                         <button type="submit" class="btn btn-danger btn-round">Eliminar imagen</button>
                                    
                                    </form>
                                </div>
                            </div>
                        </div>
                            @endforeach
                            </div>


            </div>
        </div>
    </div>

    @include('includes.footer')
@endsection
