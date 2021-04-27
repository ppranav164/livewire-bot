<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

use App\Models\helpme_module;
use App\Models\bot_menu_items;


class Task extends ModalComponent
{
    

    public $message;
    public $header;
    public $modules;

    public $ids;

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
        return helpme_module::leftJoin('bot_menu_items','helpme_module.menu_id','=','bot_menu_items.id')
        ->select('helpme_module.*', 'bot_menu_items.menu_name')
        ->get();
    }


    public function deletemodule($id)
     {
         $helpMeExtenion =  helpme_module::where('id',$id);
         $helpMeExtenion->delete();
     }


}
