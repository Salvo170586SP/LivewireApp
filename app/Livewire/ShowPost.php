<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPost extends Component
{
    public Post $post;

    public function mount($post)
    {
        $this->post = $post;
    }

    public function render()
    {

        return view('livewire.admin.posts.show-post')->layout('layouts.app');
    }
}
