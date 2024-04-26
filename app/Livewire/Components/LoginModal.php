<?php

namespace App\Livewire\Components;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class LoginModal extends Component
{
    public $email;
    public $password;
    public $showModal = false;

    public function toggleModal()
    {
        $this->showModal = !$this->showModal;
    }

    public function login()
    {
        $users = User::where('email', $this->email)->first();
        if($users){
            if(Hash::check($this->password, $users->password)){
                auth()->login($users);
                redirect('/');
            } else {
                $this->dispatch('error', ['pesan'=>'Email atau password salah!']);
            }
        } else {
            $this->dispatch('error', ['pesan'=>'Email tidak ditemukan!']);
        }
    }



    public function render()
    {
        return view('livewire.components.login-modal');
    }
}
