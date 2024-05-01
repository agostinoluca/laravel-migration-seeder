<header class="bg-secondary mb-3">
    <nav class="navbar navbar-expand navbar-light justify-content-center">
        <div class="nav navbar-nav gap-4">
            <a class="nav-item nav-link text-light {{ Route::currentRouteName() === 'home' ? ' border-bottom border-top border-info fw-bold' : '' }}"
                href="{{ route('home') }}" aria-current="page">Tutte le date</a>
            <a class="nav-item nav-link text-light {{ Route::currentRouteName() === 'today' ? ' border-bottom border-top border-info fw-bold' : '' }}"
                href="{{ route('today') }}">Solo partenze di oggi</a>
        </div>
    </nav>
</header>
