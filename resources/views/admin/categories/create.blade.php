@extends('layouts.app')

@section('body-class', 'landing-page')
@section('title', 'Bienvenido a App Shop')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/examples/profile_city.jpg') }}');">

    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section">

                    <h2 class="title text-center">Registrar nueva categoria.</h2>

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
                            <form method="post" action="{{ url('/admin/categories') }}">
                            {{ csrf_field() }}

                           

                                <div class="form-group">                        
                                    <label for="name" class="bmd-label-floating">Nombre de la categoria</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                </div>
                            



                            <div class="form-group">
                                <label for="description">Descripción de la categoria</label>
                                <textarea class="form-control" id="descripcion" rows="3" name="descripcion">{{ old('descripcion') }}</textarea>
                            </div>

                            <button class="btn btn-primary">
                                                Registrar categoria
                                            </button>

                            </form>
                        </div>
                    </div>

            </div>

        </div>
    </div>
    @include('includes.footer')
@endsection
