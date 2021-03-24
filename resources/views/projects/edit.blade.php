@extends('layout')

@section('title', 'Crear proyecto')

@section('content')
<div class="container">
    <div class="container">
        <div class="row">
                @include('partials.validation-errors')
            <form class="bg-white py-3 px-4 shadow rounded" 
                method="POST" 
                enctype="multipart/form-data"
                action="{{ route('projects.update', $project) }}">
                    <h1>Editar el proyecto</h1>
                @method('PATCH')
                @include('projects._form')
                <button class="btn btn-primary btn-lg btn-block">Actualizar</button>
                <a class="btn btn-link btn-block"
                href="{{ route('projects.index') }}">Cancelar</a> 
               
            </form>
        </div> 
    </div>
</div>
    
    
@endsection 