<div>
 <div class="container px-5 py-10">


 <form class="w-full">

  <div class="flex flex-wrap -mx-3 mb-6">

     <div class="w-full px-3">
       <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
         Select Menu
       </label>
       <div class="relative">
        <select wire:model="menu_name" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
          
          @foreach($menuItems as $menu)
          <option value="{{ $menu->id }}">{{ $menu->menu_name }}</option>
          @endforeach

        </select>
      </div>

     </div>


     <div class="w-full px-3">
       <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
         Select Parent Menu
       </label>
       <div class="relative">
        <select wire:model="parent_menu" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
          <option value="0">None</option>
          <option>DJ</option>
          <option>Audio Production</option>
        </select>
      </div>

     </div>


     <div class="w-full px-3">
     <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="grid-password">
          {{ $parent_menu == "0" ? 'Add Title' : 'Add Title for '.$parent_menu  }}
       </label>
      <div class="relative mt-5">
      <textarea wire:model="title" rows="5" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"></textarea>
      </div>
       @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
     </div>




     <div class="w-full px-3">
       <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
         Select Products
       </label>
       
       <div class="">
        
       </div>

       <div class="relative">
        <select multiple wire:model="products" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
        <option value="1">Pioneer DJ DDJ 200</option>
        <option value="2">Pioneer DJ DDJ 400</option>
        <option value="3">Audio Technica ATH-M20x Professional Studio Headphones</option>
        <option value="4">Behringer - UMC204HD-Audio Interface</option>
        </select>
      </div>

     </div>


     <div class="w-full px-3">
       <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
         Enable Menu 
       </label>
       <div class="relative">
        <select  wire:model="status" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
        <option value="0">No</option>
        <option value="1">Yes</option>
        </select>
      </div>

     </div>

     <div class="w-full px-3 relative mt-5 py-5">
        <button type="button" wire:click="savemenumodule" class=" float-right bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">
         Done
        </button>
      </div>
    
     
   </div>
  
</form>
 </div>
</div>
