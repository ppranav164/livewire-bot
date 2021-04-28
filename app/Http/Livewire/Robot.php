<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\helpme_module;
use App\Models\bot_menu_items as menus;

class Robot extends ModalComponent
{

    public $menuItems,$chosen,$menu_id,$selected;

    public $message,$disable;
    
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
        $this->isOptionAvailableById($menuID);
        $this->selected = 1;
        $menus = menus::where('id',$menuID)->first();
        $this->menu_id = $menuID;
        $this->chosen = $menus->menu_name;
    }

    public function isOptionAvailableById($id)
    {
        $menus = helpme_module::where('belongs_to',$id)->get();

        if(count($menus) == 0)
        {
            $this->message = trans('bots.empty_option');
            $this->selected = 0;
            $this->emit('forceDisable');

        }else {

            $this->message = "";
        }

        return count($menus);
    }

    public function forceDisable()
    {
        $this->disable = 0;
    }

}
