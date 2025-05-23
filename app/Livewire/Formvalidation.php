<?php

namespace App\Livewire;
use App\Models\Product;
use Livewire\Component;

class Formvalidation extends Component
{
    #[Validate] 
    public $name,$email,$address;
    protected function rules()
    {
        return [
            'name' => 'required|min:5',
            'email' => 'required|min:5',
            'address'=> 'required|min:5',
        ];
    }
    public function render()
    {
        return view('livewire.formvalidation');
    }
    public function formsubmit()
    {
        $validated = $this->validate();
        Product::create($validated);

        // $products=Product::create([
        //     'name'=>$this->name,
        //     'email'=>$this->email,
        //     'address'=>$this->address,
        // ]);
        // $this->reset();
    }
}
