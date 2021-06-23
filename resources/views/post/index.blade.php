@extends('layouts.app')
@section('content')
    @auth
        <a href="{{route('post.create')}}" class="waves-effect waves-light btn">Crear post</a>
    @endauth
    <div class="row">
        <div class="col">
            <div class="card">Esto es card</div>
        </div>
    </div>
@endsection
