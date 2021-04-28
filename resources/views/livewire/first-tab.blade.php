<div>


 <div class="container px-10 py-10 text-center">
 <h1> {{ $name->title }}</h1>
 <small> {{ $chosen }} </small>
 </div>

  <div class="px-5 py-5">
    @foreach($options as $menu)
      <button model:model="chosen" wire:click="chosenMenu({{ $menu->id }})" class=" hover:bg-blue-500 hover:text-white px-3 rounded py-2 border border-blue-500">{{ $menu->menu_name }}</button>
    @endforeach
  </div>


  <div class="px-5 py-5 float-right">
   <button wire:click="$emit('openModal','second-tab',{{ json_encode(['id' => $option_id ]) }})"   class=" text-green-500 hover:bg-green-500 hover:text-white px-3 rounded py-2 border border-green-500"> 
   Next
   </button>
  </div>



</div>
