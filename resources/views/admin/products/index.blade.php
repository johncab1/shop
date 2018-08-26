@extends('layouts.app')

@section('body-class', 'profile-page')
@section('title', 'Listado de productos')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/examples/profile_city.jpg') }}');">       
    </div>

    <div class="main main-raised">
        <div class="container">

            <div class="section text-center">
                <h2 class="title">Listado de productos disponibles</h2>
                <div class="team">
                    <div class="row">
                    <p><a href="{{ url('/admin/products/create')}}" class="btn btn-primary btn-round">Nuevo Producto</a></p>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="col-md-1 text-center">Nombre</th>
                                    <th class="col-md-3 text-center">Descripción</th>
                                    <th class="col-md-1">Categoría</th>
                                    <th class="col-md-2">Precio</th>
                                    <th class="col-md-4">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="text-center">{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->category_name }}</td>
                                    <td class="text-right">&euro; {{ $product->price }}</td>
                                    <td class="td-actions text-right">
                                        

                                        <form method="post" action="{{ url('/admin/products/'.$product->id.'/delete') }}">
                                            {{ csrf_field() }}
                                            <a href="{{ url('/products/'.$product->id) }}" type="button" rel="tooltip" title="Ver producto" class="btn btn-info" target="_blank">
                                            <i class="material-icons">info</i>
                                        </a>
                                        <a href=" {{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar producto" class="btn btn-success">
                                            <i class="material-icons">edit</i>
                                        </a>

                                        <a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" title="imagenes del producto" class="btn btn-warnig btn-simple btn-xs"><i class="fa fa-image"></i></a>

                                            <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $products->links() }}

                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('includes.footer')
@endsection

