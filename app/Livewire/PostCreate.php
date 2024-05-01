<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostCreate extends Component
{
    public $user_id;
    public $category_id;
    public $title;
    public $description;

    public function addPost()
    {

        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ],[
            'title.required' => 'il titolo è obbligatorio',
            'description.required' => 'la descrizione è obbligatoria',
         ]);

        $new_post = new Post();
        $new_post->user_id = Auth::id();
        $this->category_id == null ? $new_post->category_id = null :  $new_post->category_id = $this->category_id;
        $new_post->title = $this->title;
        $new_post->description = $this->description;
        $new_post->save();

        session()->flash('message', 'Post aggiunto correttamente');
        return  $this->redirect('/posts', navigate:true);
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.admin.posts.post-create', compact('categories'))->layout('layouts.app');
    }
}
