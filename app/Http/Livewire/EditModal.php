<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.edit-modal');
    }
}
