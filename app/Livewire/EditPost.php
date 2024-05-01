<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class EditPost extends Component
{
    public Post $post;
    public $title;
    public $category_id;
    public $description;

    public function mount()
    {
        $this->title = $this->post->title;
        $this->category_id = $this->post->category_id;
        $this->description = $this->post->description;
    }

    public function updatePost()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'nullable',
        ]);

        /* SE NON TROVA NESSUNA CATEGORIA IMPOSTA NULL ALTRIMENTI METTE LA CATEGORIA */
        /* $category = $this->category_id == null ? $this->post->category_id = null : $this->post->category_id = $this->category_id; */
        $category = $this->category_id == null ? null : $this->category_id;

        $this->post->update([
            'title' => $this->title,
            'category_id' => $category,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Post modificato con successo');
        return  $this->redirect('/posts', navigate: true);
    }

    public function render(Post $post)
    {
        $categories = Category::all();
        return view('livewire.admin.posts.edit-post', compact('post', 'categories'))->layout('layouts.app');
    }
}
