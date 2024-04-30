<div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                            <img src="{{ asset('img/success.svg') }}" alt="">
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
                            <img src="{{ asset('img/error.svg') }}" alt="">
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
    <script>
        $(document).ready(function() {
            // Memuat data success secara asinkron
            $.ajax({
                url: '/get-success-data',
                type: 'GET',
                success: function(data) {
                    // Mengisi modal success dengan data yang diterima dari server
                    $('#message-success').text(data.message);
                    $('#success-image').attr('src', data.image);
                    $('#alert-success').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error('Gagal memuat data success:', error);
                }
            });

            // Memuat data error secara asinkron
            $.ajax({
                url: '/get-error-data',
                type: 'GET',
                success: function(data) {
                    // Mengisi modal error dengan data yang diterima dari server
                    $('#message-error').text(data.message);
                    $('#error-image').attr('src', data.image);
                    $('#alert-error').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error('Gagal memuat data error:', error);
                }
            });
        });
    </script>
</div>
