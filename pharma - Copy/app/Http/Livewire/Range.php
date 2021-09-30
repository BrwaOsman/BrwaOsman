<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\caregory;
use App\Models\test;
use App\Models\Doctor;
class Range extends Component
{
    public $inputs = [];
    public $i = 1 ;
    public $name,$unit ,$caregory1 , $price,$max_color,$min_color;
    public $name_range = [] , $max_range = [] ,$min_range = [];
    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }
    public function addtest(Request $request)
    {
  $addCatygory = new test;


        $input = $request->all();
        $item_arr = [];
        return dd($request->input('name')) ;
        foreach($input['name_range'] as $key => $value){
          $item_arr[$value]= array(
           'name'=>$value,
           'min_range'=>$input['min_range'][$key],
           'max_range'=>$input['max_range'][$key],
          );
        }
        $addCatygory->Range = json_encode($item_arr);


        // $this->navigation = json_encode([
        //     'name6' => $this->name_range,
        //     'max_range'=> $this->max_range,
        //     'min_range'=>$this->min_range
        // ], true);



  
   
      $addCatygory->name =$this->name;
      $addCatygory->Unit = $this->unit;
      $addCatygory->Price ='';
      $addCatygory->Min_Color = 'bg-danger';
      $addCatygory->Max_Color = 'bg-success';
     
  
      $addCatygory->category = $request->input('id_category');
      $addCatygory->multi = 0;
      $addCatygory->item ="1";
    $addCatygory->save();

    }
   



    public function render()
    {
       $array =[
        'caregory'=>   caregory::all()
       ];
     
        return view('livewire.range',$array);
    }
}
