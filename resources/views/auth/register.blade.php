@extends('layouts.app')


@section('body-class', 'signup-page')
@section('content')
<br><br><br>
    <div class="page-header header-filter" filter-color="purple" style="background-image: url('{{ asset('img/bg7.jpg') }}'); background-size: cover; background-position: top center;">
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <div class="card card-signup">
                        <h2 class="card-title text-center">Registro</h2>
                        <div class="card-body">

               
                    <div class="row">
                               
                                <div class="col-md-8">
                                    <div class="social text-center">
                                        <button class="btn btn-just-icon btn-round btn-twitter">
                                            <i class="fa fa-twitter"></i>
                                        </button>
                                        <button class="btn btn-just-icon btn-round btn-dribbble">
                                            <i class="fa fa-dribbble"></i>
                                        </button>
                                        <button class="btn btn-just-icon btn-round btn-facebook">
                                            <i class="fa fa-facebook"> </i>
                                        </button>
                                        <h4> or be classical </h4>
                                    </div>
                                    <form class="form" method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">face</i>
                                                </span>
                                                <input type="text" name="name" class="form-control" placeholder="First Name...">
                                                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">email</i>
                                                </span>
                                                <input type="text" name="email" class="form-control" placeholder="Email...">
                                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                            </div>

                                        </div>



                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                                <input type="password" name="password" placeholder="Password..." class="form-control" />
                                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                            </div>
                                        </div>


                                         <div class="form-group">
                                         <div class="input-group">
                                         <span class="input-group-addon">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                       
                          
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="confirmar contraseña" />
                            
                            </div>
                        </div>


                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                                I agree to the
                                                <a href="#something">terms and conditions</a>.
                                            </label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-round">Registrarse</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
