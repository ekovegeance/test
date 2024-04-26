<div>
    <div class="rounded-2 container mx-auto mt-3 mt-5 shadow" style="background-color: #1985A1; color: white; min-height: 168px;"
        wire:poll>
        <div class="row justify-content-center">
            <div class="col-md-4 mt-lg-5 border-end border-md-end-0 mt-4 text-center text-white"
                style="min-height: inherit;">
                <h1 class="fs-5 text-white">Total Report</h1>
                <p class="fs-3 text-white fw-bold">{{ $total_report ?? 0 }}</p>
            </div>
            <div class="col-md-4 mt-lg-5 mt-4 text-center text-white" style="min-height: inherit;">
                <h1 class=" fs-5 text-white">Pelapor</h1>
                <p class="fs-3 fw-bold">{{ $total_pelapor ?? 0 }}</p>
            </div>
            <div class="col-md-4 mt-lg-5 border-start border-md-start-0 mt-4 text-center text-white"
                style="min-height: inherit;">
                <h1 class="fs-5 text-white">Status</h1>
                <div class="row">
                    <div class="col-12 col-lg-4 mt-lg-0 mt-3">
                        <p class="fw-bold">Pending: {{ $status_pending ?? 0 }}</p>
                    </div>
                    <div class="col-12 col-lg-4 mt-lg-0 mt-3">
                        <p class="fw-bold">Proses: {{ $status_proses ?? 0 }}</p>
                    </div>
                    <div class="col-12 col-lg-4 mt-lg-0 mt-3">
                        <p class="fw-bold">Selesai: {{ $status_selesai ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
