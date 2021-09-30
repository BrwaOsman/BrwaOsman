<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\order;
class GSE extends Component
{

    public $catagory =['0']  ,$Name_p , $gender , $phone , $age ,$result=[];
    public $doctor = 'brwa';
    public $test = [];
    public  $name = ['Direct', 'Color','R.B.Cs','Pus Cells','Ova','Cyst','Rota Virus'
    , 'Fecal Occult blood',
    'Calprotectin test','H.pylori  Ag test','PH','Reducing Substance','Others'] ;
    public function add_oarder()
    {
     

        if (is_array($this->name ) || is_object($this->name ))
        {
            foreach ($this->name as $key => $value) {
                
                if ( !empty($this->result[$key])) {
                    $this->test[$value]= array(
                     'name'=>$value,
                    'result'=>$this->result[$key],
                    'category'=>'General_StoolExamination',
                    );
                }else{
                    $this->test[$value]= array(
                        'name'=>$value,
                        'result'=>null,
                        'category'=>'General_StoolExamination',
                       );
                }
                  
}
}
if (is_array($this->catagory ) || is_object($this->catagory ))
{
foreach($this->catagory as $key =>$value){
    $this->catagory[$value]= array(
        'category'=>'General_StoolExamination',
      
       ); 
}
}

$test_Item =json_encode($this->test);
$test_Item2 =json_encode($this->catagory);
$order= new order;
$order->patient =  $this->Name_p;
$order->doctor = $this->doctor;
$order->Phone = $this->phone;
$order->gender =$this->gender;
$order->age = $this->age;
$order->category =$test_Item2 ;
$order->total_price = '00';

$order->test = $test_Item;

$order->save();
//   order::create(['patient'=> $this->Name_p,
//          'doctor' => $this->doctor,
//         'Phone' => $this->phone,'gender'=>$this->gender,'age'=>$this->age,
//         'category'=>$this->catagory,'total_price'=>'00' ]);
                // return dd($test_Item);
                  session()->flash('message', 'Users Created Successfully.');
                  return \redirect('/show2');
// $test2 =json_encode($this->test);
      

      

    }

    public function render()
    {
        return view('livewire.g-s-e');
    }
}
