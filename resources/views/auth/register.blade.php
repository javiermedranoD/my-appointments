@extends('layouts.form')

@section('title','Registro de datos')
@section('subtitle','Ingresa tus datos para registrarte')

@section('content')
<div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <!-- <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-4"><small>Sign up with</small></div>
              <div class="text-center">
                <a href="#" class="btn btn-neutral btn-icon mr-4">
                  <span class="btn-inner--icon"><img src="../assets/img/icons/common/github.svg"></span>
                  <span class="btn-inner--text">Github</span>
                </a>
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="../assets/img/icons/common/google.svg"></span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>
            </div> -->
            <div class="card-body px-lg-5 py-lg-5">
              
              <form role="form" method="POST" action="{{ route('register') }}">
                  @csrf
                
                 @if ($errors->any())
                    <div class="text-center text-muted mb-4">
                        <small>Se encontró un error</small>
                    </div>
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first()}}
                    </div>
                @endif

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Nombre" type="text" name="name" value="{{ old('name') }}" required autofocu>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Contraseña" type="password" name="password" required>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Confirmar contraseña" type="password" name="password_confirmation" required>
                  </div>
                </div>
               
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Registrar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
