<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPost extends Component
{
    use WithFileUploads;

    public Post $post;
    public $title;
    public $category_id;
    public $description;
    public $img_post;

    public function mount()
    {
        $this->title = $this->post->title;
        $this->category_id = $this->post->category_id;
        $this->description = $this->post->description;
        $this->img_post = $this->post->img_post;
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

        if ($this->img_post) {
            if ($this->post->img_post) {
                Storage::delete('/imgs_post',  $this->post->img_post);
            }

            $url = Storage::putFile('/imgs_post',  $this->img_post, 'public');
        } else {
            $url =  $this->post->img_post;
        }


        $this->post->update([
            'title' => $this->title,
            'category_id' => $category,
            'description' => $this->description,
            'img_post' => $url
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
