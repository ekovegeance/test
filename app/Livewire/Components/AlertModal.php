<?php

namespace App\Livewire\Components;

use Livewire\Component;

class AlertModal extends Component
{

    public $showModals = false;
    public $type; // success or error
    public $message;

    public function toggleModals()
    {
        $this->showModals = !$this->showModals;
    }

    public function render()
    {
        return view('livewire.components.alert-modal');
    }
}
