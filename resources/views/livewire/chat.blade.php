<div>
    <div class="row">
        <div class="card shadow-2 border-0 bg-white">
            <div class="card-header border-0 bg-white text-white">
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <h1 class="fs-4 fw-bold" style="color:#1985A1;">Chat</h1>
                    @guest
                    @else
                        {{-- @dd($ID) --}}
                        @if (auth()->user()->isAdmin == true)
                            @if ($ID)
                                @include('livewire.ubah-status')
                            @else
                                <div class="dropdown">
                                    <button class="btn rounded-pill dropdown-toggle"
                                        style="background-color: #1985A1; color:white;" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">Ubah Status</button>
                                    <ul class="dropdown-menu border-0 bg-white shadow-sm dropdown-menu-end">
                                        <li><a href="#" aria-label="Pending" class="dropdown-item text-danger">Pending</a></li>
                                        <li><a href="#" aria-label="Proses" class="dropdown-item text-warning">Proses</a></li>
                                        <li><a href="#" aria-label="Selesai" class="dropdown-item text-success">Selesai</a></li>
                                    </ul>
                                </div>
                            @endif
                        @endif
                    @endguest
                </div>
            </div>
            <div class="card-body">
                <div class="scroll rounded-2">
                    <!-- Chat messages will be displayed here -->
                    @guest
                    @else
                        @if ($this->ID)
                            @foreach ($chatss as $c)
                                @if ($c->session_nama == auth()->user()->name)
                                    <div class="text-end">
                                        <div class="btn btn-sm btn-light mt-1">
                                            {{ $c->pesan }}
                                        </div>
                                    </div>
                                @else
                                    <div class="mt-1 text-start">
                                        <div class="btn btn-sm" style="background-color: #1985A1; color:white">
                                            <p class="fw-bold text-start">{{ $c->session_nama }}</p>
                                            <span>{{ $c->pesan }}</span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div class="text-start">
                                <div class="btn btn-sm">Silahkan klik tombol pesan sesuai dengan keluhan, Keluhan saudara
                                    adalah prioritas kami...</div>
                            </div>
                        @endif
                    @endguest
                    <!-- Add more messages as needed -->
                </div>
            </div>
            <div class="card-footer bg-white">
                <div class="input-group">
                    <input wire:model="pesan" type="text" class="form-control rounded-start-pill" placeholder="Ketik pesan anda">
                    <button @guest wire:click="alertError" @else @if($ID) wire:click="chat" @endif @endguest class="btn rounded-end-pill" style="background-color: #1985A1; color:white">Kirim</button>
                </div>
            </div>
        </div>
    </div>
</div>
