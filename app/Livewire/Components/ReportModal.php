<?php

namespace App\Livewire\Components;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Report;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
class ReportModal extends Component
{
    public $showModal = false;
    public $session_nama;
    public $aplikasi_sisi;
    public $nama_filtur;
    public $keterangan_masalah;
    public $status;
    public $diproses_oleh;
    public $email;
    public $type;
    public $message;
    public $password;
    public $showModals = false;


    public function toggleModal()
    {
        $this->showModal = !$this->showModal;
    }

    // alert
    public function toggleModals()
    {
        $this->showModals = !$this->showModals;
    }

    public function validation(){
        $this->validate([
            'nama_filtur'=>'required',
            'keterangan_masalah'=>'required',
            'status'=>'nullable',
            'diproses_oleh'=>'nullable',
        ],[
            'nama_filtur.required'=>'Nama Filtur tidak boleh kosong!',
            'keterangan_masalah.required'=>'Keterangan Masalah tidak boleh kosong!',
        ]);        
    }
    public function login()
    {
        $users = User::where('email', $this->email)->first();
        if($users){
            if(Hash::check($this->password, $users->password)){
                auth()->login($users);
                redirect('/');
            } else {
                @dd('email atau password salah!');
                $this->dispatch('error', ['pesan'=>'Email atau password salah!']);
            }
        } else {
            $this->dispatch('error', ['pesan'=>'Email tidak ditemukan']);
        }
    }
    public function updated(){
        $this->validation();
    }

    public function report(){
        $this->validation();
        $data_report = new Report();
        $data_report->tgl_testing = Carbon::now();
        $data_report->session_nama = auth()->user()->name;
        $data_report->aplikasi_sisi = $this->aplikasi_sisi ?? 'customer';
        $data_report->nama_filtur = $this->nama_filtur;
        $data_report->keterangan_masalah = $this->keterangan_masalah;
        $data_report->status = $this->status ?? 'panding';
        $data_report->diproses_oleh = $this->diproses_oleh ?? "";
        $data_report->save();
        $this->showModal = !$this->showModal;
        $this->dispatch('success', ['pesan'=>'Report berhasil disimpan!']);
    }

    public function render()
    {
        return view('livewire.components.report-modal');
    }
}
