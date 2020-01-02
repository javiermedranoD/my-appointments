@extends('layouts.panel')

@section('content')
<?php 
    if(isset($_GET['page']))
        $page = $_GET['page']; 
    else
        $page=1;
?>
<div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Editar paciente</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('patients?page='.$page) }}" class="btn btn-sm btn-default">Volver</a>
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
                
                <form action="{{ url('patients/'.$patient->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input name="page" type="hidden" value="{{ $page }}">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $patient->name) }}" >
                    </div>

                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email', $patient->email) }}" >
                    </div>

                    <div class="form-group">
                        <label for="identificacion">Identificación</label>
                        <input type="text" name="identificacion" class="form-control" value="{{ old('identificacion', $patient->identificacion) }}" >
                    </div>

                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address', $patient->address) }}" >
                    </div>

                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $patient->phone) }}" >
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        
                        <input type="text" name="password" class="form-control" value="" >
                        <p>Ingrese un valor sólo si desea modificar la contraseña</p>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"> Guardar
                        </button>
                    </div>
                </form>
            </div>
          </div>


     
        

@endsection
