<div>
    @guest
        <button id="dhov" wire:click="toggleModal" class="btn rounded-pill" style="background-color: #1985A1; color:white;"
            type="button">Buat report baru</button>
        @if ($showModal)
            @include('livewire.components.login-modal-content')
        @endif
    @else
        <button wire:click="toggleModal" class="btn rounded-pill" style="background-color: #1985A1; color:white;"
            type="button">Buat report baru</button>
        @if ($showModal)
            @include('livewire.components.report-modal-content')
        @endif
        @if ($showModals)
            @include('livewire.components.alert-modal')
        @endif
    @endguest
    @livewire('components.alert-modal')
</div>
