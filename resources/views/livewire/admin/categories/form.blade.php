<div class="mb-5">
    <label for="name_category" class="mb-3 block text-base font-medium text-[#07074D]">
        Nome categoria
    </label>
    <input type="text" wire:model="name_category" value="{{old('category', isset($category) ? $category->name_category : '' )}}" id="name_category"
        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
</div>