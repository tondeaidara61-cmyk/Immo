@extends('admin.dashboards.dashboard')

@section('title', 'Liste des spécifications')

@section('content')
<div class="container-fluid py-4">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h4 fw-bold mb-0">Spécifications</h1>
                <a href="{{ route('specifications.create') }}" class="btn fw-semibold" style="background-color: #D4A017; border-color: #D4A017; color: white;">
                    + Ajouter une spécification
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($specifications as $specification)
                            <tr>
                              <td>{{ $specifications->firstItem() + $loop->index }}</td>
                                <td>{{ $specification->name }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('specifications.edit', $specification->id) }}" class="btn btn-sm btn-outline-primary">
                                            Modifier
                                        </a>

                                        <form action="{{ route('specifications.destroy', $specification->id) }}" method="post"
                                              onsubmit="return confirm('Supprimer cette spécification ? Elle sera retirée de tous les articles qui l\'utilisent.');">
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
                                <td colspan="3" class="text-center text-muted py-4">
                                    Aucune spécification pour le moment.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($specifications->hasPages())
                <div class="mt-3">
                    {{ $specifications->links() }}
                </div>
            @endif

        </div>
    </div>
</div>
@endsection