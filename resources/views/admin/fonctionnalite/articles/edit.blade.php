@extends('admin.dashboards.dashboard')

@section('title', 'Modifier un article')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

              @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
           @endif

            <h1 class="h4 mb-4 fw-bold">Modifier l'article</h1>

            <form action="{{ route('articles.update', $article->id) }}" method="post" class="row g-3" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-md-8">
                    <label for="title" class="form-label">Titre <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', $article->title) }}" name="title" placeholder="Ex : Bel appartement à Cocody" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="surface" class="form-label">Surface (m²) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('surface') is-invalid @enderror" id="surface" value="{{ old('surface', $article->surface) }}" name="surface" placeholder="Ex : 120" required>
                    @error('surface')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="prix" class="form-label">Prix (FCFA) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('prix') is-invalid @enderror" id="prix" value="{{ old('prix', $article->prix) }}" name="prix" placeholder="Ex : 25000000" required>
                    @error('prix')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="piece" class="form-label">Nombre de pièces <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('piece') is-invalid @enderror" id="piece" value="{{ old('piece', $article->piece) }}" name="piece" placeholder="Ex : 4" required>
                    @error('piece')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="chambre" class="form-label">Nombre de chambres <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('chambre') is-invalid @enderror" id="chambre" value="{{ old('chambre', $article->chambre) }}" name="chambre" placeholder="Ex : 3" required>
                    @error('chambre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="etage" class="form-label">Nombre d'étages</label>
                    <input type="number" class="form-control @error('etage') is-invalid @enderror" id="etage" name="etage" value="{{ old('etage', $article->etage) }}" placeholder="Ex : 2">
                    @error('etage')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="ville" class="form-label">Ville <span class="text-danger">*</span></label>
                    <select name="ville" id="ville" class="form-select @error('ville') is-invalid @enderror" required>
                        <option value="" disabled {{ old('ville', $article->ville) ? '' : 'selected' }}>Choisir une ville</option>
                        @foreach ($villes as $ville)
                            <option value="{{ $ville }}" {{ old('ville', $article->ville) == $ville ? 'selected' : '' }}>
                                {{ $ville }}
                            </option>
                        @endforeach
                    </select>
                    @error('ville')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="commune" class="form-label">Commune <span class="text-danger">*</span></label>
                    <select name="commune" id="commune" class="form-select @error('commune') is-invalid @enderror" required>
                        <option value="" disabled {{ old('commune', $article->commune) ? '' : 'selected' }}>Choisir une commune</option>
                        @foreach ($communes as $commune)
                            <option value="{{ $commune }}" {{ old('commune', $article->commune) == $commune ? 'selected' : '' }}>
                                {{ $commune }}
                            </option>
                        @endforeach
                    </select>
                    @error('commune')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="quatier" class="form-label">Quartier</label>
                    <input type="text" class="form-control @error('quatier') is-invalid @enderror" name="quatier" id="quatier" value="{{ old('quatier', $article->quatier) }}" placeholder="Ex : Angré 8e tranche">
                    @error('quatier')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label class="form-label">Spécifications</label>
                    <div class="row">
                        @php
                            $selectedSpecs = old('specifications', $article->specifications->pluck('id')->toArray());
                        @endphp
                        @foreach ($specifications as $spec)
                            <div class="col-6 col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="specifications[]" value="{{ $spec->id }}" id="spec{{ $spec->id }}"
                                        {{ in_array($spec->id, $selectedSpecs) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="spec{{ $spec->id }}">
                                        {{ $spec->name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @error('specifications')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="image" class="form-label">Image principale</label>

                    @if ($article->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                                 style="width: 100px; height: 100px; object-fit: cover; border-radius: 6px;">
                        </div>
                    @endif

                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" accept="image/*">
                    <div class="form-text">Laisse vide pour garder l'image actuelle.</div>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" placeholder="Décrivez le bien : agencement, points forts, environnement...">{{ old('description', $article->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label class="form-label">Galerie d'images</label>

                    @if ($article->galeries->count())
                        <div class="row mb-3">
                            @foreach ($article->galeries as $img)
                                <div class="col-6 col-md-2 mb-2">
                                    <div class="position-relative">
                                        <img src="{{ asset('storage/' . $img->chemin) }}" alt=""
                                             style="width: 100%; height: 90px; object-fit: cover; border-radius: 6px;">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-text mb-2">Images actuelles de la galerie. Ajoute de nouvelles images ci-dessous si besoin.</div>
                    @endif

                    <div id="galerie-container">
                        <div class="input-group mb-2 galerie-item">
                            <input type="file" name="images[]" class="form-control" accept="image/*">
                            <button type="button" class="btn btn-outline-danger btn-remove-image" disabled>
                                &times;
                            </button>
                        </div>
                    </div>

                    <button type="button" id="add-image-btn" class="btn btn-outline-secondary btn-sm mt-2">
                        + Ajouter une image
                    </button>

                    @error('images.*')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                 <div class="col-md-12 mt-4 d-flex gap-2">
                    <a href="{{ route('articles.index') }}" class="btn fw-semibold flex-grow-1"
                    style="border: 2px solid #D4A017; color: #D4A017; background-color: transparent;">
                        Annuler
                    </a>

                    <button type="submit" class="btn fw-semibold flex-grow-1" style="background-color: #D4A017; border-color: #D4A017; color: white;">
                        Mettre à jour l'article
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('galerie-container');
    const addBtn = document.getElementById('add-image-btn');

    addBtn.addEventListener('click', function () {
        const item = document.createElement('div');
        item.classList.add('input-group', 'mb-2', 'galerie-item');
        item.innerHTML = `
            <input type="file" name="images[]" class="form-control" accept="image/*">
            <button type="button" class="btn btn-outline-danger btn-remove-image">
                &times;
            </button>
        `;
        container.appendChild(item);
        updateRemoveButtons();
    });

    container.addEventListener('click', function (e) {
        if (e.target.classList.contains('btn-remove-image')) {
            e.target.closest('.galerie-item').remove();
            updateRemoveButtons();
        }
    });

    function updateRemoveButtons() {
        const items = container.querySelectorAll('.galerie-item');
        items.forEach((item) => {
            item.querySelector('.btn-remove-image').disabled = items.length === 1;
        });
    }
});
</script>
@endpush
@endsection