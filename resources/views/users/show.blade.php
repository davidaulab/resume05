@extends('layouts.app')
@section('content')
    
<h1> {{ $user->name }}</h1>
<h2>Email de contacto: {{ $user->email }}</h2>

<h2>Experiencias de interés</h2>

@foreach ($user->experiences as $experience)
<div class="w-100 my-2">
<x-card 
title="{{ $experience->role . ' en ' . $experience->company }}" 
subtitle="{{ 'desde ' . $experience->from . ' hasta ' . $experience->to }}">
<x-slot:content>
    <p>{{ $experience->description }}</p>
    <p>
        @foreach ($experience->tools as $tool)

        <img src="{{ $tool->img}}" alt="{{$tool->name}}" style="height: 2em">
            
        @endforeach
    </p>

</x-slot:content>
</x-card>
</div>
@endforeach
<div class="d-flex justify-content-center">
<a href="{{ route ('home') }}" class="btn btn-primary">Volver</a>
</div>
@endsection