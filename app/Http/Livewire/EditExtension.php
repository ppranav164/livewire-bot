<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\helpme_module;
use App\Models\bot_menu_items;
use App\Models\products;


class EditExtension extends ModalComponent
{

    public $menuItems,$menu_option;
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
        $this->menu_option = bot_menu_items::where('is_main',1)->get();
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


        $menu_id = $helpmeEtension->id;

        if($this->products)
        {
            foreach($this->products as $product_id)
              {
                  $this->product_options($menu_id,$product_id);
              }

              $products = $this->products;
              $productsby = products::whereIn('id',$products)->get();
              $item = [];
              
              foreach($productsby as $items)
              {
                  $item[] = $items->product_name;
              }
      
              $this->Updateproduct($menu_id,$item);
        }



        $this->emitTo('task', 'taskcomponent');
        $this->closeModal();
    }


    public function product_options($menu_id,$product_id)
    {
        $products = new product_options();
        $products->menu_id = $menu_id;
        $products->product_id = $product_id;
        $products->save();
    }


    public function Updateproduct($menu_id,$products)
    {
        $module  =  helpme_module::find($menu_id);
        $module->product_name = implode(" , ",$products);
        $module->update();
    }
    

    public function editInfo()
    {
        $helpmeEtension =  helpme_module::find($this->extID)->first();
        $this->editData = $helpmeEtension;
        return $helpmeEtension;
    }
    
    
}
