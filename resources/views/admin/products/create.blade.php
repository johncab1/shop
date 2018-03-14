@extends('layouts.app')

@section('body-class', 'landing-page')
@section('title', 'Bienvenido a App Shop')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/examples/profile_city.jpg') }}');">

    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section">

                    <h2 class="title text-center">Registrar nuevo producto.</h2>

                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto">
                            <form method="post" action="{{ url('/admin/products') }}">
                            {{ csrf_field() }}

                           

                                <div class="form-group">                        
                                    <label for="name" class="bmd-label-floating">Nombre del producto</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            

                            <div class="form-group">                        
                                <label for="description" class="bmd-label-floating">Descripción corta</label>
                                <input type="text" class="form-control" id="description" name="description">
                            </div>

                            <div class="form-group">                        
                                <label for="price" class="bmd-label-floating">Precio</label>
                                <input type="number" class="form-control" id="price" name="price">
                            </div>

                            <div class="form-group">
                                <label for="long_description">Descripción completa</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" id="long_description" rows="3" name="long_description"></textarea>
                            </div>

                            <button class="btn btn-primary">
                                                Registrar Producto
                                            </button>

                            </form>
                        </div>
                    </div>

            </div>

        </div>
    </div>
@endsection
