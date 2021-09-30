<div>
    <style>
        * {
            font-size: 15px;
        }

    </style>




    <div class=" m-3">
        <h3>Crate Order</h3>
    </div>
    <div class=" row ml-5">
        <div class="col-5 p-3 bg-info m-2">
            <div class="row">
                <div class="col-md-10">
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Patient</label>
                    <select class="custom-select my-1 mr-sm-2 " wire:model='patient' id="test-card">
                        <option selected hidden>Choose...</option>
                        @foreach($pten as $key )
                        <option value="{{$key->id}}">{{$key->name}} </option>
                        @endforeach


                    </select>

                </div>
                <div class="col-md-2 " style="margin-top:35px">
                    <button type="button" data-toggle="modal" data-target="#new-patient-modal" class="btn btn-default"
                        name="button"> <i class="fa fa-plus"></i> </button>
                </div>

            </div>

            <div class="card-body">
                <table class="table table-sm text-left">

                    @if(!is_null($get_petient))

                    @foreach($get_petient as $key )
                   
                    <tbody>
                        <tr>
                            <td class="text-left text-capitalize" style="width:120px;">Name</td>
                            <td id="pname" class="text-left text-capitalize"  >
                                {{ $key->name }}
                              
                               
                            </td>
                        </tr>

                        <tr>
                            <td class="text-left text-capitalize">Gender</td>
                            <td id="pgender" wire:model='gender' class="text-left text-capitalize">
                               {{ $key->Gender }}
                               
                               </td>
                        </tr>
                        <tr>
                            <td class="text-left text-capitalize">Phone</td>
                            <td id="pphone" class="text-left text-capitalize">{{$key->Phone}}</td>
                        </tr>
                        <tr>
                            <td class="text-left text-capitalize">Address</td>
                            <td id="paddress" class="text-left text-capitalize">{{$key->Address}}</td>
                        </tr>
                       
                        @endforeach
                        @else

                    <tbody>
                        <tr>
                            <td class="text-left text-capitalize" style="width:120px;">Name</td>
                            <td id="pname" class="text-left text-capitalize"></td>
                        </tr>

                        <tr>
                            <td class="text-left text-capitalize">Gender</td>
                            <td id="pgender" class="text-left text-capitalize"></td>
                        </tr>
                        <tr>
                            <td class="text-left text-capitalize">Phone</td>
                            <td id="pphone" class="text-left text-capitalize"></td>
                        </tr>
                        <tr>
                            <td class="text-left text-capitalize">Address</td>
                            <td id="paddress" class="text-left text-capitalize"></td>
                        </tr>

                        @endif

                    </tbody>
                </table>
            </div>
            {{-- modal P --}}
            <div class="modal fade " id="new-patient-modal">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content bg-secondary">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" align="center"><b> New Patient</b></h4>
                        </div>
                        <div class="modal-body" style="overflow-y: scroll; padding: 10px;">
                            <form action="" class="form" method="POST" enctype="multipart/form-data">
                                @csrf

                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Name *</label>
                                            <input type="text" name="name" id="new_name" required class="form-control ">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Age *</label>
                                                    <input type="text" name="age" id="new_age" class="form-control ">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Gender *</label>
                                                    <select class="form-control " id="new_gender" name="gender">
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Blood Group</label>
                                                    <select class="form-control" name="blood" id="new_blood">
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Phone</label>
                                            <input type="text" name="phone" id="new_phone" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Address</label>
                                            <input type="text" name="address" id="new_address" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <input type="button" class="btn btn-lg btn-info" onclick="newpatientu()" value="Save">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"> Cancel</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- doctrs --}}
        <div class="col-5  bg-secondary m-2">


            <div class="row p-3">

                <div class="col-md-10">
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Doctors</label>
                    <select class="custom-select my-1 mr-sm-2" wire:model='doctor' id="inlineFormCustomSelectPref">
                        <option selected hidden>Choose...</option>
                        @foreach($doc as $key )
                        <option value="{{$key->id}} ">{{$key->name}} </option>
                        @endforeach
                    </select>

                </div>
                <div class="col-md-2 " style="margin-top:35px">
                    <button type="button" data-toggle="modal" data-target="#new-Doctor-modal" class="btn btn-default"
                        name="button"> <i class="fa fa-plus"></i> </button>

                </div>
            </div>
            <div class="card-body">
                <table class="table table-sm text-left">

                    <tbody>
                        @if(!is_null($get_doctor))
                        @foreach($get_doctor as $key )

                        <tr>

                            <td class="text-left text-capitalize" style="width:120px;">Name</td>
                            <td id="pname" class="text-left text-capitalize" name="name_d" wire:model.lazy="name_d">
                          {{ $key->name }}
                               
                               </td>
                        </tr>
                        <tr>
                            <td class="text-left text-capitalize">Phone</td>
                            <td id="pphone" class="text-left text-capitalize">{{$key->Phone}}</td>
                        </tr>
                        <tr>
                            <td class="text-left text-capitalize">Address</td>
                            <td id="paddress" class="text-left text-capitalize">{{$key->Address}} </td>
                        </tr>

                        @endforeach


                        @else

                        <tr>
                            <td class="text-left text-capitalize" style="width:120px;">Name</td>
                            <td id="pname" class="text-left text-capitalize"></td>
                        </tr>
                        <tr>
                            <td class="text-left text-capitalize">Phone</td>
                            <td id="pphone" class="text-left text-capitalize"></td>
                        </tr>
                        <tr>
                            <td class="text-left text-capitalize">Address</td>
                            <td id="paddress" class="text-left text-capitalize"></td>
                        </tr>

                        @endif
                    </tbody>
                </table>
            </div>

            <div class="modal fade" id="new-Doctor-modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-warning">
                        <div class="modal-header">
                            <h4 class="modal-title" id="userCrudModal"></h4>
                        </div>
                        <div class="modal-body">
                            <form name="userForm" action="{{ route('Doctors.store') }}" method="POST">
                                <input type="hidden" name="user_id" id="user_id">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Name:</strong>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Name" onchange="validate()">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Address:</strong>
                                            <input type="text" name="Address" id="Address" class="form-control"
                                                placeholder="Address" onchange="validate()">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Phone</strong>
                                            <input type="text" name="Phone" id="Phone" class="form-control"
                                                placeholder="Phone" onchange="validate()">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>percentage</strong>
                                            <input type="text" name="percentage" id="percentage" class="form-control"
                                                placeholder="percentage" onchange="validate()">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" id="btn-save" name="btnsave"
                                            class="btn btn-primary">Save</button>
                                        <a href="{{ route('Doctors.index') }}" class="btn btn-danger">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

 
    @if(!is_null($get_petient))


    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card card-light" style="" id="test-card">
                <form action="" class="mt-3" wire:submit.prevent='addpost'>

                    <input type="hidden" value="{{$name_p}}" >

                <div class="card-header bg-info">
                   <h4 class="col-1"> Test</h4>
                    {{-- <select class="form-control " name="search4" style="width:100%;" id="search4"
                        data-select2-id="search4" wire:model='category' tabindex="-1" aria-hidden="true">
                        <option value="" hidden>Select Test</option>
                        @foreach($test as $key )
                        <option class="" wire:click='AddRow()'  value="{{$key->id}}">{{$key->name}}</option>
                        @endforeach
                    </select></div>
                    @if (!is_null($get_test))
                         <button class="btn btn-success addMaterial" wire:click='AddRow()'><i
                            class="glyphicon glyphicon-plus"></i>Add</button>

                           
                    @endif --}}
                  

                    <div class="dropdown">
                        <button class="btn btn-secondary  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select Test
                        </button>
                        <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                            @foreach($test as $key )
                          <a class="dropdown-item"  wire:click.prevent='AddRow({{$key->id}})'  href="#">{{$key->name}}</a>
                         @endforeach

                        </div>
                      </div>

            </div>
                
                <div class="card-body">
                    <div class="table table-responsive">



                        {{-- <form class="form" method="post"> --}}

                            <table id="tb" class="table table-stripe table-hover">
                                <thead class="bg-info">
                                    <tr class="td">
                                        <th>Test</th>
                                        <th>Category</th>

                                        <th>Normal Range</th>
                                        <th>Result</th>
                                        <th>Note</th>
                                        <th>Delete</th>

                                    </tr>
                                </thead>
                                <tbody class="bMaterial">
                                   
                                <tbody id="tests">
                                    @if (!is_null($get_test))
                                   @foreach ($get_test as $item)
                                       
                                 
                                    <tr id="test5">
                                        <td name="name_t" >
                                           {{ $item->name}}
                                           
                                           
                                         </td>
                                        <td>{{$item->Item}}</td>
                                        <td> @if ($gender == 'male')
                                            @if ($item->Unit == "")

                                            @else
                                            <i class="fas fa-male"></i>
                                            <i class="fas fa-arrow-down"></i>
                                            {{$item->min_male}} ||
                                            <i class="fas fa-arrow-up"></i>
                                            {{$item->max_male}} 
                                                 @endif
                                            @else
                                            <i class="fas fa-female text-danger"></i>
                                            <i class="fas fa-arrow-down"></i>
                                            {{$item->min_female}} ||
                                            <i class="fas fa-arrow-up"></i>
                                            {{$item->max_female}}&nbsp;&nbsp;&nbsp;
                                             @endif 
                                        </td>
                                        <td>
                                            @if ($item->Unit == "")
                                                <select class="form-control" id="new_gender" wire:model='result' name="result[abc][]">
                                                <option value="negative">main.negative</option>
                                                <option value="positive">main.positive</option>
                                            </select>
                                             {{-- <input type="hidden" name="category[]" value="1">  --}}
                                            @else
                                          
                                            <input type="text" name="result" wire:model='result' class="form-control"/>
                                              @endif
                                            
                                        
                                        </td>
                                        <td><input type="text" name="note[]" class="form-control"> </td>
                                        <td><a href="#" class="btn btn-danger removeTest">X</a></td> 
                                         @endforeach
                                    </tr>
                                    @endif
                                </tbody>
                             
                                </tbody>
                            </table>
                            <button type="submit"  class="btn btn-info"> Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif
</div>


</div>

