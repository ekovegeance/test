<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Report;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Bar extends Component
{
    public $total_report;
    public $status_pending;
    public $status_proses;
    public $status_selesai;
    public $total_pelapor;

    public function render()
    {
        // $data = Report::latest();
        // @dd($data->where('session_nama', auth()->user()->name)->count());
        $data = Report::get();
        if(auth()->user()){

            if(auth()->user()->isAdmin == false){
                $data = $data->where('session_nama', auth()->user()->name);
                $this->status_pending = $data->where('status', 'panding')->count();
                $this->status_proses = $data->where('status', 'proses')->count();
                $this->status_selesai = $data->where('status', 'selesai')->count();
            } else {
                $this->status_pending = $data->where('status', 'panding')->count();
                $this->status_proses = $data->where('status', 'proses')->count();
                $this->status_selesai = $data->where('status', 'selesai')->count();
            }
        }
         else {
            $this->status_pending = $data->where('status', 'panding')->count();
            $this->status_proses = $data->where('status', 'proses')->count();
            $this->status_selesai = $data->where('status', 'selesai')->count();
        }

        // $this->total_pelapor = User::count();
        
        if(auth()->user()){
            $this->total_report = $data->count();
            $this->total_pelapor = $data->groupby('session_nama')->count();
        } else {
            $this->total_report = 0;
            $this->total_pelapor = 0;
            $this->status_pending = 0;
            $this->status_proses = 0;
            $this->status_selesai = 0;            
        }
        

        return view('livewire.bar');
    }
}
