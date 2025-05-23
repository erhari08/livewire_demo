<?php

namespace App\Livewire;
use App\Models\Employee;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;

class Usercreation extends Component
{
    use WithFileUploads;

    public $name,$email,$address,$gender,$phone_no,$country,$state,$city,$zip,$photo;
    public $additonal_doc=[];
    public $storedFiles=[];

    public function render()
    {
        return view('livewire.usercreation');
    }

    public function removeFile($index)
    {
        unset($this->additonal_doc[$index]);
        $this->additonal_doc = array_values($this->additonal_doc); // reindex
    }

    public function usercreation(){
        $this->validate([
            'photo' => 'required|file|max:10240', // max 10MB
            // 'additonal_doc' => 'required|file|max:10240', // max 10MB

        ]);
        $photo_path = $this->photo->store('uploads/photo', 'public');
        
        foreach ($this->additonal_doc as $file) {
            $path = $file->store('uploads/add_doc', 'public');
            $this->storedFiles[] = $path; // Add each path to array
        }
    
        // Optional: dd or log the result
    
        $inputs= [
                'name'=>$this->name,
                'email'=>$this->email,
                'address'=>$this->address,
                "gender"=>$this->gender,
                "phone_no"=>$this->phone_no,
                "country"=>$this->country,
                "state"=>$this->state,
                "city"=>$this->city,
                "zip"=>$this->zip,
                "photo"=>$photo_path,
                "additonal_doc"=>implode(',', $this->storedFiles)
        ];

        Employee::create($inputs);
        session()->flash('message', 'User Created Succesfully');

    }
}
