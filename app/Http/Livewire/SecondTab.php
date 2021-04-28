<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\helpme_module;
use App\Models\products;
use App\Models\bot_menu_items as menus;

class SecondTab extends ModalComponent
{
    
    public $menu_id,$name,$options,$chosen,$option_id,$selected;

    public function render()
    {
        $this->showMessage();
        return view('livewire.second-tab');
    }

    public function mount($id)
    {
        $this->menu_id = $id;
    }

    public function showMessage()
    {
        $this->name = helpme_module::where('menu_id',$this->menu_id)->first();
        $this->product = helpme_module::where('menu_id',$this->menu_id)->first();
        $product_id = $this->product->product_id;
        $products = products::whereIn('id',json_decode($product_id))->get();
        $this->options = $products;
    }
    
    public function chosenMenu($menuID)
    {
        $this->selected = 1;
        $menus = menus::where('id',$menuID)->first();
        $this->option_id = $menuID;
        $this->chosen = $menus->menu_name;
    }

}
