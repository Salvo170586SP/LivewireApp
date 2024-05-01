<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryEdit extends Component
{

    public Category $category;
    public $name_category;

    public function mount()
    {
        $this->name_category = $this->category->name_category;
    }

    public function updateCategory()
    {
        $this->category->update([
            'name_category' => $this->name_category
        ]);
      
        session()->flash('message', 'Categoria modificata con successo');
        return $this->redirect('/categories', navigate:true);
    }

    public function render()
    {
        return view('livewire.admin.categories.category-edit')->layout('layouts.app');
    }
}
