@extends('layouts.app')

@section('content')

<h1>Listado de currículums</h1>
<h3>Filtrar por herramienta</h3>
<div class="col">
    @foreach ($tools as $tool) 
        <a href="{{ route ('user.tool', $tool->id ) }}" ><img src="{{ $tool->img }}" style="height: 1em"></a>
        
    @endforeach
    </div>

<table class="table table-primary table-hover">
    <thead>
        <th>Currículums disponibles</th>
        <th>Herramientas</th>
    </thead>
    @foreach ($users as $user)
    <tr>
        <td><a href="{{ route('users.show', $user)}}" class="nav-link">{{ $user->name . '(' . $user->email . ')' }}</a></td>
        <td>
            @php
                $showedTool = [];
            @endphp

            @foreach ($user->experiences as $experiences)
                @foreach ($experiences->tools as $tool) 
                
                    @if (!isset ($showedTool[$tool->id]))
                <img src="{{ $tool->img }}" alt="{{ $tool->name}}" style="height: 1em">    
                    @php
                        $showedTool[$tool->id] = true;
                    @endphp
                    @endif
                
                @endforeach
                
            @endforeach
            
        </td>
    </tr>        
    @endforeach

  </table>
@endsection
