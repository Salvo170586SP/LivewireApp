<div x-data="{ isActive: true }">
    @if(session()->has('message'))
    <div x-show="isActive == true"
        class="p-4 mb-4 w-full mx-auto flex justify-between rounded-lg bg-green-50 text-green-800">
        <div class="text-sm">
            <span>{{session('message')}}</span>
        </div>
        <button x-on:click="isActive = false">X</button>
    </div>
    @endif
</div>