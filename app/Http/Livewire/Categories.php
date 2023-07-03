<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class Categories extends Component
{
    public $categories,$categoriess, $category_name, $category_slug, $topic_id, $category_id, $categories_id;
    public $updateMode = false;
    public function render() 
    {
        $this->categories = Category::all();
        return view('livewire.categories');
    }
    private function resetInputFields(){
        $this->category_name = '';
    }
    public function categorystore()
    {
        // dd($this->permission_id);
        $validatedDate = $this->validate([
            'category_name' => 'required|max:20',
        ],
        [
            'category_name.required' => 'Please enter category name.',

        ]);

        $category_slug_lower = strtolower($this->category_name);
        $category = Category::create([
            'category_name' => $this->category_name, 
            'category_slug' => $category_slug_lower,
            'topic_id' => '1',
        ]);
        $last_id = $category->id; 

        session()->flash('message', 'Category created successfully.');
        $this->resetInputFields();
    }
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->categories_id = $id;
        $this->category_name = $category->category_name;
        $this->category_slug = $category->category_slug;

        $this->updateMode = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        $validatedDate = $this->validate([
            'category_name' => 'required|max:20',
        ],
        [
            'category_name.required' => 'Please enter category name.',
        ]);
  
        $category = Category::find($this->categories_id);
        $category_slug_lower = strtolower($this->category_name);
        $category->update([
            'category_name' => $this->category_name,
            'category_slug' =>  $category_slug_lower,
            'topic_id' => '1',
        ]);

        $last_role_id = $this->categories_id;
  
        $this->updateMode = false;
  
        session()->flash('message', 'Category updated successfully.');
        $this->resetInputFields();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Category::find($id)->delete();
        session()->flash('message', 'Category Deleted Successfully.');
    }
}

