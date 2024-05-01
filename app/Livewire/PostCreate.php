<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostCreate extends Component
{
    use WithFileUploads;
    
    public $user_id;
    public $category_id;
    public $title;
    public $description;
    public $img_post;

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


        if ($this->img_post) {
            $url = Storage::putFile('/imgs_post',  $this->img_post , 'public');
            $new_post->img_post = $url;
        }

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
