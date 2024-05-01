<?php

namespace App\Livewire;

use App\Models\Post as ModelsPost;
use Livewire\Component;
use Livewire\WithPagination;

class Post extends Component
{
    use WithPagination;

    public $search = '';

    public function deletePost(ModelsPost $post)
    {
        $post->delete();

        session()->flash('message', 'Post eliminato con successo');
        return  $this->redirect('/posts', navigate: true);
    }

    public function render()
    {
        if ($this->search) {
            $posts = ModelsPost::where('title', 'like', '%' . $this->search . '%')->paginate(10);
        } else {
            $posts = ModelsPost::paginate(10);
        }

        return view('livewire.admin.posts.posts', ['posts' => $posts])->layout('layouts.app');
    }
}
