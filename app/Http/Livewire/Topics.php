<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Topic;
use Livewire\WithFileUploads;

class Topics extends Component
{
    use WithFileUploads;
    public $topics,$topicss, $topic_name, $topic_title, $topic_description,$image, $topic_type,         $comment_id, $comment_description, $category_id, $topic_id, $topics_id;
    public $updateMode = false;
    public $showMode = false;
    public $commentMode = false;

    public function render()
    {
        $this->topics = Topic::all();
        return view('livewire.topics');
    }
    private function resetInputFields(){
        $this->topic_name = '';
        $this->topic_title = '';
        $this->topic_description = '';
        $this->image = '';
        $this->topic_type = '';
        $this->comment_description = '';
    }
    public function topicstore()
    {
        // dd($this->permission_id);
        $validatedDate = $this->validate([
            'topic_name' => 'required|max:20',
            'topic_title' => 'required|max:20',
            'topic_description' => 'required',
            // 'image'=>'required', 
        ],
        [
            'topic_name.required' => 'Please enter topic name.',
            'topic_title.required' => 'Please enter topic title.',
            'topic_description.required' => 'Please enter topic description.',

        ]);

        // $Id_array = implode(',',$this->permission_id);
        // $role_slug_lower = strtolower($this->role_name);

        // $name = md5($this->image . microtime()).'.'.$this->image->extension();
        $name = $this->image->getClientOriginalName();
        // dd($name);
        // $this->image-> move(public_path('public/Image'), $name);
        // dd($name);
        $this->image->storeAs('photos', $name);

        // $filename= date('YmdHi').$file->getClientOriginalName();
        // $file-> move(public_path('public/Image'), $filename);

        // $filenameWithExt=$this->file('image')->getClientOriginalName();
        // dd($filenameWithExt);
        // $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
        // $extension=$this->file('image')->getClientOriginalExtension();
        // $fileNameToStore= date('mdYHis') . uniqid() .$filename.'.'.$extension;

        // $this->image->store('photos');
        $topic = Topic::create([
            'topic_name' => $this->topic_name, 
            'topic_title' => $this->topic_title, 
            'topic_description' => $this->topic_description, 
            'image' => $name, 
            'topic_type' => $this->topic_type, 
            'comment_description' => $this->comment_description, 
            'comment_id'=>'1',
            'category_id'=>'1'
        ]);
        $last_id = $topic->id;

        session()->flash('message', 'Topic created successfully.');
        $this->resetInputFields();
    }
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $topic = Topic::findOrFail($id);
        // $permissionId = $role->permission_id;
        // $permission_array = implode(',',(array) $role->permission_id);
        $this->topics_id = $id;
        $this->topic_name = $topic->topic_name;
        $this->topic_title = $topic->topic_title;
        $this->topic_description = $topic->topic_description;
        $this->image = $topic->image;
        $this->topic_type = $topic->topic_type; 
        $this->comment_description = $topic->comment_description;

        $this->updateMode = true;
    }
    public function show($id)
    {
        // dd('show');
        $topics = Topic::findOrFail($id);
        // dd($topics->topic_name);
        // $permissionId = $role->permission_id;
        // $permission_array = implode(',',(array) $role->permission_id);
        $this->topics_id = $id;
        $this->topic_name = $topics->topic_name;
        $this->topic_title = $topics->topic_title;
        $this->topic_description = $topics->topic_description;
        $this->image = $topics->image;
        $this->topic_type = $topics->topic_type;
        $this->comment_description = $topics->comment_description;
        // return redirect()->to('/comment');
        $this->showMode = true;
    }
    public function comment($id)
    {
        // dd('show');
        $this->showMode = false;
        $this->commentMode = true;
    }
    public function commentstore($id)
    {
        dd('show');
        $this->showMode = false;
        $this->commentMode = true;
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
            'topic_name' => 'required|max:20',
            'topic_title' => 'required|max:20',
            'topic_description' => 'required',
            'image'=>'required',
        ],
        [
            'topic_name.required' => 'Please enter topic name.',
            'topic_title.required' => 'Please enter topic title.',
            'topic_description.required' => 'Please enter topic description.',

        ]);
  
        $topic = Topic::find($this->topics_id);
        // $Id_array = implode(',',(array) $this->permission_id);
        // $topic_slug_lower = strtolower($this->topic_name);
        $topic->update([
            'topic_name' => $this->topic_name, 
            'topic_title' => $this->topic_title, 
            'topic_description' => $this->topic_description, 
            'image' => $this->image, 
            'topic_type' => $this->topic_type, 
            'comment_description' => $this->comment_description,
            'comment_id'=>'1',
            'category_id'=>'1'
        ]);

        $last_topic_id = $this->topics_id;
  
        $this->updateMode = false;
  
        session()->flash('message', 'Topic Updated Successfully.');
        $this->resetInputFields();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Topic::find($id)->delete();
        session()->flash('message', 'Topic Deleted Successfully.');
    }
}
