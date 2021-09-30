<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Doctor;
class Test extends Component
{


    public $accounts = [];
    public $count = 0;

    // public function mount()
    // {
    //     $accounts = Doctor::all();
    //     // foreach($accounts as $account)
    //     // {
    //     //     $this->accounts[$this->count]['name'] = $account['name']; 
    //     //     $this->accounts[$this->count]['Address'] = $account['Address'];
    //     //     $this->accounts[$this->count]['Phone'] = $account['Phone'];
    //     //     $this->accounts[$this->count]['percentage'] = $account['percentage'];

    //     //     $this->count = $this->count + 1;
    //     // }
    // }

    public function add()
    {
        $this->accounts[$this->count]['name'] = ''; 
        $this->accounts[$this->count]['Address'] = '';
        $this->accounts[$this->count]['Phone'] = '';
        $this->accounts[$this->count]['percentage'] = '';
        $this->count = $this->count + 1;
    }

    public function delete($index)
    {
        Doctor::where($this->accounts[$index])->delete();
        unset($this->accounts[$index]); 
        $this->count = $this->count - 1;
    }

    public function save($index)
    {
        $data = $this->accounts[$index];
        Doctor::create($data);
    }

    public function render()
    {
        return view('livewire.test');
    }
}
