@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col s12 input-field">
            <i class="material-icons prefix">search</i>
            <input type="text" id="search" class="autocomplete">
            <label for="search">Buscar una comunidad</label>
        </div>
    </div>
    @auth
        <a href="{{route('post.create')}}" class="waves-effect waves-light btn">Crear post</a>
    @endauth
    @foreach($posts as $post)
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">
                            <a href="{{route('communities.show', ['community' => $post->community_id])}}">{{$post->community->name}} ></a>
                            <a href="{{route('users.show',['user' => $post->user_id])}}">{{$post->user->username}} ></a>
                            <a href="{{route('post.show', ['post' => $post->id])}}">{{$post->title}}</a>
                        </span>
                        <p class="text-truncate">{{$post->body}}</p>
                    </div>
                    <div class="card-action">
                        @if(Auth::check())
                            <a href="{{route('post.like', ['post' => $post->id])}}"><i class="material-icons">thumb_up</i></a>
                            <a href="{{route('post.dislike', ['post' => $post->id])}}"><i class="material-icons">thumb_down</i></a>
                        @else
                            <a href="{{route('login')}}"><i class="material-icons">thumb_up</i></a>
                            <a href="{{route('login')}}"><i class="material-icons">thumb_down</i></a>
                        @endif
                        <a href="#!">{{$post->likes}} likes</a>
                        @if(Auth::check())
                            <a href="{{route('post.show', ['post' => $post->id])}}">{{$post->comments()->count()}} comentarios</a>
                        @else
                            <a href="{{route('login')}}">{{$post->comments()->count()}} comentarios</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            const autocomplete = M.Autocomplete.init(document.querySelector('#search'),{
                onAutocomplete: function (e){
                    window.location.replace('/auto/post/'.concat(e))
                }
            })
            loadCommunities()

            function loadCommunities(){
                const res = {!! json_encode($communities->toArray()) !!};
                var data = {}
                for(i in res){
                    data[res[i].name] = null
                }
                autocomplete.updateData(data)
            }
        })
    </script>
@endsection
