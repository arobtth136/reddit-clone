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
    <div class="row">
        <div class="col">
            <div class="card">Esto es card</div>
        </div>
    </div>
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
