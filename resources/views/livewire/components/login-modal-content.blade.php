<div>
    <div class="modal" tabindex="-1" role="dialog" style="display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-white border-0 shadow">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Masuk</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" wire:click="toggleModal">

                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 form-check">
                        <p style="color:#1985A1">Note: Masuk dengan akun Payoprint</p>
                      </div>
                    <form wire:submit.prevent="login">
                        <div class="mb-3">

                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input wire:model="email" type="email" class="form-control" id="exampleInputEmail1">

                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input wire:model="password" type="password" class="form-control" id="exampleInputPassword1">
                          </div>

                          <button type="submit" class="btn rounded-pill" style="background-color: #1985A1; color:white" wire:click="login">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
