<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryCreate extends Component
{
    public $name_category;

    public function addCategory()
    {
        $new_category = new Category();
        $new_category->name_category = $this->name_category;
        $new_category->save();


        session()->flash('message', 'Categoria aggiunta correttamente');
        return  $this->redirect('/categories', navigate:true);
    }

    public function render()
    {
        return view('livewire.admin.categories.category-create')->layout('layouts.app');
    }
}
