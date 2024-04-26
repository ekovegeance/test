<?php

namespace App\Livewire;

use App\Models\ReportChat;
use Livewire\Component;

class Chat extends Component
{
    public $session_nama;
    public $pesan;
    public $ID;
    public $chatss;

    public function render()
    {
        $chats = ReportChat::oldest();
        $this->chatss = $chats->where('report_id', 16)->get();
    }
    public function onChat($id){
        $d = ReportChat::find($id);
        $this->ID = $id;
        if(auth()->user()){
            $this->session_nama = auth()->user()->name;
        }
        $this->pesan = $d->pesan;
    }
    public function chat(){
        ReportChat::create([
            'report_id'=>$this->ID,
            'session_nama'=>auth()->user()->name,
            'pesan'=>$this->pesan,
        ]);
    }
}
