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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="post" action="{{ url('/admin/products') }}">
                            {{ csrf_field() }}

                           

                                <div class="form-group">                        
                                    <label for="name" class="bmd-label-floating">Nombre del producto</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                </div>
                            

                            <div class="form-group">                        
                                <label for="description" class="bmd-label-floating">Descripción corta</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                            </div>

                            <div class="form-group">                        
                                <label for="price" class="bmd-label-floating">Precio</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
                            </div>

                            <div class="form-group">
                                <label for="long_description">Descripción completa</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" id="long_description" rows="3" name="long_description">{{ old('long_description') }}</textarea>
                            </div>


                            <div class="form-group">
                                <label for="categoria"></label>
                                <select class="form-control" name="category_id">
                                    <option value="0">General</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
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
    @include('includes.footer')
@endsection
