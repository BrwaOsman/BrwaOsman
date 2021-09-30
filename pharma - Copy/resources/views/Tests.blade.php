@extends('layouts.my')

@section('content')

<link href="{{ asset('assets/dataTable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{asset('assets/dataTable/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/dataTable/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/dataTable/buttons.print.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/dataTable/dataTables.buttons.min.js')}}"></script>

<script>
    error = false

    function validate() {
        if (document.userForm.name.value != '' && document.userForm.email.value != '')
            document.userForm.btnsave.disabled = false
        else
            document.userForm.btnsave.disabled = true
    }

</script>



{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
<link href="{{ asset('assets/dataTable/bootstrap.min.css') }}" rel="stylesheet">

<h2 class="mb-4 bg-white">Tests</h2>



<div class="">

    <!-- Button trigger modal -->
    <button type="button" class="m-3 btn btn-info" data-toggle="modal" data-target=".bd-example-modal-xl"> Create New
      Test
    </button>

    <!-- Modal -->

    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">create test</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{--  --}}
                <div class="card-body">
             {{-- <livewire:range> --}}


                <form   action="{{ route('addT') }}" method="POST" enctype="multipart/form-data">  
                    <div class="row">
                        @csrf
                        {{csrf_field()}}
               
                  
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="exampleInputFile">Name *</label>
                                    <input type="text"  name="name" class="form-control ">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputFile">Unit</label>
                                    <input type="text" id="unit" name="unit" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                               
                                    <label for="exampleInputFile">Category</label>
                                    <select class="form-control jssellect"  id="id_category" name="id_category">
                                        <option value="" >  Select</option>
                                        @foreach($ctge as $key )
                                        <option value="{{$key->name}}">{{$key->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 d-none">
                                <div class="form-group">
                                    <label for="exampleInputFile" wire:model="price">Price *</label>
                                    <input type="number" id='price' value="00" name="price" class="form-control ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Max Color</label>
                                    <select class="form-control jssellect"  id="max_color" name="max_color">
                                     
                                        <option value="bg-danger">Red</option>
                                        <option value="bg-warning">Yellow</option>
                                        <option value="bg-primary">Blue</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Min Color</label>
                                    <select class="form-control jssellect"  id="min_color" name="min_color">
                                       <option value="bg-warning">Yellow</option>  
                                        <option value="bg-danger">Red</option>
                                       
                                        <option value="bg-primary">Blue</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                         
                <div class="col-4 ">
                    <div class="form-group">
                      
                        <label for="exampleInputFile"><input  name="name_range[]" class="form-control" placeholder="Name Rnage"  type="text"></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            
                            </div>
                            <input step="any" name="min_range[]" id="min_female" type="number"
                            class="form-control " placeholder="min">
                        <input  step="any" name="max_range[]" id="max_female" type="number"
                            class="form-control" placeholder="max">
                        <div class="input-group-append">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 ">
                    <div class="form-group">
                       
                        <label for="exampleInputFile"><input  name="name_range[]" class="form-control"  type="text" placeholder="Name Rnage"></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            
                            </div>
                            <input step="any" name="min_range[]" id="min_female" type="number"
                                class="form-control " placeholder="min">
                            <input  step="any" name="max_range[]" id="max_female" type="number"
                                class="form-control" placeholder="max">
                            <div class="input-group-append">
                               
                            </div>
                        </div>
                    </div>
                </div>
  
               

                <div class="p-2 m-1 col-2">
                     <span onclick="addRange()" class="btn btn-success ">Add</span>
                </div>
             
                
        
              
         <div class="row Range_all">
        
          {{--
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputFile"><input   name="name_range[]" class="form-control" type="text"></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                           
                        </div>
                        <input  step="any" name="min_range[]"  id="min_male" type="number"
                            class="form-control">
                        <input  step="any"  name="max_range[]" id="max_male" type="number"
                            class="form-control">
                        <div class="input-group-append">
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputFile"><input name="name_range[]" class="form-control" type="text"></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                         
                        </div>
                        <input  step="any" name="min_range[]" id="min_female" type="number"
                            class="form-control">
                        <input step="any" name="max_range[]" id="max_female" type="number"
                            class="form-control">
                        <div class="input-group-append">
                          
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-2 m-1 col-2">
                  <button onClick="remove()" class="btn btn-danger btn-sm">delete</button>
            </div>
         --}}
        </div>
         
            
        
        
        
        
                            <div class="col-md-6">
                                <div class="form-group">
        
                                    <label class="text-center form-control">Positive/negative test</label>
                                    <input type="checkbox" class="form-control" id="positive" value="po"
                                        name="positive">
                                </div>
                            </div>
                        </div>
                    </div>
                  {{--    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputFile">Group Of Tests</label>
                            <div class="bootstrap-switch-null bootstrap-switch-undefined bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-focused bootstrap-switch-animate"
                                style="width: 88px;">
                               <div class="bootstrap-switch-container" style="width: 129px; margin-left: 0px;">
                                    <div class="bootstrap-switch-off bootstrap-switch-id-switch bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate" style="width: 86px;">
              <div class="bootstrap-switch-container" style="width: 126px; margin-left: -42px;">
                <span class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 43px;">ON</span>
                <span class="bootstrap-switch-label" style="width: 43px;">&nbsp;</span>
                <span class="bootstrap-switch-handle-off bootstrap-switch-danger" style="width: 43px;">OFF</span> 
                                    <input id="switch" type="checkbox" class="form-control" name="multi"
                                        data-bootstrap-switch="" data-off-color="danger" value="br"
                                        data-on-color="success">
                                   </div></div> 
                                </div>
                            </div>
                        </div>--}}
                    {{-- <br><br> --}}
                    {{-- agr fa7saka la bashyk zyatr bw --}}
                    {{-- <div id="data" name="data" class="card card-info" style="display:none">
                        <div class="card-header">
                            <h4>main.sub tests</h4>
                        </div> --}}
                        {{-- <div class="card-body">
                            <div class="table-responsive scrollme">
                                <table id="tb" class="table table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th style="width:200px">Name</th>
                                            <th style="width:200px">Unit</th>
                                            <th style="width:200px">Min Color</th>
                                            <th style="width:200px">Max Color</th>
                                            <th style="width:200px">Male Range</th>
                                            <th style="width:200px">Female Range</th>
                                            <th style="width:200px">Price</th>
        
                                            <th><a href="#" class="addMaterial"><i
                                                        class="fa fa-fw fa-plus"></i></a></th>
                                        </tr>
                                    </thead>
                                    <tbody class="bMaterial">
                                        <tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> --}}
                    {{-- </div> --}}
                {{-- </div> --}}
                <div class="text-center col-md-12">
                    <button class="btn btn-info btn-lg" style="width:300px">Save</button>
                </div>
            </form>
            </div>


                </div>
        </div>
    </div>
</div>

{{-- <div class="row">
        <div class="col-sm-12 col-md-4 ">
            <div class="dataTables_length" id="example_length"><label>Show <select name="example_length"
                        aria-controls="example" class="custom-select custom-select-sm form-control form-control-sm">
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="-1">All</option>
                    </select> </label></div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div id="example_filter" class="dataTables_filter"><label>Search:<input type="search"
                        class="form-control form-control-sm" placeholder="" aria-controls="example"></label></div>
        </div>
        <div class="mt-4 text-right col-sm-12 col-md-4">
            <div class="dt-buttons"> <button
                    class="dt-button buttons-excel buttons-html5 btn btn-outline-success btn-flat" tabindex="0"
                    aria-controls="example" type="button"><span>Excel</span></button> <button
                    class="dt-button buttons-print btn btn-outline-info btn-flat" tabindex="0" aria-controls="example"
                    type="button"><span>Print</span></button> </div>
        </div>
    </div> --}}


<table class="table m-2 table-striped yajra-datatable" id="example">
    <thead class="bg-info">
        <tr class="text-center">
            <th>id</th>
            <th>Name</th>
            <th>Unit</th>
            <th>Price</th>
            <th>Min Color</th>
            <th>Max Color</th>
            <th> Range</th>
            <th>Item </th>
            <th> action </th>
        </tr>
    </thead>
    <tbody>
        @foreach($tests as $test)
        <tr class="text-center">
            <td>{{$test->id}}</td>
            <td>{{$test->name}}</td>
            <td>{{$test->Unit}}</td>
            <td>{{$test->Price}}</td>

            <td>
                <div class="{{$test->Min_Color}}">&nbsp</div>


            </td>
            <td>
                <div class="{{$test->Max_Color}}">&nbsp</div>
            </td>
            {{-- <td>
                @if($test->min_male == "")

                @else
                <i class="fas fa-arrow-down"></i>
                {{$test->min_male}} ||
                <i class="fas fa-arrow-up"></i>
                {{$test->max_male}} </td>
            @endif

            <td> @if($test->min_female == "")

                @else

                <i class="fas fa-arrow-down"></i>
                {{$test->min_female}} ||
                <i class="fas fa-arrow-up"></i>
                {{$test->max_female}} </td>

            @endif --}}
                 @php
                         $ranges = json_decode($test->Range,true);
                @endphp
            <td class="mt-2 test-center" >
               
                @if (is_array($ranges) || is_object($ranges))
                     @foreach ($ranges as $range)

                @if ($range['name'] == null)
    
                @else

                @if ($range['min'] == null)
                {{$range['name']}} (> {{$range['max']}} )    <br>
                @elseif ($range['max'] == null)
                {{$range['name']}} (< {{$range['min']}} )  <br>
                @else
                {{$range['name']}}  ({{$range['min']}} --  {{$range['max']}})  <br>

                @endif
                @endif

                 
                @endforeach
                @endif
               
            </td>
            <td>
                @if ($test->multi == 1)
                <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#staticBackdrop{{$test->id}}"> item</button>

{{-- 


                <div class="modal fade bd-example-modal-xl" id="staticBackdrop{{$test->id}}" data-backdrop="static"
                    tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">

                        <div class="modal-content w-100">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">{{$test->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <table class="table table-striped table-inverse table-responsive">
                                    <thead class="bg-info">
                                        <tr>

                                            <th style="width:200px">Name</th>
                                            <th style="width:200px">Unit</th>
                                            <th style="width:200px">Min Color</th>
                                            <th style="width:200px">Max Color</th>
                                            <th style="width:200px">Male Range</th>
                                            <th style="width:200px">Female Range</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>


                                                            
                                          @foreach (json_decode($test->Item) as $key =>$value)
                                         
                                         <td> {{$value->name}}
            
            <td> {{$value->unit}}</td>
            <td>
                <div class=" {{$value->Min_Color}}">&nbsp</div>
            </td>
            <td>
                <div class=" {{$value->Max_Color}}">&nbsp</div>
            </td>
            <td> @if($value->min_male == "")

                @else

                <i class="fas fa-arrow-down"></i>
                {{$value->min_male}} ||
                <i class="fas fa-arrow-up"></i>
                {{$value->max_male}}
                @endif
            </td>
            <td>
                @if($value->min_male == "")

                @else
                <i class="fas fa-arrow-down"></i>
                {{$value->min_female}} ||
                <i class="fas fa-arrow-up"></i>
                {{$value->max_female}}
                @endif
            </td>
        
        @endforeach

       
</tr>

    </tbody>

</table> 

</div>
<div class="m-2">
    <button type="button" class="btn btn-danger w-25 " data-dismiss="modal">Close</button>

</div>
</div>
</div>
</div>--}}

@else
--
@endif
</td>
<td>
    <a href="#" class="btn btn-xs btn-primary edit" data-toggle="modal"
        data-target=".bd-example-modal-xl{{$test->id}}"><i class="fas fa-edit"></i></a>


{{-- Modal eidt --}}

<div class="modal fade bd-example-modal-xl{{$test->id}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">create test</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {{--  --}}
        <form action="Tests2/{{$test->id}}" id="formG" method="POST" enctype="multipart/form-data">

            @csrf
            {{csrf_field()}}
            <div class="card-body">
                {{-- <input type="hidden" name="_token" value="m44tU3AXbI7yDDf0OxZ1qMHdSTr9E7MSupveQ7pL">
<input type="hidden" name="_token" value="m44tU3AXbI7yDDf0OxZ1qMHdSTr9E7MSupveQ7pL"> --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="exampleInputFile">Name *</label>
                                    <input type="text" name="name" value='"{{$test->name}}"'class="form-control ">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputFile">Unit</label>
                                    <input type="text" id="unit" name="unit" value='"{{$test->Unit}}"' class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Category</label>
                                    <select class="form-control jssellect" id="id_category" value="" name="id_category">
                                        <option value="{{$test->category}}">{{$test->category}}</option>
                                        @foreach($ctge as $key )
                                        <option value="{{$key->name}}">{{$key->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 d-none">
                                <div class="form-group">
                                    <label for="exampleInputFile">Price *</label>
                                    <input type="number" id='price' value='"{{$test->Price}}"' name="price" class="form-control ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Max Color</label>
                                    <select class="form-control jssellect" id="max_color" name="max_color">
                                       
                                        <option value="bg-danger">Red</option>
                                        <option value="bg-warning">Yellow</option>
                                        <option value="bg-primary">Blue</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Min Color</label>
                                    <select class="form-control jssellect" id="min_color" name="min_color">
                                        <option value="bg-warning">Yellow</option>
                                        <option value="bg-danger">Red</option>
                                        <option value="bg-primary">Blue</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                           
                            @php
                            $ranges = json_decode($test->Range,true);
                   @endphp
             
                  
                   @if (is_array($ranges) || is_object($ranges))
                        @foreach ($ranges as $range)
        
                  
      <div class="col-4 ">
        <div class="form-group">
          
            <label for="exampleInputFile"><input value="{{$range['name']}}"  name="name_range[]" class="form-control" placeholder="Name Rnage"  type="text"></label>
            <div class="input-group">
                <div class="input-group-prepend">
                
                </div>
                <input step="any" value="{{$range['min']}}" name="min_range[]" id="min_female" type="number"
                class="form-control " placeholder="min">
            <input value="{{$range['max']}}"  step="any" name="max_range[]" id="max_female" type="number"
                class="form-control" placeholder="max">
            <div class="input-group-append">
                    
                </div>
            </div>
        </div>
    </div>
   
                    
                   @endforeach
                   @endif
                
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label class="text-center form-control">Positive/negative test</label>
                                    <input type="checkbox" class="form-control" id="positive" value="po"
                                        name="positive">
                                </div>
                            </div>
                        </div>
                    </div>
                  {{--    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputFile">Group Of Tests</label>
                            <div class="bootstrap-switch-null bootstrap-switch-undefined bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-focused bootstrap-switch-animate"
                                style="width: 88px;">
                               <div class="bootstrap-switch-container" style="width: 129px; margin-left: 0px;">
                                    <div class="bootstrap-switch-off bootstrap-switch-id-switch bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate" style="width: 86px;">
              <div class="bootstrap-switch-container" style="width: 126px; margin-left: -42px;">
                <span class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 43px;">ON</span>
                <span class="bootstrap-switch-label" style="width: 43px;">&nbsp;</span>
                <span class="bootstrap-switch-handle-off bootstrap-switch-danger" style="width: 43px;">OFF</span> 
                                    <input id="switch" type="checkbox" class="form-control" name="multi"
                                        data-bootstrap-switch="" data-off-color="danger" value="br"
                                        data-on-color="success">
                                   </div></div> 
                                </div>
                            </div>
                        </div>--}}
                    <br><br>
                    {{-- agr fa7saka la bashyk zyatr bw --}}
                    <div id="data" name="data" class="card card-info" style="display:none">
                        <div class="card-header">
                            <h4>main.sub tests</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive scrollme">
                                <table id="tb" class="table table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th style="width:200px">Name</th>
                                            <th style="width:200px">Unit</th>
                                            <th style="width:200px">Min Color</th>
                                            <th style="width:200px">Max Color</th>
                                            <th style="width:200px">Male Range</th>
                                            <th style="width:200px">Female Range</th>
                                            <th style="width:200px">Price</th>

                                            <th><a href="#" class="addMaterial"><i
                                                        class="fa fa-fw fa-plus"></i></a></th>
                                        </tr>
                                    </thead>
                                    <tbody class="bMaterial">
                                        <tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center col-md-12">
                    <button class="btn btn-info btn-lg" style="width:300px">Save</button>
                </div>
            </div>

    </div>
    </form>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
</div>
</div>



    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <a href="#" type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$test->id}}">
        <i class="fas fa-trash"></i>
    </a>
</td>



<!-- Modal Delete -->
<div class="modal fade" id="delete{{$test->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="text-center modal-body"> <i class="p-3 fas fa-trash text-danger"
                    style="font-size: 80px;  border:2px red solid; border-radius:50px"></i>
                <p class="text-secondary" style="font-size: 30px; "> Are you sure? </p>
                <p class="text-secondary"> Do you really want to delete these records? This process cannot be
                    undone. </p>
            </div>


            <div class="mb-3 text-center ">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="Tests/{{$test->id}}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>


{{-- modale Edit --}}
</tr>
@endforeach
</tbody>


</table>




<!-- Modal  Item-->





</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            scrollCollapse: true,
            paging: true,
            fixedColumns: true,
            "lengthMenu": [
                [10, 100, 200, -1],
                [10, 100, 200, "All"]
            ],
            footer: true,
            dom: "<'row'<'col-sm-12 col-md-4' l><'col-sm-12 col-md-4 'f><'col-sm-12 col-md-4 text-right'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-6' i><'col-sm-12 col-md-6'p>>",
            buttons: [{
                    extend: 'excel',
                    className: 'btn btn-outline-info btn-flat',
                    footer: true,
                },
                {
                    extend: 'print',
                    className: 'btn btn-outline-info btn-flat',
                    footer: true,
                    customize: function (win) {
                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend();

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');

                    }
                },

            ],
        });

    });

    $('#positive').change(function () {
        if ($(this).is(':checked')) {
            document.getElementById("unit").disabled = true;
            document.getElementById("max_color").disabled = true;
            document.getElementById("min_color").disabled = true;
            document.getElementById("min_male").disabled = true;
            document.getElementById("max_male").disabled = true;
            document.getElementById("min_female").disabled = true;
            document.getElementById("max_female").disabled = true;
        } else {
            document.getElementById("unit").disabled = false;
            document.getElementById("max_color").disabled = false;
            document.getElementById("min_color").disabled = false;
            document.getElementById("min_male").disabled = false;
            document.getElementById("max_male").disabled = false;
            document.getElementById("min_female").disabled = false;
            document.getElementById("max_female").disabled = false;
        }
    });
    $("input[data-bootstrap-switch]").each(function (e, data) {
        // $(this).bootstrapSwitch('state', $(this).prop('checked'));

        $('#switch').bootstrapSwitch('state', !data, true);
        // console.log("ddd");
    });
    // $("#switch").bootstrapSwitch();

    $('#switch').on('switchChange.bootstrapSwitch', function (e, data) {
        var x = document.getElementById("switch").checked;
        if (x == true) {
            document.getElementById('data').style.display = 'block';
            document.getElementById("unit").disabled = true;
            document.getElementById("max_color").disabled = true;
            document.getElementById("min_color").disabled = true;
            document.getElementById("min_male").disabled = true;
            document.getElementById("max_male").disabled = true;
            document.getElementById("min_female").disabled = true;
            price
            document.getElementById("max_female").disabled = true;
            document.getElementById("price").disabled = true;

        } else {
            document.getElementById('data').style.display = 'none';
            document.getElementById("unit").disabled = false;
            document.getElementById("max_color").disabled = false;
            document.getElementById("min_color").disabled = false;
            document.getElementById("min_male").disabled = false;
            document.getElementById("max_male").disabled = false;
            document.getElementById("min_female").disabled = false;
            document.getElementById("max_female").disabled = false;
            document.getElementById("price").disabled = false;

        }
    });

    $('.addMaterial').on('click', function () {
        addMaterial();
    });

    function addMaterial() {
        var tr = '<tr>' +
            '<td><input style="width:200px" class="form-control" type="text" name="it_name[]" required></td>' +
            '<td><input style="width:200px" class="form-control" type="text" name="it_unit[]" required></td>' +
            '<td><select style="width:200px" class="form-control jssellect" name="it_min_color[]"><option value="">Select</option><option value="bg-danger">Red</option><option value="bg-warning">Yellow</option><option value="bg-primary">Blue</option></select></td>' +
            '<td><select style="width:200px" class="form-control jssellect" name="it_max_color[]"><option value="">Select</option><option value="bg-danger">Red</option><option value="bg-warning">Yellow</option><option value="bg-primary">Blue</option></select></td>' +
            '<td><div style="width:200px" class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-arrow-down"></i></span></div><input name="it_min_male[]" step="any" type="number" class="form-control"><input name="it_max_male[]" step="any" type="number" class="form-control"><div class="input-group-append"><span class="input-group-text"><i class="fas fa-arrow-up"></i></span></div></div></td>' +
            '<td><div style="width:200px" class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-arrow-down"></i></span></div><input name="it_min_female[]" step="any" type="number" class="form-control"><input name="it_max_female[]" step="any" type="number" class="form-control"><div class="input-group-append"><span class="input-group-text"><i class="fas fa-arrow-up"></i></span></div></div></td>' +
            '<td><input style="width:200px" class="form-control" type="text" name="it_price[]" required></td>' +
            '<td><a href="#" class="btn btn-danger removeMaterial">X</td>' +
            '</tr>';
        $('.bMaterial').append(tr);
    };
    // $('.removeMaterial').on('click',function(){
    //     var last=$('.bMaterial tr').length;
    //     if(last==1){
    //         alert('at lease one column required');
    //     }else{
    //       e.preventDefault();
    // $(this).closest('tr').remove();
    //     }
    // });

    $("#tb").on('click', '.removeMaterial', function () {
        var last = $('.bMaterial tr').length;
        if (last == 1) {
            alert('at lease one column required');
        } else {
            $(this).closest('tr').remove();
        }
    });
var i= 0;
    function addRange() {
        i++;
        // console.log(i);
       var Range =
      ' <div class="rangesss'+i+' row">'+
        '<div> <span class="btn btn-info btn-sm " onclick="togethr('+i+')"></span> </div>'+
     '  <div class="col-md-4 double_range'+i+'">'+
               ' <div class="form-group">'+
                   ' <label for="exampleInputFile"><input   name="name_range[]" class="form-control" type="text" placeholder="Name Rnage"></label>'+
                  '  <div class="input-group">'+
                      '  <div class="input-group-prepend">'+
                           
                      '  </div>'+
                       ' <input  step="any" name="min_range[]"  id="min_male" type="number" class="form-control" placeholder="min">'+
                           
                       ' <input  step="any"  name="max_range[]" id="max_male" type="number" class="form-control" placeholder="max"> <div class="input-group-append">'+
                           
                        '</div> </div> </div>  </div>'+
                   
           ' <div class="col-md-4 double_range'+i+' ">'+
             '   <div class="form-group">'+
                   ' <label for="exampleInputFile"><input name="name_range[]" class="form-control" type="text" placeholder="Name Rnage"></label>'+
               ' <div class="input-group"> <div class="input-group-prepend"> </div>'+
                       
                     '   <input  step="any" name="min_range[]" id="min_female" type="number" placeholder="min" class="form-control">'+
                          
                    '    <input step="any" name="max_range[]" id="max_female" type="number" placeholder="max" class="form-control">'+
                          
                     '   <div class="input-group-append"> </div>   </div>  </div>   </div>'+

                   '  <div class="m-3 col-6 row single_range'+i+' d-none">'+
                    '<span onclick="max_or_min('+i+')" class="m-1 btn btn-primary btn-sm">max or min</span> ' +
                   ' <input  name="name_range[]" class="ml-3 form-control col-5"  type="text" placeholder="Name Rnage">'+
                  '  <div class="text-center row">'+
                   ' <input type="number"  step="any" name="max_range[]" class="ml-2 text-white form-control d-none bg-danger col-6 ma'+i+'" placeholder="Max">'+
                   ' <input type="number"  step="any" name="min_range[]" class="ml-2 form-control col-6 bg-warning m'+i+'" placeholder="Min"> </div>  </div>'+

           ' <div class="p-2 m-1 col-2">  <span onclick="remove()" class="btn btn-danger delete btn-sm">delete</span> </div> </div>';
                
           $(".Range_all").append(Range);
    }
    function remove() {
        // console.log('brwa');
      
        $(".rangesss"+i).remove();
    //     $("body").on("click",".delete",function(){
    //   $(this).parents(".rangesss").remove();
    //         }); 
     i--;
    }
    function max_or_min(i) {
        $(".m"+i+"").toggleClass('d-none');
        $(".ma"+i+"").toggleClass('d-none');
    }
   

//     $('.select').click(function(){
//             if($(this).prop("checked") == true){
// console.log('brwa');
//                      $('.double_range').addClass('d-none');
//                      $('.single_range').removeClass('d-none')
//             }
//             else if($(this).prop("checked") == false){
//                 $('.double_range').removeClass('d-none');
//                 $('.single_range').addClass('d-none')
//             }
//         });

        function togethr(i) {
            $('.double_range'+i+'').toggleClass('d-none');
            $('.single_range'+i+'').toggleClass('d-none')
        }

</script>


@endsection
