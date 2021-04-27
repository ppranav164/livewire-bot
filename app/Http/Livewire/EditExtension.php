<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\helpme_module;
use App\Models\bot_menu_items;


class EditExtension extends ModalComponent
{

    public $menuItems;
    public $parent_menu;
    public $menu_name;
    public $products = "";
    public $screen = 0;
    public $status = 1;
    public $title;

    public $extID;

    public $editData;

    protected $rules = [
        'title' => 'required|min:6',
    ];


    public function mount($id)
    {
        $this->extID = $id;
    }


    public function render()
    {
        $this->menuItems = $this->getMenus();
        $this->editInfo();
        return view('livewire.edit-extension');
    }

    
    public function getMenus()
    {
        return bot_menu_items::all();
    }

    public function updateModule()
    {
        $this->validate();

        $helpmeEtension = helpme_module::find($this->extID);
        $helpmeEtension->menu_id =  empty($this->menu_name) ? 1 : $this->menu_name;
        $helpmeEtension->belongs_to = empty($this->parent_menu) ? 0 : $this->parent_menu;
        $helpmeEtension->product_id =  json_encode($this->products);
        $helpmeEtension->screen =  $this->screen;
        $helpmeEtension->title =  $this->title;
        $helpmeEtension->status =  $this->status;
        $helpmeEtension->update();

        $this->emitTo('task', 'taskcomponent');
        $this->closeModal();
    }


    public function editInfo()
    {
        $helpmeEtension =  helpme_module::find($this->extID)->first();
        $this->editData = $helpmeEtension;
        return $helpmeEtension;
    }
    
}
