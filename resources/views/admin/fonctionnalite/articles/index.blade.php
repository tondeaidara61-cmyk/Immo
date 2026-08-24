@extends('admin.dashboards.dashboard')

@section('title', 'Liste des articles')

@section('content')
<div class="container w-100  py-4">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h4 fw-bold mb-0">Articles</h1>
                <a href="{{ route('articles.create') }}" class="btn fw-semibold" style="background-color: #D4A017; border-color: #D4A017; color: white;">
                    + Ajouter un article
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Image</th>
                            <th>Titre</th>
                            <th>Ville</th>
                            <th>Commune</th>
                            <th>Surface</th>
                            <th>Prix</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $article)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                                         style="width: 60px; height: 60px; object-fit: cover; border-radius: 6px;">
                                </td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->ville }}</td>
                                <td>{{ $article->commune }}</td>
                                <td>{{ $article->surface }} m²</td>
                                <td>{{ number_format($article->prix, 0, ',', ' ') }} FCFA</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-outline-primary">
                                            Modifier
                                        </a>

                                        <form action="{{ route('articles.destroy', $article->id) }}" method="post"
                                              onsubmit="return confirm('Supprimer cet article ? Cette action est irréversible.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    Aucun article pour le moment.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($articles->hasPages())
                <div class="mt-3">
                    {{ $articles->links() }}
                </div>
            @endif

        </div>
    </div>
</div>
@endsection