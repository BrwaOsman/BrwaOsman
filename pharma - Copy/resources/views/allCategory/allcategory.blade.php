@extends('layouts.app')

@section('content')

<div class="row">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>


<style>
    th,dt{
        text-align: center;
    }
</style>

    <div class="p-2 border col-5" id="table_test">
        <h6> Patient Information <span class="ml-3 btn btn-warning btn-sm d-none goback" onclick="goback()">Go Back</span></h6>
        
        <form action="{{ route('addorder') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{csrf_field()}}
            <div class="row">
                <div class="form-group col-5 row">
                    <label for="" class="mt-2 ml-1 mr-1">name: </label>
                    <input type="text" name="name_p" class="form-control col-9" placeholder="patient name" required>
                </div>
                <div class="form-group col-2">

                    <select id="inputState" name="gender" class="form-control">
                        <option selected hidden>Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group col-3 row">
                    <label for="" class="mt-2 ">Phone: </label>
                    <input type="phone" class="form-control col-8" name="phone_p" placeholder="Phone">
                </div>
                <div class="form-group col-2 row">
                    <label for="" class="mt-2 ml-1 mr-1">Age: </label>
                    <input type="text" class="form-control col-7" name="age" value="00">
                </div>
            </div>
{{-- 
            <h6> Doctor Information </h6>

            <div class="form-row">
                <div class="mb-3 col-md-4">
                    <label for="validationCustom01">Name </label>
                    <input type="text" class="form-control" id="validationCustom01" name="name_d" value="">

                </div>
                <div class="mb-3 col-md-4">
                    <label for="validationCustom02">Given Money</label>
                    <input type="number" class="form-control" id="validationCustom02" name="get_money" value="">

                </div>
                <div class="mb-3 col-md-4">
                    <label for="validationCustomUsername">Total Price</label>
                    <div class="input-group">
                        <input type="number" value="0" class="form-control bg-info"  id="val" name="Total_price"  min="0" required>
                    </div>
                </div>
            </div> --}}



            <div id="product-list" class="ps-container" style="height: 720px; min-height: 278px; overflow: scroll; ">

                <table class="table items table-striped table-bordered table-condensed table-hover sortable_table"
                    id="posTable" style="margin-bottom: 0px; padding: 0px;">
                    <thead class="tableFloatingHeaderOriginal increment">
                        <tr>
                            <th width="30%">Name</th>
                            <th width="20%">Result</th>
                            <th width="20%" colspan="2">Normal Range</th>
                            {{-- <th width="20%">Price</th> --}}
                            <th style="width: 5%; text-align: center;">
                                <i class="fa fa-trash" style="opacity:0.5; filter:alpha(opacity=50);"></i>
                            </th>
                        </tr>

                    <tbody class="ui-sortable clone d-none ">
                        {{--                         
                        @foreach ($tests as $test1)
                            
                       
                            
                        
                        <tr class="control-group">
                        <td><input name="name_test[]"  class="form-control" type="text" value="{{$test1->name}}"></td>
                        <td><input name="result[]" class="form-control" type="text" value=""></td>
                        <td><input name="range[]" class="form-control" type="text"
                                value="&#8595; {{$test1->min_male}} || {{$test1->max_male}}&#8593;"></td>
                        <td><input name="price[]" class="text-center form-control" type="text"
                                value="{{$test1->Price}}"></td>
                        <td class="" style="width: 5%; text-align: center;">
                            <a class="delete text-danger"><i class="fa fa-trash "></i></a>
                        </td>
                        </tr>


                        @endforeach --}}
                    </tbody>
                </table>
            </div>




            <div class="group row">
                <div class=" row col-8">
                    <h5 class="mt-2 ml-3"> Total :</h5><input type="text" class=" form-control col-2" name="Total_price" id="val1" value="0">

                    <label for="" class="mt-2" style="margin-left: 130px;">Duc :</label>
                    <input class="ml-2 form-control col-3 " name="duc" type="text" value="00">
                </div>
                <div class="text-right col-4">
 {{--
                    <a href="http://localhost/pharma/public/show" class="btn btn-sm ">
                        <button type="button" class="mb-1 btn btn-warning ">Print</button></a> --}}
                    <input type="submit" value="Save" class="mb-1 btn btn-success">
                    {{-- <button type="button" class="mb-1 btn btn-secondary">Left</button> --}}

                </div>
            </div>
        </form>
    </div>

    {{-- all category --}}
<div class="p-2 border col-7 "  style="height: 900px; min-height: 278px;  ">
    <button class="btn btn-success" onclick="Finsh()">finsh</button>
    <livewire:all-test  />
</div>


</div>



{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- jQuery CDN --> --}}
<script type="text/javascript" src="{{asset('assets/ajax.js')}}"></script>


<script type='text/javascript'>

$('#search').on('keyup',function(){
  
$value=$(this).val();
$.ajax({
type : 'get',
url : '{{ route("search1") }}',
data:{'search':$value},
success:function(data){
$('.get_but').html(data);
}
});
});

</script>


<script type='text/javascript'>

function Finsh() {
//    $("#table_test").removeClass("col-5");
   $("#table_test").addClass("col-12"); 
   $('.goback').removeClass("d-none")
}
function goback() {
    $("#table_test").removeClass("col-12"); 
    $('.goback').addClass("d-none")
}


function remove(id, price)
{
    console.log("remove id"+id);
    console.log("price: "+price);

    let sub2 = $("#val").val();
    $("#val").val(sub2 - parseFloat(price) );

    let sub1 = $("#val1").val();
    $("#val1").val(sub1 - parseFloat(price) );

    let number = parseFloat( $('#number').val());
 let number2 =  $("#number").val(parseFloat(number) - 1);

 $( ".catygory" ).prop( "disabled", false );
    $("body").on("click",".delete",function(){
      $(this).parents(".control-group").remove();
            });
}


    function get_data(id1 , price) {
        var checkBox = document.getElementById("checkBox");
    
     
     let number = parseFloat( $('#number').val());
        $.ajax({
            url: 'getData/' + id1,
            type: 'get',
            dataType: 'json',
            success: function (response) {
console.log(response);
var tr_str;
if (response['data'].Range == "" ) {
 
    
 tr_str =  

 "<tr class='control-group'> " +
'<input name="category[]"  class="border-0 form-control" type="hidden" value="'+response['data'].category+'">'+
'<input name="unit[]"  class="border-0 form-control" type="hidden" value="'+response['data'].Unit+'">'+
' <td><input name="name_test[]"  class="border-0 form-control" type="text" value="'+response['data'].name+'"></td>' +
 '<td><select  class="border-0 form-control jssellect" name="result[]"><option value="" hidden>Select</option><option value="positive">positive</option><option value="negative">negative</option></select></td>' +
// '<td><input name="result[]" class="form-control" type="text" value=""></td>'+ 
'<td class="text-center"><input name="Range[]" class="border-0 form-control" type="hidden" value="'+response['data'].Range+ '"> </td>'+ 
// '<td class="text-center d-none"><input name="max_range[]" class="border-0 form-control" type="hidden" value="'+ response['data'].Range +' "> </td>'+ 
// '<td class="text-center"><input name="name_R[]" class="border-0 form-control" type="hidden" value="'+response['data'].Range+ '"> </td>'+ 
// '<td class="text-center d-none"><input name="max_frange[]" class="border-0 form-control" type="hidden" value="'+ response['data'].max_female +' "> </td>'+
// '<td><input name="price[]" class="border-0 form-control" type="text" value="'+response['data'].Price+'"></td>'+ 
' <td class="" style="width: 5%; text-align: center;"><a class="delete text-danger" onclick="remove('+response['data'].id+','+response['data'].Price+')"><i class="fa fa-trash "></i></a></td>'+
"</tr>";
}
else{
    const test = response['data'].Range;

const obj2 = JSON.parse(test);
 let number2 =  $("#number").val(parseFloat(number) + 1);
var  name = "" ;
var dt_name = "";
var max = "";
var min = "";
   

Object.entries(obj2).forEach((entry) => {
  const [key, value] = entry;
var name = `${value['name']}`;
var max = `${value['max']}`;
var min = `${value['min']}`;

if ( name ==  "null" ) {
    console.log("nullllll");
    
}else{
    if (min == "null") {
        dt_name +=`${value['name']}` +' ( '+`${value['max']}` +' > '+' ) '+response['data'].Unit+'<--> ';
      
    }else if (max == "null") {
        dt_name +=`${value['name']}` +' ( '+' < '+`${value['min']}`+' )'+response['data'].Unit+' <--> ';
      
    }else{
         dt_name +=`${value['name']}` +' ( '+`${value['max']}` +' - '+`${value['min']}`+' ) '+response['data'].Unit+' <--> ';

    }
}
// console.log(name_range);
 tr_str =
      "<tr class='control-group'> " +
        '<input name="category[]"  class="border-0 form-control" type="hidden" value="'+response['data'].category+'">'+
'<input name="unit[]"  class="border-0 form-control" type="hidden" value="'+response['data'].Unit+'">'+
' <td><input name="name_test[]"  class="border-0 form-control" type="text" value="'+response['data'].name+'"></td>' +
//  '<td><select style="width:200px" class="form-control jssellect" name="result[]"><option value="">Select</option><option value="positive">positive</option><option value="negative">negative</option></select></td>' +
'<td><input name="result[]" class="border-0 form-control" type="text" value=""  required></td>'+
'<td><input name="Range[]" class="border-0 form-control" type="hidden" value="'+dt_name+'" >'+dt_name+'</td>'+
// '<td class="text-center " colspan="2" ><input name="name_R[]"  class="border-0 form-control" type="hidden" value="'+name+'">  '+dt_name+' <input name="max_range[]"  class="border-0 form-control" type="hidden" value="'+max+'"> <input name="min_range[]"  class="border-0 form-control" type="hidden" value="'+min+'">  </td>'+
// '<td class="text-center "> ' +'</td>'+
' <td class="" style="width: 5%; text-align: center;"><a class="delete text-danger" onclick="remove('+response['data'].id+','+response['data'].Price+')"><i class="fa fa-trash "></i></a></td>'+
"</tr>";
// console.log(dtt);
  console.log(`${key}: ${value['max']} : ${value['min']}`);
  
});
// '<td><input name="price[]" class="border-0 form-control" type="text" value="'+response['data'].Price+'"></td>'+ 

}
$(".increment").append(tr_str);
        }
        });

    //     let sub = $("#val").val();
    // $("#val").val(parseFloat(sub) +price );
    
    // let sub2 = $("#val1").val();
    // $("#val1").val(parseFloat(sub2) +parseFloat(price) );

    if (number >= 15) {
    console.log('brwa');
    $( ".catygory" ).prop( "disabled", true );

}

   

    }
    

</script>






{{-- <div class="row"><div class="col-md-6"><div class="form-group"><label for="exampleInputFile">Male Range</label><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"> <i class="fas fa-arrow-down"></i></span></div><input name="min_male" step="any" id="min_male" type="number" class="form-control"><input name="max_male" step="any" id="max_male" type="number"class="form-control"><div class="input-group-append"><span class="input-group-text"> <i class="fas fa-arrow-up"></i></span></div></div></div></div> --}}





@endsection
