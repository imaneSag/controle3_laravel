@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h1 class="text-center">Connexion</h1>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >
                            </div>
                           
    
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input id="password" type="password" class="form-control" name="password" >
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">
                                    Connexion
                                </button>
                            </div>
                            @error('email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </form>
                    </div>
           
        </div>
    </div>
@endsection