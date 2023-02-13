@extends('layouts.app')

@section('content')

<h1>Listado de experiencias</h1>
<h3>Filtrar por herramienta</h3>
<div class="col">
@foreach ($tools as $tool) 
    <a href="{{ route ('exptool.index', $tool->id ) }}" ><img src="{{ $tool->img }}" style="height: 1em"></a>
    
@endforeach
</div>

<table class="table table-success table-hover">
    <thead>
        <th>Puesto</th>
        <th>Empresa</th>
        <th>Desde</th>
        <th>Hasta</th>
        <th>Herramientas</th>
    </thead>
    @foreach ($exps as $exp)
    <tr>
        <td><a href="{{ route('experiences.show', $exp)}}" class="nav-link">{{ $exp->role}}</a></td>
        <td><a href="{{ route('experiences.show', $exp)}}" class="nav-link">{{ $exp->company}}</a></td>
        <td><a href="{{ route('experiences.show', $exp)}}" class="nav-link">{{ $exp->from}}</a></td>
        <td><a href="{{ route('experiences.show', $exp)}}" class="nav-link">{{ $exp->to}}</a></td>
        <td>
            @foreach ($exp->tools as $tool)
                <img src="{{ $tool->img }}" alt="{{ $tool->name}}" style="height: 1em">
            @endforeach
            
        </td>
    </tr>        
    @endforeach

  </table>
@endsection