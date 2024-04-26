<div>
    <button class="btn rounded-pill" style="background-color: #BADAE3; color:#125D71" wire:click="toggleModal">Masuk</button>

    @if($showModal)
        @include('livewire.components.login-modal-content')
    @endif
</div>
