@extends('layouts.panel')

@section('content')
<form action="{{ url('/schedule') }}" method="post">
    @csrf
    <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Gestionar horario</h3>
                </div>
                <div class="col text-right">
                  <button type="submit" class="btn btn-sm btn-success">Guardar cambios</button>
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
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Día</th>
                    <th scope="col">Activo</th>
                    <th scope="col">Turno Mañana</th>
                    <th scope="col">Turno Tarde</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $workDays as $key => $workDay ) 
                        <tr>
                            <th>{{$days[$key]}}</th>
                            <td>
                                <label class="custom-toggle">
                                <input type="checkbox" name="active[]" value="{{ $key }}" @if($workDay->active) checked @endif>
                                <span class="custom-toggle-slider rounded-circle"></span>
                                </label>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="morning_start[]">
                                          @for ($i=6; $i<=11; $i++)  
                                            <option value="{{ $i}}:00" 
                                            @if($i.':00 AM'==$workDay->morning_start) selected @endif>
                                                {{ $i}}:00 am
                                            </option>
                                            <option value="{{ $i}}:30" 
                                            @if($i.':30 AM'==$workDay->morning_start) selected @endif>
                                                {{ $i}}:30 am
                                            </option>
                                          @endfor
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="morning_end[]">
                                          @for ($i=6; $i<=11; $i++)  
                                            <option value="{{ $i}}:00" 
                                            @if($i.':00 AM'==$workDay->morning_end) selected @endif>
                                                {{ $i}}:00 am
                                            </option>
                                            <option value="{{ $i}}:30" 
                                            @if($i.':30 AM'==$workDay->morning_end) selected @endif>
                                                {{ $i}}:30 am
                                            </option>
                                          @endfor
                                        </select>
                                    </div>
                                </div>
                                
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="afternoon_start[]">
                                          @for ($i=1; $i<=7; $i++)  
                                            <option value="{{ $i+12}}:00" 
                                            @if($i.':00 PM'==$workDay->afternoon_start) selected @endif>
                                                {{ $i}}:00 pm
                                            </option>
                                            <option value="{{ $i+12}}:30" 
                                            @if($i.':30 PM'==$workDay->afternoon_start) selected @endif>
                                                {{ $i}}:30 pm
                                            </option>
                                          @endfor
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="afternoon_end[]">
                                          @for ($i=1; $i<=7; $i++)  
                                            <option value="{{ $i+12}}:00" 
                                            @if($i.':00 PM'==$workDay->afternoon_end) selected @endif>
                                                {{ $i}}:00 pm
                                            </option>
                                            <option value="{{ $i+12}}:30" 
                                            @if($i.':30 PM'==$workDay->afternoon_end) selected @endif>
                                                {{ $i}}:30 pm
                                            </option>
                                          @endfor
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
      </div>
</form>
     


     
        

@endsection
