@extends('admin.dashboards.dashboard')

@section('title', 'Modifier une spécification')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <h1 class="h4 mb-4 fw-bold">Modifier la spécification</h1>

            <form action="{{ route('specifications.update', $specification->id) }}" method="post" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-md-8">
                    <label for="name" class="form-label">Nom <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                           id="name" name="name" value="{{ old('name', $specification->name) }}"
                           placeholder="Ex : Piscine, Parking, Climatisation..." required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                
                <div class="col-md-12 mt-4 d-flex gap-2">
                    <a href="{{ route('specifications.index') }}" class="btn fw-semibold flex-grow-1"
                       style="border: 2px solid #D4A017; color: #D4A017; background-color: transparent;">
                        Annuler
                    </a>

                    <button type="submit" class="btn fw-semibold flex-grow-1" style="background-color: #D4A017; border-color: #D4A017; color: white;">
                        Mettre à jour
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection