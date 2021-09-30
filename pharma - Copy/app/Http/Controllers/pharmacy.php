<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Models\caregory;
use App\Models\test;
use App\Models\order;
use App\Models\Doctor;
use App\Models\patient;
use App\Models\User;
use Carbon\Carbon;
use Redirect,Response;
use Illuminate\Support\Facades\Hash;
class pharmacy extends Controller
{
    public function category (){
        $caty = caregory::all();
        return view('categories',['ctge'=>$caty]);
    }

public function AddCategory(Request $request){
$addc = new caregory;
$addc->name = $request->input('name');
$addc->save();
return redirect('/categories');
}

public function eidtC($id , Request $request){
  caregory::where('id',$id)->update(['name' =>  $request->name]);
  return redirect('/categories');
  }

 
  public function delete($id){
    $getdelete1 = caregory::findOrfail($id);
  $getdelete1->destroy($id);
return redirect('/categories');

    }


    public function test(){
  $tests= test::all();
  $caty=caregory::orderBy('id', 'DESC')->get();
  return view('Tests',['tests'=>$tests,'ctge'=>$caty]);
    }


    public function addT(Request $request){
      $addCatygory = new test;
if ($request->input('positive') == 'po') {
  $addCatygory->name = $request->input('name');
  $addCatygory->Unit = '';
  $addCatygory->Price = $request->input('price');
  $addCatygory->Min_Color = 'bg-danger';
  $addCatygory->Max_Color = 'bg-success';
  $addCatygory->Range ='';
  $addCatygory->category = $request->input('id_category');
  $addCatygory->multi = 0;
  $addCatygory->item ="1";
}
elseif($request->input('multi')== 'br'){

$input = $request->all();
$item_arr = [];
foreach($input['it_name'] as $key => $value){
  $item_arr[$value]= array(
   'name'=> $value,
   'unit'=>$input['it_unit'][$key],
   'Min_Color'=>$input['it_min_color'][$key],
   'Max_Color'=>$input['it_max_color'][$key],
   'min_male'=>$input['it_min_male'][$key],
   'max_male'=>$input['it_max_male'][$key],
   'min_female'=>$input['it_min_female'][$key],
   'max_female'=>$input['it_max_female'][$key],
   'price'=>$input['it_price'][$key],
  );
}
$addCatygory->multi = 1;
$addCatygory->item = \json_encode($item_arr);
    $addCatygory->name = $request->input('name');
    $addCatygory->Price = "";
    $addCatygory->category = $request->input('id_category');
    $addCatygory->Unit = '';
  $addCatygory->Min_Color = '';
  $addCatygory->Max_Color = '';
  $addCatygory->Range ='';

}

else {
  $input = $request->all();
  $item_arr = [];
//  return dd($request->input('name_range'));
  foreach($input['name_range'] as $key => $value){
    $item_arr[$value]= array(
     'name'=>$value,
     'min'=>$input['min_range'][$key],
     'max'=>$input['max_range'][$key],
    );
  }
  // return dd(json_encode($item_arr));
  $addCatygory->Range = json_encode($item_arr);

   $addCatygory->name = $request->input('name');
      $addCatygory->Unit = $request->input('unit');
      $addCatygory->Price = "";
      $addCatygory->Min_Color = $request->input('min_color');
      $addCatygory->Max_Color = $request->input('max_color');
 
      $addCatygory->category = $request->input('id_category');
      $addCatygory->multi = 0;
      $addCatygory->item ="1";
} 
$addCatygory->save();
     
      return \redirect('/Tests');
    }


public function eidtTest($id , Request $request){

  $input = $request->all();
  $item_arr = array();
//  return dd($request->input('name_range'));
  foreach($input['name_range'] as $key => $value){
    $item_arr[$value]= array(
      'name'=>$value,
      'min'=>$input['min_range'][$key],
      'max'=>$input['max_range'][$key],
     );
  }
   $Range_all = \json_encode($item_arr);
  // return dd(json_encode($Range_all));
 
  test::where('id',$id)->update(['name' =>  $request->name,'Unit' =>  $request->unit,'category' =>  $request->id_category
, 'Range'=> json_encode($Range_all)]);
  return \redirect('/Tests');
}


    public function deleteTest($id){
      $getdelete1 = test::findOrfail($id);
               $getdelete1->destroy($id);
    
          return \redirect("/Tests")->with('delete' , "basarkawtwy srayawa" , );
    }

    public function order(){
      $order =order::join('patients','patients.id','orders.patient')->get();
    
      return view('Orders.Orders' ,['order'=>$order]);
    }

public function updateOresr(Request $request){
  order::updateOrCreate(['status' => $request->input("status"),
  ]);
}

    public function create(){
   
      return view('Orders.create' );
    }




    public function showOrder($id = 1){

      $order =order::whereRaw('id = (select max(`id`) from orders) ')->get();
      $patient = patient::all();
      $doctor = Doctor::all();
      $test_in_order = test::all();
      return view('Orders.show' ,['order'=>$order , 'id'=>$id,
      'doc'=>$doctor,'pten'=>$patient,'test_in_order'=>$test_in_order]);
    }

    public function printS($id){
      $order= order::findOrfail($id);
      $test_in_order = test::all();
return view('report.show2',['item'=>$order, 'test_in_order'=>$test_in_order]);

    }


    public function report(){
      $doctor = Doctor::all();
      
      return view('Report',['doctor'=>$doctor]);
    }
    public function allcategory(){

 $tests = test::all();
      return view('allCategory.allcategory', ['tests'=>$tests]);
    }

public function searchC(Request $request){
  $search = $request->input('search');
  $search2 = $request->input('search2');
  $tests= test::where('name', 'like', '%'.$search.'%')->where('category', 'like', '%'.$search2.'%')->get(); 
  return view('allCategory.allcategory', ['tests'=>$tests]);
}


public function search(Request $request)
{
if($request->ajax())
{
$output="";
$products=test::where('name','LIKE','%'.$request->search."%")->get();
if($products)
{
foreach ($products as $key => $product) {
$output.=
'<button type="button" onclick="get_data('.$product->id.' , '.$product->Price.')"  class="mb-1 btn btn-info catygory" id="catygory"
style="width:150px; height:150px; margin:1px;">'.
'<h5>'.$product->name. '</h5>'.

'</button>'
;
}
return Response($output);
   }
 
   } 
  else if($request->ajax())
{
$output="";
$products=test::where('category','LIKE','%'.$request->search2."%")->get();
if($products)
{
foreach ($products as $key => $product) {
$output.=
'<button type="button" onclick="get_data('.$product->id.' , '.$product->Price.')"  class="mb-1 btn btn-secondary catygory" id="catygory"
style="width:150px; height:150px">'.
'<h5>'.$product->name. '</h5>'.

'</button>'
;
}
return Response($output);
   }
 
   } 
   
   else{
    $tests = test::all();
    return view('allCategory.allcategory', ['tests'=>$tests]);
   }
}



    public function addorder(Request $request){
      $order= new order;
      $patient= new patient;
      $order->patient=$request->input('name_p');
      // $order->doctor=$request->input('name_d');
      $order->doctor="Pshtiwan";
      $input = $request->all();
      $item_arr = [];
      foreach($input['name_test'] as $key => $value){
        $item_arr[$value]= array(
         'name'=>$value,
         'result'=>$input['result'][$key],
         'Range'=>$input['Range'][$key],
        //  'min_range'=>$input['min_range'][$key],
        //  'max_range'=>$input['max_range'][$key],
        //  'price'=>$input['price'][$key],
        // 'min_frange'=>$input['min_frange'][$key],
        // 'max_frange'=>$input['max_frange'][$key],
         'category'=>$input['category'][$key],
         'unit'=>$input['unit'][$key],
         
        );
      }
      $order->test = json_encode($item_arr);
 
 $category_arr=[];
 foreach ($input['category'] as $key => $value) {
  $category_arr[$value]= array(
  'category'=>$value
  );
 }
 $order-> category=json_encode($category_arr);
      $order->Phone=$request->input('phone_p');
      $order->gender=$request->input('gender');
      $order->age=$request->input('age');
      $order->total_price=$request->input('Total_price');
      $order->save();
$patient->name=$request->input('name_p');
$patient->Gender=$request->input('gender');
$patient->Phone=$request->input('phone_p');
$patient->Age=$request->input('age');
$patient->Address="";
$patient->Blood="";
$patient->save();
return \redirect('/show1');
     
    }

    public function printp(){
    $patient = patient::all();
    return view('Patients.printP',['pten'=>$patient]);
    }
   

    public function getData($id=0)
    {
      if($id==0){
        $arr['data'] = test::orderBy('id', 'asc')->get(); 
      }else{
        $arr['data'] = test::where('id', $id)->first();
      }
      echo json_encode($arr);
    }

//  public $total_price;
//  public $discount;
//  public $price;
public function report2(){
  $order = order::all();

//   foreach ($order as $key) {
  
//     $this->total_price =  $this->total_price + $key->paid;
//     $this->discount =  $this->discount + $key->discount;

//     $tests = json_decode($key->test,true);
// foreach ($tests as $value) {
//   $this->price =  $this->price + $value['price'];
  
// }

//   }'total'=> $this->total_price, 'dus'=>$this->discount,'price'=>$this->price
  return view('report.report',['order'=>$order ]);
}
public function users(){
  $get_user = User::all();
  return view('user',['user'=>$get_user]);
}
public function adduser(Request $request)
{
  $password = Hash::make($request->input('password'));
  $addc = new User;
  $addc->name = $request->input('user_name');
  $addc->email = $request->input('email');
  $addc->password =  $password;
  $addc->save();
  return redirect('/Users');
}

public function eidtUser($id , Request $request){
  $password = Hash::make($request->input('password'));
  User::where('id',$id)->update(['name' =>  $request->user_name,'email' =>  $request->email ,'password' =>   $password]);
  return redirect('/Users');
  }
   
  public function deleteuser($id){
    $getdelete1 = User::findOrfail($id);
  $getdelete1->destroy($id);
return redirect('/Users');

    }

}
