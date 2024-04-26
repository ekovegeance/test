<div>
    <!-- modal success -->
    <div class="modal fade" id="alert-success" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-white">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5" id=""></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border-bottom-0">
                    <div class="row">
                        <div class="text-center fs-3" style="color: #1985A1">Berhasil</div>
                        <div class="text-center" style="text-size: 150px">
                            <img src="{{ asset('img/success.svg') }}" alt="success">
                        </div>
                        <div class="text-center mt-3" id="message-success"></div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn rounded-pill" style="background-color: #1985A1; color: white;" data-bs-dismiss="modal">Oke</button>                    
                </div>
            </div>
        </div>
    </div>

    <!-- modal error -->
    <div class="modal fade" id="alert-error" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id=""></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="text-center fs-3 text-danger">Gagal</div>
                        <div class="text-center" style="text-size: 150px">
                            <img src="{{ asset('img/error.svg') }}" alt="error">
                        </div>
                        <div class="text-center mt-3" id="message-error"></div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn rounded-pill" style="background-color: #1985A1; color: white;" data-bs-dismiss="modal">Oke</button>                   
                </div>
            </div>
        </div>
    </div>
</div>
