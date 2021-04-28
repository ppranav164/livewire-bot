<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

use App\Models\helpme_module;
use App\Models\bot_menu_items;
use App\Models\products;
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

        foreach($row as $product)
        {
            $product_id = [1,2];
            $product_ids = json_decode($product->product_id);
            $item = products::whereIn('id',$product_id)->get();
            
            foreach($item as $item)
            {
                $this->products =  $product_ids;
            }
        }

        return $row;
    }


    public function deletemodule($id)
     {
         $helpMeExtenion =  helpme_module::where('id',$id);
         $helpMeExtenion->delete();
     }


     public function rowselection($id)
     {
        
       
     }


     public function deleteselection()
     {
        $selectedID = $this->rowid;

        $extension = helpme_module::whereIn('id',$selectedID);
        $extension->delete();
     }


}
