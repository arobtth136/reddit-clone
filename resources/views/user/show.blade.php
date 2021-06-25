@extends('layouts.app')
@section('content')
    @if(Auth::id() === $user->id)
    <div class="row">
        <div class="col s3">
            <a href="{{route('users.edit', ['user' => Auth::id()])}}" class="waves-effect waves-light btn yellow black-text">Edit info</a>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col s3">
            <img src="{{$user->profile_pick}}" class="circle" alt="User pick">
        </div>
        <div class="col s9">
            <h3>{{$user->username}}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col s4">Nombre: {{$user->name}}</div>
        <div class="col s4">Email: {{$user->email}}</div>
        <div class="col s4">Miembro desde: {{$user->created_at}}</div>
    </div>
    <div class="divider"></div>
    <div class="row">
        <div class="col s12 m6">
            <ul class="collection with-header">
                <li class="collection-header"><h4>Comunidades a las que pertenece</h4></li>
                @if($user->communities()->count() > 0)
                    @foreach($user->communities as $community)
                        <a href="{{route('communities.show', ['community' => $community->id])}}" class="collection-item">{{$community->name}}</a>
                    @endforeach
                @else
                    <li class="collection-item">No pertenece a alguna comunidad aún</li>
                @endif
            </ul>
        </div>
        <div class="col s12 m6">
            <ul class="collection with-header">
                <li class="collection-header"><h4>Ultimos post</h4></li>
                @if(Auth::id() === $user->id)
                    <a href="{{route('post.create')}}" class="collection-item">Crear un nuevo post <i class="material-icons">create</i></a>
                @endif
                @if($user->posts()->count() > 0)
                    @foreach($user->posts as $post)
                        <a href="{{route('post.show', ['post' => $post->id])}}" class="collection-item">{{$post->title}}</a>
                    @endforeach
                @else
                    <li class="collection-item">No se ha publicado nada aún</li>
                @endif
            </ul>
        </div>
    </div>
    <div class="divider"></div>
    <div class="row">
        <div class="col s12">
            <ul class="collection with-header">
                <li class="collection-header"><h4>Comunidades que administra</h4></li>
                @if(Auth::id() === $user->id)
                    <a href="{{route('communities.create')}}" class="collection-item">Crear una nueva comunidad <i class="material-icons">create</i></a>
                @endif
                @if($user->created_communities()->count() > 0)
                    @foreach($user->created_communities as $community)
                        <a href="{{route('communities.show', ['community' => $community->id])}}" class="collection-item">{{$community->name}}</a>
                    @endforeach
                @else
                    <li class="collection-item">No administra alguna comunidad aún</li>
                @endif
            </ul>
        </div>
    </div>
@endsection

