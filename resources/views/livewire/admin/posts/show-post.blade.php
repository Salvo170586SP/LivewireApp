<div>
  <div class="flex flex-col items-center justify-center p-12">
    <div class="mb-10 text-center">
      <a wire:navigate href="/posts" class="bg-gray-300 hover:bg-gray-400 px-5 py-2 rounded ">Torna ai posts</a>
    </div>
    <div
    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</h5>
      <p class="font-normal text-gray-700 dark:text-gray-400">{{$post->description}}</p>
    </div>
  </div>
</div>