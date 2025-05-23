<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Fileupload extends Component
{
    use WithFileUploads;

    public $file;
    public function render()
    {
        return view('livewire.fileupload');
    }

    public function fileupload()
    {
        $this->validate([
            'file' => 'required|file|max:10240', // max 10MB
        ]);
        $path = $this->file->store('uploads', 'public');
        session()->flash('message', 'File uploaded to: ' . $path);

    }
}
