<div>
    <style>
          *{
                   -webkit-print-color-adjust: exact; 
               }
    </style>
    
    @if (session()->has('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
@endif
    <input type="hidden" wire:model='catagory.0' >
    <h3 class="text-center bg-info m-1" style="border-radius: 10px">General Stool Examination</h3>
        <div class="row m-3">
            <div class="form-group col-5 row">
                <label for="" class="mt-2 ml-1 mr-1">NAME: </label>
                <input type="text" name="name_p" class="form-control col-9" wire:model='Name_p' placeholder="patient name" required>
            </div>
            <div class="form-group col-2">
    
                <select id="inputState" name="gender" wire:model='gender' class="form-control">
                    <option selected hidden>Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group col-3 row">
                <label for="" class="mt-2 ">Phone: </label>
                <input type="phone" class="form-control col-8" wire:model='phone' name="phone_p" placeholder="Phone">
            </div>
            <div class="form-group col-2 row">
                <label for="" class="mt-2 ml-1 mr-1">Age: </label>
                <input type="text" class="form-control col-7" wire:model='age' name="age" value="00">
            </div>
        </div>

     <div class="col-12 row">
    @php
       $gued = array ('Direct', 'Color','R.B.Cs','Pus Cells','Ova','Cyst','Rota Virus');
        $gued1 = array( 'Fecal Occult blood',
    'Calprotectin test','H.pylori  Ag test','PH','Reducing Substance','Others'
        )
    @endphp
    <div class="col-6">
         <table class="table">
             <thead>
                 <tr class="bg-dark text-center">
                    <th>NAME</th>
                    <th>RESULT</th>
                 </tr>
             </thead>  
             @foreach ($gued as $key=> $item)
             <tbody>
         {{-- <input type="hidden" value="{{$item}}"  wire:model='name'> --}}
              <tr class="bg-info text-center">
                          <th class=""><input type="text"  wire:model='name.{{$key}}' class="form-control border-0" 	disabled >
                          </th>
                          <td><input type="text"  wire:model='result.{{$key}}' class="form-control text-center"></td>
                       
                 </tr>
             </tbody> 
              @endforeach
              
         </table></div>
         <div class=" col-6">
             <table class="table">
            <thead>
                <tr class="bg-dark text-center">
                    <th>NAME</th>
                    <th>RESULT</th>
                 </tr>
            </thead>  
            @foreach ($gued1 as $key => $item )
            <tbody>
             <tr class="bg-info text-center">
                 
                         <th> 
                             <input type="text"  wire:model='name.{{$key+7}}' class="form-control border-0"disabled>
                            </th>
                         <td><input type="text" wire:model='result.{{$key+7}}' class="form-control text-center"></td>
                      
                       
                </tr>
            </tbody> 
             @endforeach
             
        </table>
         </div>
      
         <input wire:click.prevent="add_oarder()" class="btn btn-success form-control m-3 text-center" value="Send">
 @foreach ($result as $item)
     {{$item}}
 @endforeach
  
        </div> 

    </div>
    
