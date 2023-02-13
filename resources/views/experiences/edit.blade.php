@extends('layouts.app')

@section('content')


<x-card title="Modificar Experiencia" subtitle="Actualiza todos los campos de la experiencia">
<x-slot:content>
  <!-- ['description', 'role', 'company', 'from', 'to'];-->
<form method="post" action="{{ route ('experiences.update', $experience) }}" type="plain/text">
    @method('PUT')
    @csrf

    <div class="mb-3">
      <label for="role" class="form-label">Puesto</label>
      <input type="text" class="form-control" id="role" name="role" value="{{ $experience->role}}">
    </div>
    <div class="mb-3">
      <label for="company" class="form-label">Empresa </label>
      <input type="text" class="form-control" id="company" name="company"  value="{{ $experience->company}}">
    </div>
    <div class="mb-3">
        <label for="from" class="form-label">Desde </label>
        <input type="date" class="form-control" id="from" name="from"  value="{{ $experience->from }}">
      </div>
      <div class="mb-3">
        <label for="to" class="form-label">Hasta </label>
        <input type="date" class="form-control" id="to" name="to"  value="{{ $experience->to }}" >
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Descripción </label>
        <textarea class="form-control" id="description" name="description">{{ $experience->description }}</textarea>
      </div>
      <div class="mb-3">
        <label for="tools" class="form-label">Herramientas </label>
        <div class="row">
        @foreach ($tools as $tool)
         <div class="col-4"> 
        @if ($experience->tools->find ($tool->id ))
        <input type="checkbox" name="tools[]" id="tool_{{ $tool->id }}" value="{{ $tool->id }}" checked > {{ $tool->name }}
          
        @else
        <input type="checkbox" name="tools[]" id="tool_{{ $tool->id }}" value="{{ $tool->id }}"> {{ $tool->name }}
          
        @endif
         </div>
        @endforeach
        </div>
      </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>

</x-slot:content>
</x-card>
@endsection