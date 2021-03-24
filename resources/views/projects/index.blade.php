@extends('layout')

@section('title', 'Portafolio')

@section('content')
<div class="container">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <h1 class="display-4 mb-0">Portafolio</h1>
        @auth
            <a class="btn btn-primary" href="{{ route('projects.create') }}">Crear Proyecto</a>
        @endauth
    </div>
    <p class="lead text-secondary">Proyectos que se deben realizar</p>
    <div class="d-flex flex-wrap justify-content-between align-items-start">
        @forelse($projects as $project)
            <div class="card border-0 shadow-sm mt-4 mx-auto" style="width: 18rem">
                    @if($project->image)
                        <img class="card-img-top" src="/storage/{{ $project->image }}" alt="" style="height: 236px; object-fit: cover">
                    @endif
                    <div class="card-body">
                    <h5 class="card-title"> 
                        <a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a>
                    </h5>
                        <h6 class="card-subtitle">{{ $project->created_at->format('d/m/Y') }} </h6>
                        <p class="card-text">{{ $project->description }}</p>
                        <a class="btn btn-primary" href="{{ route('projects.show', $project) }}">Ver más</a>
                    </div>
            </div>
        @empty
            <li class="d-flex justify-content-between align-items-center">
            No hay proyectos para mostrar
            </li>
        @endforelse
        {{ $projects->links() }}
    </div>
</div>
@endsection