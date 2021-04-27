<div>
 <div class="container px-5 py-10">
 <form class="w-full">

  <div class="flex flex-wrap -mx-3 mb-6">
    
     <div class="w-full md:w-1/2 px-3">
       <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
         Menu Name
       </label>
       <input wire:model="menu_name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Music or DJ??">

       @error('menu_name') <span class="error text-red-500">{{ $message }}</span> @enderror

     </div>
     
   </div>


      <div class="relative">
       <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
        Show in the first screen?
       </label>

        <select wire:model="isMain" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
        <option value="0">No</option>
        <option value="1">Yes</option>
        </select>
      </div>

      <div class="relative">
       <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
        Enable Menu
       </label>

        <select wire:model="status" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
        <option value="0">No</option>
        <option value="1">Yes</option>
        </select>
      </div>

      <div class="relative mt-5 py-5">
        <button type="button" wire:click="savemenu" class=" float-right bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">
         Done
        </button>
      </div>
  
</form>

 </div>
</div>
