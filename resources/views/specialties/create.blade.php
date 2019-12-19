@extends('layouts.panel')

@section('content')
<div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Nueva especialidad</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('specialties') }}" class="btn btn-sm btn-default">Volver</a>
                </div>
              </div>
            </div>
            <div class="card-body">
                <form action="{{ url('specialties') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <input type="text" name="description" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"> Guardar
                        </button>
                    </div>
                </form>
            </div>
          </div>


     
        

@endsection
