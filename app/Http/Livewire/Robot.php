<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\helpme_module;
use App\Models\bot_menu_items as menus;

class Robot extends ModalComponent
{

    public $menuItems,$chosen,$menu_id;
    
    public function render()
    {
        $this->showMenu();
        return view('livewire.robot');
    }


    public function showMenu()
    {
        $menus = menus::where('is_main','1')->get();
        $this->menuItems = $menus;
        return $menus;
    }

    public function chosenMenu($menuID)
    {
        $menus = menus::where('id',$menuID)->first();
        $this->menu_id = $menuID;
        $this->chosen = $menus->menu_name;
    }

}
