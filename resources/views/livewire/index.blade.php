<div>
    @livewire('components.navbar')

    <h6 class="fw-bold my-3" style="color:#1985A1;">Payoprint Support Apps</h6>
    <h3 class=" text-white">Lorem Ipsum</h3>

    {{-- Bar --}}
    @livewire('Bar')
    {{-- content (Report & Chat)  --}}
    <div class="container mx-auto mt-5">
        {{-- <div class="row">
                <div class="col-12 col-lg-8 rounded-2 bg-white"> --}}
        @livewire('table')
        {{-- </div> --}}
        {{-- <div class="col-12 col-lg-4 rounded-start-0 mt-lg-0 border-start border-md-start-0 mt-4 bg-white">
                    @livewire('chat')
                </div> --}}
    </div>
    @livewire('components.footer')

</div>
