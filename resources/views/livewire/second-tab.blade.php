<div>


 <div class="container px-10 py-10 text-center">
 <h1> {{ $name->title }}</h1>
 <small> {{ $chosen }} </small>
 </div>

  <div class="px-5 py-5">
    @foreach($options as $menu)
      <button model:model="chosen" class=" hover:bg-blue-500 hover:text-white px-3 rounded py-2 border border-blue-500">
      {{ $menu->product_name }}</button>
    @endforeach
  </div>


  <div class="px-5 py-5 float-right">
   <button {{ $selected ? '' : 'disabled' }} class="disabled:opacity-50 text-green-500 hover:bg-green-500 hover:text-white px-3 rounded py-2 border border-green-500"> 
   Done
   </button>
  </div>



</div>
