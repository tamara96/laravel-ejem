
@extends('layout')

@section('title', 'Contact')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <form method="POST" action="{{ route('message.store') }}" class="bg-white shadow rounded py-4 px-4 ">
                    @csrf
                    <h1 class="display-4">{{__('Contact')}}</h1> 
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror" name="name" placeholder="Nombre" value="{{ old('name' )}}">
                        @error('name')
                            <span class="invalid-feedblack" role="alert">
                                <strong>{{ $message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                        @error('name')
                            <span class="invalid-feedblack" role="alert">
                                <strong>{{ $message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Asunto</label>
                        <input class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror" name="subject" placeholder="Asunto" value="{{ old('subject') }}">
                        @error('name')
                            <span class="invalid-feedblack" role="alert">
                                <strong>{{ $message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Mensaje</label>
                        <textarea class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror" name="content" placeholder="mensaje">{{ old('content') }}
                        </textarea>
                        @error('name')
                            <span class="invalid-feedblack" role="alert">
                                <strong>{{ $message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <button class="btn btn-primary btn-lg btn-block">enviar</button>
                </form>
            </div>
            
        </div>
    </div>
@endsection