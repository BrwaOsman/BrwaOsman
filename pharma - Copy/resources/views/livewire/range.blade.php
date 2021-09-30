<div>


   
        {{-- <input type="hidden" name="_token" value="m44tU3AXbI7yDDf0OxZ1qMHdSTr9E7MSupveQ7pL">
<input type="hidden" name="_token" value="m44tU3AXbI7yDDf0OxZ1qMHdSTr9E7MSupveQ7pL"> --}}
     <form  wire:submit.prevent='addtest'>  
            <div class="row">

       
          
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="exampleInputFile">Name *</label>
                            <input type="text" wire:model="name" name="name" class="form-control ">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputFile">Unit</label>
                            <input type="text" id="unit" wire:model="unit" name="unit" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                       
                            <label for="exampleInputFile">Category</label>
                            <select class="form-control jssellect"  id="id_category" name="id_category">
                                <option value="" >  Select</option>
                                @foreach($caregory as $key )
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
                            <select class="form-control jssellect" wire:model="max_color" id="max_color" name="max_color">
                             
                                <option value="bg-danger">Red</option>
                                <option value="bg-warning">Yellow</option>
                                <option value="bg-primary">Blue</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputFile">Min Color</label>
                            <select class="form-control jssellect" wire:model="min_color" id="min_color" name="min_color">
                               <option value="bg-warning">Yellow</option>  
                                <option value="bg-danger">Red</option>
                               
                                <option value="bg-primary">Blue</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                          <div class="col-4">
            <div class="form-group">
              
                <label for="exampleInputFile"><input  name="name_range[]" wire:model='name_range' class="form-control" value="Male Range" type="text"></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      
                    </div>
                    <input  step="any" name="min_range[]"  id="min_male" type="number"
                        class="form-control ">
                    <input  step="any" id="max_male" name="max_range[]" type="number"
                        class="form-control">
                    <div class="input-group-append">
                        
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-4">
            <div class="form-group">
               
                <label for="exampleInputFile"><input  name="name_range[]" class="form-control" value="Female Range" type="text"></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    
                    </div>
                    <input step="any" name="min_range[]" id="min_female" type="number"
                        class="form-control ">
                    <input  step="any" name="max_range[]" id="max_female" type="number"
                        class="form-control">
                    <div class="input-group-append">
                       
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="p-2 m-1 col-2">
             <span wire:click='add({{$i}})' class="btn btn-success ">Add</span>
        </div>
        

      
  {{-- <div class="row ">
  @foreach ($inputs as $item => $value)

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
          <button wire:click.prevent='remove({{$item}})' class="btn btn-danger btn-sm">delete</button>
    </div>
     @endforeach
</div>
 
    --}}




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

     
     


