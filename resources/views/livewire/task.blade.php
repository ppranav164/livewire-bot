<div>

<div class="container mx-auto mt-20">

<button wire:click="$emit('openModal', 'robot')"  class="mr-5 float-right bg-green-500 hover:bg-white text-white-700 hover:text-green-500 font-semibold text-white py-2 px-4 border border-green-500 hover:border-green-500 rounded">
  Preview
</button>


<button wire:click="$emit('openModal', 'createmenu')" class="mr-5 float-right bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
  Create New Menu
</button>

<button wire:click="$emit('openModal', 'addmenu')" class="mr-5 float-right bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
  Add New
</button>

<button wire:click="deleteselection" class="mr-5 float-right bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
  Delete
</button>



  <h1 class="text-gray-500 py-3">Helpme Robot Module : 
  
   </h1> 
<div class="flex flex-col mt-10">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
            
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                <input wire:click="$toggle('checked')" type="checkbox" class="rounded">
              </th>

              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Module Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Parent Menu
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Products
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Screen
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Title
              </th>

              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Action
              </th>

            </tr>
          </thead>

          <tbody class="bg-white divide-y divide-gray-200">

           
           @foreach($modules as $module)
           
            <tr>

              <td class="px-6 py-4 whitespace-nowrap">
               <input wire:model="rowid" value="{{ $module->id  }}"  type="checkbox" class="rounded" {{ $checked ? 'checked' : '' }} >
              </td>

              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-500">{{ $module->menu_name }}</div>
              </td>

              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-500">{{ $module->belongs_to }}</div>
              </td>

              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-500">{{ $module->product_name }}</div>
              </td>

              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-500">{{ $module->screen }}</div>
              </td>

              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-500">{{ str_limit($module->title,50) }}</div>
              </td>

             

              <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
              <button wire:click="$emit('openModal', 'edit-extension' ,{{ json_encode(['id' => $module->id ]) }} )" class="text-indigo-600 hover:text-indigo-900">Edit</button>
              <button wire:click="deletemodule({{ $module->id }})" class="text-red-600 hover:text-red-900">Delete</button>
              <button wire:click="print" class="text-red-600 hover:text-red-900">Print</button>
              </td>

            </tr>

            @endforeach
            <!-- More people... -->
          </tbody>



        </table>
      </div>
    </div>
  </div>
</div>
</div>
 
</div>

