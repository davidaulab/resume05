@extends('layouts.app')

@section('content')
    <x-card 
        title="{{ $experience->role . ' en ' . $experience->company }}" 
        subtitle="{{ $experience->from . ' ' . $experience->to }}"> 
        
        <x-slot:content>
        <p>{{ $experience->description }}</p>
        <p>
            @foreach ($experience->tools as $tool)

            <img src="{{ $tool->img}}" alt="{{$tool->name}}" style="height: 2em">
                
            @endforeach
        </p>

    </x-slot:content>
    </x-card>

<div class="d-flex justify-content-center">

    <a href="{{ route('experiences.index')}}" class="btn btn-primary btn-sm m-4">Volver</a>
    <a href="{{ route('experiences.edit', $experience)}}" class="btn btn-warning btn-sm m-4">Modificar</a>
    <form method="POST" action="{{ route('experiences.destroy', $experience)}}">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger btn-sm m-4">Borrar</button>
    </form>
</div>
@endsection