<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\test;
class AllTest extends Component
{
    public $search , $name ;

    public function all()
    {
     return dd(test::all());
    }
    public function chake($id)
    {
    $chake = test::where('id',$id)->get();
    
    foreach($chake as $value){
      $this->name =$value->name;
    }

    }

    public function mount()
    {

        $tests = test:: all();
        $this->name =[];

    }

    public function render()
    {
        $search_item = '%'. $this->search.'%';
    //    $array = [
    //     // 'tests' => test::all(),
    //     'tests' => test::where('name','like',$search_item)->paginate(50)
    //    ];
    $tests = test::where('name','like',$search_item)->latest()->Paginate(50);
        return view('livewire.all-test',['tests'=>$tests])->extends('layouts.app');
    }
}
