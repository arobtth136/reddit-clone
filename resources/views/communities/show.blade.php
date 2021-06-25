@extends('layouts.app')
@section('content')
    <p>Aqui arriba poner el group_pick</p>
    <div class="row">
        <div class="col s12">
            <h1>{{$community->name}}</h1>
            <h4>{{$community->users()->count()}} usuarios</h4>
        </div>
    </div>
    @if(Auth::check() && Auth::user()->belongs_to_community($community))
        <a class="waves-effect waves-light btn" onclick="join_community()">Unirse a comunidad</a>
        <form action="{{route('community.join', ['community' => $community->id])}}" id="join_community" method="POST">@csrf</form>
    @elseif(Auth::check())
        <h6>Perteneces a esta comunidad desde {{Auth::user()->communities()->find($community->id)->pivot->created_at}}</h6>
    @else
        <a href="{{route('login')}}" class="waves-effect waves-light btn">Iniciar sesión para acceder</a>
    @endif
    @if(Auth::check() && !Auth::user()->belongs_to_community($community))
        <form action="{{route('post.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col s12 input-field">
                    <input type="text" id="title" name="title">
                    <label for="title">Título</label>
                </div>
                <div class="col s12 input-field">
                    <textarea name="body" id="body" class="materialize-textarea"></textarea>
                </div>
            </div>
        </form>
    @endif
    @if($community->posts()->count() > 0)
        @foreach($community->posts as $post)
            <div class="row">
                <div class="col s12">
                    <div class="card">

                    </div>
                </div>
            </div>
        @endforeach
    @else
        <h5 class="center-align">No hay nada que mostrar</h5>
    @endif
    {{$community}}
@endsection
@section('scripts')
    <script>
        function join_community(){
            console.log('hola')
            event.preventDefault()
            document.querySelector('#join_community').submit()
        }
    </script>
@endsection
