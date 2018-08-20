@extends('layouts.app')

@section('body-class', 'profile-page')
@section('title', 'Listado de productos')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/examples/profile_city.jpg') }}');">       
    </div>

    <div class="main main-raised">
        <div class="container">

            <div class="section text-center">
                <h2 class="title">Listado de categorias</h2>
                <div class="team">
                    <div class="row">
                    <p><a href="{{ url('/admin/categories/create')}}" class="btn btn-primary btn-round">Nueva categoria</a></p>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="col-md-1 text-center">Nombre</th>
                                    <th class="col-md-3 text-center">Descripción</th>
                                    <th class="col-md-4">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="text-center">{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->descripcion }}</td>

                                    <td class="td-actions text-right">
                                        

                                        <form method="post" action="{{ url('/admin/categories/'.$category->id.'/delete') }}">
                                            {{ csrf_field() }}
                                            <a type="button" rel="tooltip" title="Ver categoria" class="btn btn-info">
                                            <i class="material-icons">info</i>
                                        </a>
                                        <a href=" {{ url('/admin/categories/'.$category->id.'/edit') }}" rel="tooltip" title="Editar categoria" class="btn btn-success">
                                            <i class="material-icons">edit</i>
                                        </a>


                                            <button type="submit" rel="tooltip" title="Eliminar categoria" class="btn btn-danger">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $categories->links() }}

                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('includes.footer')
@endsection

