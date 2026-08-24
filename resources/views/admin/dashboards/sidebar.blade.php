<div class="p-3 navbar-dark bg-dark sidebar d-flex flex-column" style="width: 280px; min-width: 280px; min-height: 100vh;">

    {{-- Barre de recherche --}}
    <div class="input-group mb-3">
        <span class="input-group-text border-0" style="background-color: #e0e0e0;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#888" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg>
        </span>
        <input type="text" class="form-control border-0" placeholder="Rechercher...."
               style="background-color: #ffffff; color: #000000;">
    </div>

    <ul class="nav flex-column">

        {{-- Tableau de bord --}}
        <li class="nav-item mb-2">
            <a href=""
               class="nav-link d-flex align-items-center rounded px-2 py-2"
               style="{{ request()->routeIs('dashboard') ? 'background-color: #D4A017; color: #1a1a1a; font-weight: 600;' : 'color: #fff;' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="me-2" viewBox="0 0 16 16">
                    <path d="M6 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 9a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM1 2a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zM9 9a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1z"/>
                </svg>
                Tableau de bord
            </a>
        </li>

        {{-- Catégorie : GESTION --}}
        <li class="mt-3 mb-1 px-2">
            <small class="fw-semibold" style="color: #777; letter-spacing: .05em; font-size: .7rem;">GESTION</small>
        </li>

        <li class="nav-item mb-1">
            <a href="#produitSubmenu" data-bs-toggle="collapse"
               class="nav-link d-flex justify-content-between align-items-center rounded px-2 py-2"
               style="color: {{ request()->routeIs('articles.*') ? '#D4A017' : '#fff' }};">
                <span class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="me-2" viewBox="0 0 16 16">
                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z"/>
                    </svg>
                    Gestion de produit
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                </svg>
            </a>

            <div class="collapse {{ request()->routeIs('articles.*') ? 'show' : '' }}" id="produitSubmenu">
                <ul class="nav flex-column ms-4 mt-1">
                    <li class="nav-item">
                        <a href="{{ route('articles.create') }}"
                           class="nav-link py-1 px-2"
                           style="color: {{ request()->routeIs('articles.create') ? '#D4A017' : '#999' }};">
                            Ajouter un produit
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('articles.index') }}"
                           class="nav-link py-1 px-2"
                           style="color: {{ request()->routeIs('articles.index') ? '#D4A017' : '#999' }};">
                            Voir les produits
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item mb-1">
            <a href="#specSubmenu" data-bs-toggle="collapse"
               class="nav-link d-flex justify-content-between align-items-center rounded px-2 py-2"
               style="color: {{ request()->routeIs('specifications.*') ? '#D4A017' : '#fff' }};">
                <span class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="me-2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5"/>
                        <path d="M3 3H2v1h1zm-1 4h1v1H2zm1 4H2v1h1z"/>
                    </svg>
                    Spécifications
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                </svg>
            </a>

            <div class="collapse {{ request()->routeIs('specifications.*') ? 'show' : '' }}" id="specSubmenu">
                <ul class="nav flex-column ms-4 mt-1">
                    <li class="nav-item">
                        <a href="{{ route('specifications.index') }}"
                           class="nav-link py-1 px-2"
                           style="color: {{ request()->routeIs('specifications.index') ? '#D4A017' : '#999' }};">
                            Ajouter une spécification
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('specifications.create') }}"
                           class="nav-link py-1 px-2"
                           style="color: {{ request()->routeIs('specifications.create') ? '#D4A017' : '#999' }};">
                            Voir les spécifications
                        </a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
      @auth
                  <form action="{{route('logout')}}" method="post" class="d-flex mt-auto">
                    @csrf
                    <button type="submit" class="btn  btn-outline-warning btn-sm fw-semibold" >
                        Déconnexion
                    </button>
                </form>
            @endauth
</div>