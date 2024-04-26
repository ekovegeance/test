<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ReportModalContent extends Component
{
    public $showModal = false;

    public function toggleModal()
    {
        $this->showModal = !$this->showModal;
    }

    public function render()
    {
        return view('livewire.components.report-modal-content');
    }
}
