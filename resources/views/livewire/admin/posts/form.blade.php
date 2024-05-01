@include('livewire.admin.components.error-message')

<div class="mb-5">
    <label for="title" class="mb-3 block text-base font-medium text-[#07074D]">
        Titolo
    </label>
    <input type="text" wire:model="title" value="{{old('post', isset($post) ? $post->title : '' )}}" id="title"
        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
</div>
<div class="mb-5">
    <label for="description" class="mb-3 block text-base font-medium text-[#07074D]">
        Descrizione
    </label>
    <textarea rows="4" wire:model="description" id="description"
        class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
        {{old('description', isset($post) ? $post->description : '' )}}
    </textarea>
</div>
<div class="mb-5"> 
    <label for="img_post" class="mb-3 block text-base font-medium text-[#07074D]">
        Aggiungi immagine
    </label>  
    <input wire:model="img_post" id="img_post" type="file"
        class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
</div>
<div class="mb-5">
    <label for="categorie" class="mb-3 block text-base font-medium text-[#07074D]">
        Aggiungi categoria
    </label>
    <select wire:model="category_id" id="categorie"
        class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
        <option value="">seleziona una categoria</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name_category}}</option>
        @endforeach
    </select>
</div>