<div>
    <div class="row">
        <div class="col col-12 col-lg-8 rounded-2 bg-white" wire:poll.5s>
            <div class="container mt-3">
                <div class="d-flex justify-content-between align-items-stretch mt-3">
                    <h1 class="fs-4 fw-bold mt-3" style="color:#1985A1;">Report</h1>


                    @livewire('components.report-modal')
                </div>
                <hr>
                {{-- @dd($jml_report) --}}
                <div class="row mb-2">
                    <div class="col col-sm-2">
                        <select name="take" wire:model="take" class="form-select form-select-sm" aria-label="show-row">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="{{ $jml_report }}">All</option>
                        </select>
                    </div>
                </div>
                <div class="table-responsive rounded-3">
                    <table class="table-hover table-light table">
                        <thead style="vertical-align: middle;" class="table-light text-center">
                            <tr>
                                @guest
                                    <th>Tanggal</th>
                                    <th>Pelapor</th>
                                    <th>Sisi Aplikasi</th>
                                    <th>Fitur</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Diproses Oleh</th>
                                @else
                                    <th>Tanggal</th>
                                    <th>Pelapor</th>
                                    <th>Sisi Aplikasi</th>
                                    <th>Fitur</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Diproses Oleh</th>
                                    <th>Aksi</th> <!-- Tambahkan kolom Action -->
                                    <th>Chat</th>
                                @endguest
                            </tr>
                        </thead>
                        <tbody style="vertical-align: middle">
                            @forelse($reports as $report)
                            {{-- @dd($report->tgl_testing) --}}
                            <tr>
                                    @if (auth()->user())
                                        <td>{{ $report->tgl_testing }}</td>
                                        <td>{{ $report->session_nama }}</td>
                                        <td>{{ $report->aplikasi_sisi }}</td>
                                        <td>{{ $report->nama_filtur }}</td>
                                        <td>{{ $report->keterangan_masalah }}</td>
                                        <td>

                                            <div
                                                class="badge badge-danger  rounded-pill @if ($report->status == 'panding') bg-danger-subtle text-danger @elseif($report->status == 'proses') bg-warning-subtle text-warning @elseif($report->status == 'selesai') bg-success-subtle text-success @endif">
                                                @if ($report->status == 'panding')
                                                    Pending
                                                @elseif($report->status == 'proses')
                                                    Proses
                                                @elseif($report->status == 'selesai')
                                                    Selesai
                                                @endif
                                            </div>

                                        </td>
                                        <td>{{ $report->diproses_oleh }}</td>
                                        <td>
                                            <!-- Tambahkan tombol atau tautan aksi di sini -->

                                            @if (auth()->user()->isAdmin == false && $report->status == 'panding')
                                                </button>
                                                <button class="btn btn-sm rounded-pill"
                                                    wire:click="onEdit('{{ $report->id }}')"><img
                                                        src="{{ asset('img/edit.svg') }}" alt="edit"></button>
                                                <button class="btn btn-sm rounded-pill"
                                                    wire:click="delete('{{ $report->id }}')"><img
                                                        src="{{ asset('img/delete.svg') }}" alt="delete"></button>
                                            @elseif(auth()->user()->isAdmin == true)
                                                <button class="btn btn-sm rounded-pill"
                                                    wire:click="onEdit('{{ $report->id }}')"><img
                                                        src="{{ asset('img/edit.svg') }}" alt="edit"></button>
                                                <button class="btn btn-sm rounded-pill"
                                                    wire:click="delete('{{ $report->id }}')"><img
                                                        src="{{ asset('img/delete.svg') }}" alt="delete"></button>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn btn-sm rounded-pill bg-primary text-white"
                                                
                                                wire:click="onChat('{{ $report->id }}')">Pesan</div>
                                        </td>
                                    @else
                                        {{-- <td colspan="8"></td> --}}
                                    @endif
                                </tr>
                            @empty
                            @endforelse
                            {{-- modal edit --}}
                            @if ($showModal)
                                @include('livewire.components.report-modal-content')
                            @endif
                            {{-- end modal --}}

                            {{-- alert --}}
                            @if ($showModals)
                                @include('livewire.components.alert-modal');
                            @endif
                            {{-- alert --}}
                            <!-- Tambahkan baris lain sesuai dengan data yang Anda miliki -->
                        </tbody>

                    </table>
                    @guest
                    @else
                        <div colspan="8">{{ $reports->render() }}</div>
                    @endguest
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 rounded-start-0 rounded-end-2 mt-lg-0 border-start border-md-start-0 mt-4 bg-white">
            {{-- @livewire('chat') --}}
            @include('livewire.chat')
        </div>
    </div>
</div>
