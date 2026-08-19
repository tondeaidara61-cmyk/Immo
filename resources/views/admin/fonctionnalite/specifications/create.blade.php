@extends('admin.app')

@section('title', 'Ajouter une spécification')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <h1 class="h4 mb-4 fw-bold">Ajouter une spécification</h1>

            <form action="{{route("spe_store")}}" method="post" class="row g-3">
                @csrf

                <div class="col-md-8">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                           id="name" name="name" value="{{ old('name') }}"
                           placeholder="Ex : Piscine, Parking, Climatisation..." required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-md-12 mt-4">
                    <button type="submit" class="btn w-100 py-2 fw-semibold" style="background-color: #D4A017; border-color: #D4A017; color: white;">
                        Enregistrer
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection