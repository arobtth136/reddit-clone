@extends('layouts.app')
@section('content')
    <form action="{{route('post.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col s12">
                <div class="input-field col s12">
                    <input type="text" id="title" name="title">
                    <label for="title">Titutlo</label>
                    @error('title')
                        <span class="helper-text red-text">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col s12">
                <div class="input-field col s12">
                    <textarea name="body" id="body" class="materialize-textarea"></textarea>
                    <label for="body">Añade una descripción</label>
                    @error('body')
                        <span class="helper-text">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col s6">
                <div class="input-field col s12">
                    <select name="community_id" id="community_id">
                        @foreach(Auth::user()->communities as $community)
                            <option value="{{$community->id}}">{{$community->name}}</option>
                        @endforeach
                    </select>
                    <label for="community_id">Comunidad</label>
                </div>
            </div>
            <div class="col s6">
                <div class="input-field col s12">
                    <input type="text" name="picture" id="picture">
                    <label for="picture">URL de imagen</label>
                </div>
            </div>
        </div>
        <input type="submit" class="waves-effect waves-light btn" value="Postear">
    </form>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            M.FormSelect.init(document.querySelector('#community_id'))
            document.querySelector('#body').characterCounter()
        })
    </script>
@endsection
