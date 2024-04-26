<div>
    <div class="modal" tabindex="-1" role="dialog" style="display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-0 bg-white shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title">Report</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"
                        wire:click="toggleModal">
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="report">
                        @if (auth()->user()->isAdmin == true)
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Pilih sisi aplikasi</label>
                                <select wire:model="aplikasi_sisi" class="form-select"
                                    aria-label="Default select example">
                                    <option selected>Pilih</option>
                                    <option value="customer">Customer</option>
                                    <option value="office">Office</option>
                                </select>
                                @error('aplikasi_sisi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Fitur</label>
                            <input wire:model="nama_filtur" type="text" class="form-control"
                                id="exampleFormControlInput1">
                            @error('nama_filtur')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Keterangan masalah</label>
                            <textarea wire:model="keterangan_masalah" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                            @error('keterangan_masalah')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        @if (auth()->user()->isAdmin == true)
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Status</label>
                                <select wire:model="status" class="form-select" aria-label="Default select example">
                                    <option selected>Pilih</option>
                                    <option value="panding" class="text-danger">Panding</option>
                                    <option value="proses" class="text-warning">Proses</option>
                                    <option value="selesai" style="text-success">Selesai</option>
                                </select>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Di Proses Oleh</label>
                                <input wire:model="diproses_oleh" type="text" class="form-control"
                                    id="exampleFormControlInput1">
                                @error('diproses_oleh')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        @endif
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-secondary rounded-pill text-white" data-dismiss="modal"
                        wire:click="toggleModal">Close</button>
                    <button type="button" class="btn rounded-pill" style="background-color: #125D71; color: white"
                        wire:click="report">Report</button>
                    <script>
                        Livewire.on('showAlert', data => {
                            window.livewire.emit('toggleModal', data);
                        });
                    </script>
                </div>
                {{-- @if ($showModals)
                    @include('livewire.components.alert-modal')
                @endif --}}
            </div>
        </div>
    </div>
</div>
