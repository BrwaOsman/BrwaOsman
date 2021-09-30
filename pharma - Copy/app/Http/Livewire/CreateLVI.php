<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\test;
use App\Models\order;
use App\Models\doctor;
use App\Models\patient;


class CreateLVI extends Component
{
public $patient=null;
public $doctor=null;
public $get_doctor=null;
public $get_petient=null;
public $get_test = null;
public $name_p;
public $gender;
public $name_d;
public $price;
public $name_t;
public $result;
 


public function AddRow($get_id){
    $this->get_test = test::where('id',$get_id)->get();
  
}

public function addpost(){
    $addOrder= new order;
    $addOrder->patient = $this->patient;
    $addOrder->doctor = $this->doctor;
    $addOrder->test = "";
    $addOrder->price = "";
    $addOrder->normal_range ="";
    $addOrder->result = $this->result;
    $addOrder->paid = "00";
    $addOrder->discount = "00";
    $addOrder->status = "Completed";
$addOrder->save();
return redirect()->to('/Orders');

}

    public function render()
    {
        $pten=patient::all();
        $doc=doctor::all();
        $test=test::all();
        return view('livewire.create-l-v-i', ['pten'=>$pten,'doc'=>$doc,'test'=>$test]);
    }
    public function UpdatedPatient($get_id)
    {
        $this->get_petient = patient::where('id',$get_id)->get();
    }
    public function Updateddoctor($get_id)
    {
        $this->get_doctor = doctor::where('id',$get_id)->get();
    }
    // public function Updatedtest($get_id)
    // {
    //     $this->get_test = test::where('id',$get_id)->get();
    // }
}
