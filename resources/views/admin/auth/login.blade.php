@extends('admin.app')

@section('title','Login admin')

@section('content')
    <div class="container-fluid">
      <div class="row vh-100">
            <div class="col-12 col-md-8 p-0 login-image order-2 order-md-1">
                <img src="{{ asset('img/7-3.png') }}" alt="" class="w-100 h-100" style="object-fit: cover;">
            </div>

            <div class="col-12 col-md-4 order-1 order-md-2 d-flex flex-column justify-content-center align-items-center login-form-col" >
                <div style="width: 100%; max-width: 350px;  ">

                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset('img/logo.avif') }}" alt="" style="width: 70px; height: 70px; object-fit: cover;">
                        <h1 class="display-3 ms-2 mb-0">Connexion</h1>
                    </div>

                    <form action="{{ route('store') }}" method="post" class="mt-3">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Login</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="name" placeholder="Entez votre login.....">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" id="password" name="password" placeholder="****************" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <button type="submit" class="btn w-100" style="background-color: #D4A017; border-color: #D4A017; color: white;">
                                Se connecter
                            </button>
                        </div>
                    </form>

                </div>
            </div>
      </div>
    </div>
@endsection

