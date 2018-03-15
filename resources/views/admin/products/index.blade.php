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
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Categoría</th>
                                    <th class="col-md-2">Precio</th>
                                    <th class="col-md-3">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="text-center">{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->category ? $product->category->name : 'General' }}</td>
                                    <td class="text-right">&euro; {{ $product->price }}</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Ver producto" class="btn btn-info">
                                            <i class="material-icons">info</i>
                                        </button>
                                        <a href=" {{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar producto" class="btn btn-success">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <button type="button" rel="tooltip" title="Eliminar producto" class="btn btn-danger">
                                            <i class="material-icons">close</i>
                                        </button>
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
@endsection

