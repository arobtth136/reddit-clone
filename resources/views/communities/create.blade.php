@extends('layouts.app')
@section('content')
    <form action="{{route('communities.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col s12 m6 l4 input-field">
                <input type="text" name="name" id="name" class="@error('name') red-text @enderror" value="{{old('name')}}">
                <label for="name">Nombra tu comunidad</label>
                @error('name')
                    <span class="helper-text red-text">{{$message}}</span>
                @enderror
            </div>
            <div class="col s12 m6 l4 input-field">
                <input type="text" name="icon" id="icon" class="@error('icon') red-text @enderror" value="{{old('icon')}}">
                <label for="icon">Icono de la comunidad</label>
                @error('icon')
                <span class="helper-text red-text">{{$message}}</span>
                @enderror
            </div>
            <div class="col s12 m6 l4 input-field">
                <input type="text" name="group_pick" id="group_pick" class="@error('group_pick') red-text @enderror" value="{{old('group_pick')}}">
                <label for="group_pick">Foto de fondo de la comunidad</label>
                @error('group_pick')
                <span class="helper-text red-text">{{$message}}</span>
                @enderror
            </div>
        </div>
        <input type="submit" value="Registrar" class="waves-effect waves-light btn">
    </form>
@endsection
