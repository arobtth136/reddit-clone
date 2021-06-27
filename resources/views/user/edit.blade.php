@extends('layouts.app')
@section('content')
    <form action="{{route('users.update',['user' => $user->id])}}" method="post">
        @method('patch')
        @csrf
        <div class="row">
            <div class="col s12 m4 input-field">
                <input type="text" id="name" name="name" value="{{$user->name}}" class="@error('user') red-text @enderror">
                <label for="name">Nombre</label>
                @error('user')
                <span class="helper-text red-text">{{$message}}</span>
                @enderror
            </div>
            <div class="col s12 m4 input-field">
                <input type="text" id="username" name="username" value="{{$user->username}}" class="@error('username') red-text @enderror">
                <label for="name">Usuario</label>
                @error('username')
                <span class="helper-text red-text">{{$message}}</span>
                @enderror
            </div>
            <div class="col s12 m4 input-field">
                <input type="text" id="email" name="email" value="{{$user->email}}" class="@error('email') red-text @enderror">
                <label for="name">Correo</label>
                @error('email')
                <span class="helper-text red-text">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col s12 m4">
                <input type="password" id="password" name="password">
                <label for="password">Nueva contraseña</label>
            </div>
            <div class="col s12 m4" id="errores">
                <input type="password" id="verify_password" name="verify_password">
                <label for="password">confirmar contraseña</label>
            </div>
            <div class="col s12 m4">
                <input type="text" id="profile_pick" name="profile_pick" value="{{$user->profile_pick}}">
                <label for="password">Link de foto</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12"><input type="submit" class="waves-effect waves-light btn green" value="Actualizar"></div>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelector('#verify_password').addEventListener('input', validarContra)
            document.querySelector('#password').addEventListener('input', validarContra)
            function validarContra(){
                const contra = document.querySelector('#password').value
                const verify = document.querySelector('#verify_password').value
                if(contra === verify){
                    if(document.querySelector('#error') !== null){
                        document.querySelector('#error').remove()
                    }
                } else {
                    if(document.querySelector('#errores') === null){
                        document.querySelector('#errores').innerHTML += `
                            <label class="helper-text red-text" id="error">las contraseñas no coinciden</label>
                        `
                    }
                }
            }
        })
    </script>
@endsection
