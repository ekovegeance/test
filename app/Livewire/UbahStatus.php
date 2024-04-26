<?php

namespace App\Livewire;

use App\Models\Report;
use Livewire\Component;

class UbahStatus extends Component
{
    public $ID;

    public function render()
    {
        return view('livewire.ubah-status');
    }
    public function mount($ID){
        $this->ID = $ID;
    }
    public function statusPending(){
            try {
                $d = Report::find($this->ID);
                $d->status = "panding";
                $d->save();
                @dd($this->ID);
            } catch (\Throwable $th) {
                $this->dispatch('error', ['pesan'=>'pesan belum di pilih/report data telah di hapus']);
            }
    }

    public function statusProses(){
            try {
                $d = Report::find($this->ID);
                $d->status = "proses";
                $d->save();
            } catch (\Throwable $th) {
                $this->dispatch('error', ['pesan'=>'pesan belum di pilih/report data telah di hapus']);
            }
    }

    public function statusSelesai(){
            try {
                $d = Report::find($this->ID);
                $d->status = "selesai";
                $d->save();
            } catch (\Throwable $th) {
                $this->dispatch('error', ['pesan'=>'pesan belum di pilih/report data telah di hapus']);
            }
    }
}
