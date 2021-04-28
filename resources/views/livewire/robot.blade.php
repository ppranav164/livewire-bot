<div>


 <div class="container px-10 py-10 text-center">
 <h1> {{ __('bots.welcome') }}</h1>
 <small> {{ __('bots.sub_message') }} </small> <br/>
 <small class="text-green-500"> {{ $chosen }} </small>
 </div>

  <div class="px-5 py-5">
    @foreach($menuItems as $menu)
      <button  model:model="chosen" wire:click="chosenMenu({{ $menu->id }})" class=" hover:bg-blue-500 hover:text-white px-3 rounded py-2 border border-blue-500">{{ $menu->menu_name }}</button>
    @endforeach
  </div>

  <div class="px-5 py-1">
    <span class="text-red-500"> {{ $message }} </span>
  </div>



  <div class="px-5 py-5 float-right">
   <button   {{ $disable ? '' : 'disabled' }}  wire:click="$emit('openModal','first-tab',{{ json_encode(['id' => $menu_id ]) }})"  class="   disabled:opacity-50 text-green-500 hover:bg-green-500 hover:text-white px-3 rounded py-2 border border-green-500"> 
    Next
   </button>
  </div>



</div>
