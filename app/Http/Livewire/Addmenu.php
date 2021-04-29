<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\helpme_module;
use App\Models\bot_menu_items;
use App\Models\product_options;
use App\Models\products;


class Addmenu extends ModalComponent
{

    public $menuItems,$menu_option;
    public $parent_menu;
    public $menu_name;
    public $products = "";
    public $screen = 0;
    public $status = 1;
    public $title;
    public $itemproducts;

    protected $rules = [
        'title' => 'required|min:6',
    ];

    
    public function render()
    {
        $this->itemproducts = $this->getProducts();
        $this->menuItems = $this->getMenus();
        return view('livewire.addmenu');
    }


    public function getMenus()
    {
        $this->menu_option = bot_menu_items::where('is_main',1)->get();
        return bot_menu_items::all();
    }


    public function savemenumodule()
    {
        $this->validate();

        $helpmeEtension = new helpme_module();
        $helpmeEtension->menu_id =  empty($this->menu_name) ? 1 : $this->menu_name;
        $helpmeEtension->belongs_to = empty($this->parent_menu) ? 0 : $this->parent_menu;
        $helpmeEtension->product_id =  json_encode($this->products);
        $helpmeEtension->screen =  $this->screen;
        $helpmeEtension->title =  $this->title;
        $helpmeEtension->status =  $this->status;
        $helpmeEtension->save();

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


    public function getProducts()
    {
        return products::where('status',1)->get();
    }

}
