@extends('layouts.panel')

@section('content')
<div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Nuevo médico</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('doctors') }}" class="btn btn-sm btn-default">Volver</a>
                </div>
              </div>
            </div>
            <div class="card-body">
                @if ($errors->any())
                  <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </div>  
                @endif

                <form action="{{ url('doctors') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" >
                    </div>

                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}" >
                    </div>

                    <div class="form-group">
                        <label for="identificacion">Identificación</label>
                        <input type="text" name="identificacion" class="form-control" value="{{ old('identificacion') }}" >
                    </div>

                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}" >
                    </div>

                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" >
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="text" name="password" class="form-control" value="{{ str_random(6) }}" >
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"> Guardar
                        </button>
                    </div>
                </form>
            </div>
          </div>


     
        

@endsection
