<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

use App\Models\helpme_module;
use App\Models\bot_menu_items;
use App\Models\products;
use App\Models\product_options;
use Illuminate\Support\Collection;

class Task extends ModalComponent
{
    

    public $message;
    public $header;
    public $modules;
    public $ids;
    public $checked;
    public $selectedRows;
    public $selectrow;
    public $rowid = [];
    public $products;
    public $items = [];

    protected $listeners = ['taskcomponent' => '$refresh'];

    public function mount()
    {
        $this->message = 'Hello World!';
        $this->header = 'Hello World!';
    }


    public function render()
    {
        $this->modules = $this->showMenuModuleList();
        return view('livewire.task');
    }

    
    
    public function reload()
    {
        $this->render();
    }

    public function showMenuModuleList()
    {
        $row = helpme_module::leftJoin('bot_menu_items','helpme_module.menu_id','=','bot_menu_items.id')
        ->select('helpme_module.*', 'bot_menu_items.menu_name')
        ->get();

        $this->products = $row;
      
        return $row;

    }


    public function deletemodule($id)
     {
         $helpMeExtenion =  helpme_module::where('id',$id);
         $helpMeExtenion->delete();

         $this->deleteProducts($id);
     }


     public function rowselection($id)
     {
        
       
     }


     public function deleteselection()
     {
        $selectedID = $this->rowid;
        $extension = helpme_module::whereIn('id',$selectedID);
        $extension->delete();
        $this->deleteProducts($selectedID);
     }

     //Delete the product options
     
     public function deleteProducts($id)
     {
         $product_options = product_options::whereIn('menu_id',$id);
         $product_options->delete();
     }


}
