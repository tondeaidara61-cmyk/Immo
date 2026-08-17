@extends('admin.app')

@section('title','Login admin')

@section('content')
    <div class="container-fluid">
      <div class="row vh-100 ">
            <div class="col-7">
                <img src="" alt="" class="img-fluid">
            </div>

            <div class="col-4 align-items-center">
                <h1 class="display-6">Login</h1>
                <form action="{{route('store')}}" method="post" class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Login</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name" placeholder="Entez votre login.....">
                    </div>
                    <div class="mb-5">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" id="password" name="password" placeholder="****************" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">
                            Se connecter
                        </button>
                    </div>
                </form>
            </div>
      </div>
    </div>
@endsection