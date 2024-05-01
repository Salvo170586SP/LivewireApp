<?php

namespace App\Livewire;

use App\Models\Post as ModelsPost;
use Livewire\Component;

class Post extends Component
{
    public $posts = [];

    public function mount()
    {
        $this->posts = ModelsPost::all();
    }

    public function deletePost(ModelsPost $post)
    {
        $post->delete();

        session()->flash('message', 'Post eliminato con successo');
        return  $this->redirect('/posts', navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.posts.posts', ['posts' => $this->posts])->layout('layouts.app');
    }
}
