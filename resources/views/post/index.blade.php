@extends('layouts.app')
@section('content')
    <a href="{{route('post.create')}}" class="waves-effect waves-light btn">Crear post</a>
    <div class="row">
        <div class="col">
            <div class="card">Esto es carta</div>
        </div>
    </div>
@endsection
