<?php

namespace App\Livewire;

use App\Models\Report;
use Livewire\Component;
use App\Models\ReportChat;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Table extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $take = +5;
    public $aplikasi_sisi;
    public $nama_filtur;
    public $keterangan_masalah;
    public $status;
    public $diproses_oleh;
    public $ID;
    public $showModal = false;
    public $showModals = false;
    public $datas;
    public $total_report;
    public $session_nama;
    public $pesan;
    public $status_chat;
    public $chatss;
    public $type;
    public $message;
    public $jml_report;

    public function render()
    {
        $report = Report::latest();
        if(auth()->user()){
            if (auth()->user()->isAdmin == false) {
                $report = DB::table('reports')->where('session_nama', auth()->user()->name)
                ->select(['id', 'tgl_testing', 'session_nama', 'aplikasi_sisi', 'nama_filtur', 'keterangan_masalah', 'status', 'diproses_oleh'])
                ->latest();
                $this->jml_report = $report->count();
            }
            else
            {
                $report = DB::table('reports')->select('id', 'tgl_testing', 'session_nama', 'aplikasi_sisi', 'nama_filtur', 'keterangan_masalah', 'status', 'diproses_oleh')
                ->latest();
                $this->jml_report = $report->count();
            }
            $report_chat = ReportChat::oldest();
            if ($this->ID) {
                $this->chatss = $report_chat->where('report_id', $this->ID)->get();
            }
        }
        $reports = $report->paginate($this->take);
        return view('livewire.table', compact('reports'));
    }

    // alert pesan tamu
    public function alertError(){
        $this->dispatch('error', ['pesan'=>'Anda harus login terlebih dahulu']);
    }

    // status
    public function statusPending(){
        try {
            $d = Report::find($this->ID);
            $d->status = "panding";
            $d->save();
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

    // pesan
    public function chatReset()
    {
        $this->pesan = null;
    }
    public function onChat($id)
    {
        $d = ReportChat::find($id);
        $this->ID = $id;
        if (auth()->user()) {
            $this->session_nama = auth()->user()->name;
        }
        $this->pesan = $d->pesan ?? '';
    }
    public function chat(){
        try{
            $d = new ReportChat();
            if(auth()->user()){
                $d->report_id = $this->ID;
                $d->session_nama = auth()->user()->name;
            }
            $d->pesan = $this->pesan;
            $d->save();
            $this->chatReset();
        } catch(\Throwable $e){
            $this->dispatch('error', ['pesan'=>'tidak ada pesan yang dipilih/data ini telah di hapus']);
        }
    }

    // delete
    public function delete($id)
    {
        $report = Report::find($id);
        $report->delete();
        $this->dispatch('success', ['pesan'=>'Berhasil di hapus']);
    }

    // edit
    public function report(){
        try {
            $report = Report::find($this->ID);
            $report->aplikasi_sisi = $this->aplikasi_sisi;
            $report->nama_filtur = $this->nama_filtur;
            $report->keterangan_masalah = $this->keterangan_masalah;
            $report->status = $this->status;
            $report->diproses_oleh = $this->diproses_oleh;
            $report->save();
            $this->showModal = !$this->showModal;
            $this->dispatch('success', ['pesan'=>'Berhasil di Update']);
        } catch(\Throwable $e){
            $this->dispatch('error', ['pesan'=>$e]);
        }
    }

    // modal edit
    public function onEdit($id)
    {
        $this->showModal = !$this->showModal;
        $report = Report::find($id);
        $this->ID = $report->id;
        $this->aplikasi_sisi = $report->aplikasi_sisi;
        $this->nama_filtur = $report->nama_filtur;
        $this->keterangan_masalah = $report->keterangan_masalah;
        $this->status = $report->status;
        $this->diproses_oleh = $report->diproses_oleh;
    }

    public function toggleModal()
    {
        $this->showModal = !$this->showModal;
    }
    public function toggleModals()
    {
        $this->showModals = !$this->showModals;
    }
}
