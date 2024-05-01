<?php

namespace App\Livewire;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{

    public function deleteCategory(ModelsCategory $category)
    {
        if ($category) {
            $category->delete();
        }

        session()->flash('message', 'Categoria eliminata con successo');
        return $this->redirect('/categories', navigate:true);

    }

    public function render()
    {
        $categories = ModelsCategory::all();

        return view('livewire.admin.categories.category', compact('categories'))->layout('layouts.app');
    }
}
