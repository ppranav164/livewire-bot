<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\helpme_module;
use App\Models\bot_menu_items as menus;

class FirstTab extends ModalComponent
{


    public $menu_id,$name,$options,$chosen,$option_id,$selected;

    public function mount($id)
    {
        $this->menu_id = $id;
    }

    public function render()
    {
        $this->showMessage();
        return view('livewire.first-tab');
    }

    public function showMessage()
    {
        $this->name = helpme_module::where('menu_id',$this->menu_id)->first();
        $this->options = helpme_module::join('bot_menu_items','helpme_module.menu_id','=','bot_menu_items.id')
        ->where('is_main',0)->get();
    }
    
    public function chosenMenu($menuID)
    {
        $this->selected = 1;
        $menus = menus::where('id',$menuID)->first();
        $this->option_id = $menuID;
        $this->chosen = $menus->menu_name;
    }
    
}
