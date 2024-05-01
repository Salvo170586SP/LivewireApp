<div>
    <div class="flex items-center justify-center p-12">
        <div class="mx-auto w-full max-w-[550px]">
            <div class="mb-10 text-center">
                <a wire:navigate href="/categories" class="bg-gray-300 hover:bg-gray-400 px-5 py-2 rounded ">Torna alle
                    categorie</a>
            </div>
            <form wire:submit.prevent="addCategory">
                @include('livewire.admin.categories.form')
                <div>
                    <button
                        class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                        add
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>