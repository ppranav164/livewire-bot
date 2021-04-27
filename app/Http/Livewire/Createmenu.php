<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\bot_menu_items as botMenu;

class Createmenu extends ModalComponent
{

    public $menu_name;
    public $isMain = 0;
    public $status = 1;

    protected $rules = [
        'menu_name' => 'required|min:2',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function render()
    {
        return view('livewire.createmenu');
    }

    public function savemenu()
    {
        $this->validate();

        $botMenu = new botMenu();
        $botMenu->menu_name = $this->menu_name;
        $botMenu->is_main = $this->isMain;
        $botMenu->status = $this->status;
        $botMenu->save();
        $this->closeModal();
    }


}
