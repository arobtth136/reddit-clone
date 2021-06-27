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
            <ul class="collapsible" id="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons">collections_bookmark</i> Comunidades a las que pertenece</div>
                    <div class="collapsible-body">
                        @if($user->communities()->count() > 0)
                            @foreach($user->communities as $community)
                                <p><a href="{{route('communities.show', ['community' => $community->id])}}">{{$community->name}}</a></p>
                            @endforeach
                        @else
                            <p>No pertenece a alguna comunidad aún</p>
                        @endif
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">import_contacts</i> Publicaciones en comunidades</div>
                    <div class="collapsible-body">
                        @if(Auth::id() === $user->id)
                            <h5><a href="{{route('post.create')}}">Crear un nuevo post <i class="material-icons">create</i></a></h5>
                        @endif
                        @if($user->posts()->count() > 0)
                            @foreach($user->posts()->limit(5)->get() as $post)
                                <p><a href="{{route('post.show', ['post' => $post->id])}}">{{$post->title}}</a></p>
                            @endforeach
                         @else
                            <p>No se ha publicado nada aún</p>
                        @endif
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">device_hub</i> Comunidades que administra</div>
                    <div class="collapsible-body">
                        @if(Auth::id() === $user->id)
                            <h5><a href="{{route('communities.create')}}" class="collection-item">Crear una nueva comunidad <i class="material-icons">create</i></a></h5>
                        @endif
                        @if($user->created_communities()->count() > 0)
                            @foreach($user->created_communities as $community)
                                <p><a href="{{route('communities.show', ['community' => $community->id])}}">{{$community->name}}</a></p>
                            @endforeach
                        @else
                            <p>No administra alguna comunidad aún</p>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            M.Collapsible.init(document.querySelector('#collapsible'))
        })
    </script>
@endsection

