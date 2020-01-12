@extends('layouts.panel')

@section('content')
<div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Reservar cita</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('patients') }}" class="btn btn-sm btn-default">Volver</a>
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

                <form action="{{ url('patients') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="specialty">Especialidad</label>
                        <select name="specialty" id="" class="form-control">
                            @foreach ($specialties as $specialty)
                                <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="doctor">Médico</label>
                        <select name="doctor" id="" class="form-control">
                            <option value=""></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="date">Fecha de atención</label>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input class="form-control datepicker" placeholder="Seleccione una fecha" type="text" value="06/20/2019">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="time">Hora de atención</label>
                        <input type="text" name="time" class="form-control" value="{{ old('email') }}" >
                    </div>

                   

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"> Guardar
                        </button>
                    </div>
                </form>
            </div>
          </div>


     
        

@endsection

@section('scripts')
<script src="{{ asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

@endsection