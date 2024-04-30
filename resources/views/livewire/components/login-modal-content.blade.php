<div>
    <div class="modal" tabindex="-1" role="dialog" style="display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-white border-0 shadow">
                <div class="modal-header">
                    <h5 class="modal-title">Masuk</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" wire:click="toggleModal">

                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 form-check">
                        <img src="" alt="" srcset="">
                        <p style="color:#1985A1">Note: Masuk dengan akun Payoprint</p>
                        <h1></h1>
                      </div>
                    <form wire:submit.prevent="login">
                        <div class="mb-3">

                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input wire:model="email" type="email" class="form-control" id="exampleInputEmail1" onpaste="event.preventDefault();">

                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input wire:model="password" type="password" class="form-control" id="exampleInputPassword1" onpaste="event.preventDefault();">
                          </div>

                          <button type="submit" class="btn rounded-pill" style="background-color: #1985A1; color:white" wire:click="login">Masuk</button>
                          <h1 class=" text-white"></h1>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
