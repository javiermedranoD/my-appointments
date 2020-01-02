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
                  <h3 class="mb-0">Pacientes</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('patients/create') }}" class="btn btn-sm btn-success">Nuevo paciente</a>
                </div>
              </div>
            </div>
            <div class="card-body">
            @if (session('notification'))
                <div class="alert alert-success" role="alert">
                    {{ session('notification') }}
                </div>
            @endif
            </div>
            
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">ID</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($patients as $patient)
                  <tr>
                    <th scope="row">
                      {{ $patient->name }}
                    </th>
                    <td>
                      {{ $patient->email }}
                    </td>
                    <td>
                      {{ $patient->identificacion }}
                    </td>
                    <td>
                      
                      <form action="{{ url('/patients/'.$patient->id) }}" method="POST">
                      @csrf 
                      @method('DELETE')
                      <a href="{{ url('/patients/'.$patient->id.'/edit?page='.$page) }}" class="btn btn-sm btn-primary">Editar</a>
                      <input name="page" type="hidden" value="{{ $page }}">
                      <button href="" class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                      </form>
                      
                    </td>
                    
                  </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
            {{ $patients->get('page')}}
            <div class="card-body mx-auto">
                <p class="">
                    {{ $patients->links() }}
                </p>
            </div>
            
          </div>


     
        

@endsection
