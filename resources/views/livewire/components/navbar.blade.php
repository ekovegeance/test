<nav class="navbar navbar-expand-lg fixed-top bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/logo.png') }}" alt="" style="height: 48px; width:48px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mb-lg-0 mb-2 me-auto">
                <li class="nav-item">
                    <a class="nav-link active fs-5 fw-bold" aria-current="page" style="color: #1985A1"
                        href="#">Payoprint Support Apps</a>
                </li>
            </ul>
            {{-- Button login --}}
            <div class="d-flex">
                @if (auth()->user())
                    {{-- <div class="btn btn-sm btn-danger" wire:click="logout">Logout</div> --}}
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold" href="#" role=""
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow">

                                <li><a class="dropdown-item text-danger" href="#" wire:click="logout">Keluar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @else
                    @livewire('components.login-modal')
                @endif

                {{-- if auth --}}
            </div>
        </div>
    </div>
</nav>
