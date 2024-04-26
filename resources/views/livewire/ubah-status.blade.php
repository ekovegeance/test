<div>
    {{-- @dd($ID) --}}
    <div class="dropdown">
        <button class="btn rounded-pill dropdown-toggle" style="background-color: #1985A1; color:white; display:block"
            type="button" data-bs-toggle="dropdown" aria-expanded="false">Ubah Status</button>
        <ul class="dropdown-menu border-0 bg-white shadow-sm">
            <li><a class="dropdown-item text-danger" wire:click="statusPending()">Pending</a></li>
            <li><a class="dropdown-item text-warning" wire:click="statusProses()">Proses</a></li>
            <li><a class="dropdown-item text-success" wire:click="statusSelesai()">Selesai</a></li>
        </ul>
    </div>
</div>
