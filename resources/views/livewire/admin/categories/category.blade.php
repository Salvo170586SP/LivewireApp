<div>
    <section class="container p-4 mx-auto">

        <div class="my-5">
             <a wire:navigate href="/categories/create" class="bg-gray-300 hover:bg-gray-400 px-5 py-2 rounded ">add</a>
        </div>

       @include('livewire.admin.components.alert')

        <div class="flex flex-col">
             <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                       <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                 <thead class="bg-gray-50 dark:bg-gray-800">
                                      <tr>
                                           <th scope="col"
                                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Nome
                                           </th>
                                           <th scope="col" class="relative py-3.5 px-4">
                                                Actions
                                           </th>
                                      </tr>
                                 </thead>
                                 <tbody
                                      class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                      @foreach($categories as $category)
                                      <tr>
                                           <td
                                                class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                                                {{$category->name_category}}
                                           </td>
                                            
                                           <td class="px-4 py-4 flex justify-center font-medium text-gray-700 whitespace-nowrap">
                                               
                                                <button wire:navigate href="{{route('admin.categories.categoryEdit', $category->id)}}"
                                                     class="bg-blue-500 hover:bg-blue-600 px-5 py-2 me-2 rounded text-white">modifica</button> 
                                                <button wire:click="deleteCategory({{$category->id}})"
                                                     class="bg-red-500 hover:bg-red-600 px-5 py-2 rounded text-white">elimina</button>
                                           </td>
                                      </tr>
                                      @endforeach
                                 </tbody>
                            </table>
                       </div>
                  </div>
             </div>
        </div>


   </section>
</div>
