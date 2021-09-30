@extends('layouts.my')
@section('content')


<div class="" style="min-height: 697px; background-color:#fff;">


   

    <div class="content">

        <div class="">
            <style type="text/css">

               *{
                   -webkit-print-color-adjust: exact; 
               }
                td {
                    text-align: center;
                  padding-left: 20px;
                }

                th {
                    text-align: center !important;
                    font-size:20px;
                }
            
             
                h3 , h4 , h2,h1{
                    font-weight: bold;
                    font-family: 'Times New Roman', Times, serif
                }
              
                h6{
                    font-weight: bold;
                    font-family: 'Times New Roman', Times, serif;
                  margin-right: 80px;
                }
            
                 
             
              
            </style>

<div class="m-2 text-center row" style="border: 2px solid teal; border-radius: 40px">
 
    
  
    <div class="ml-5 col-4">
        <h2 class="text-info" >Shifa Laboratory </h2>
        <h4 class="mt-2 text-danger">for Clinical Pathology</h4>
       <h6 class="text-dark" >هۆرمۆنات-ڤایرۆزات–پاراسایت- سیرۆلۆجی  
       - هیماتۆلۆجی – بەکتریالۆجی – بایۆکمیستری</h6> 
       <h6 class="text-dark " >*Cobas E411 * Cobas c111   *   Swela</h6>
    </div>
<div class="col-3">
    <img src="img/ss.jpg" class="" width="200"height="150" alt="">
</div>

    <div class=" col-3" style="float: right">
        <h2 class="text-info" >تاقیگەی پزیشکی شیفا</h2>
        <h4 class="mt-2 text-danger">بۆشیکاری نەخۆشی</h4>
        <h5 class="mt-5 text-dark" >بەتازەترین ئامێری پێشکەوتوو </h5>
      
    </div>

</div>
{{-- @foreach ($order as $item) --}}
<div class="ml-3 row">
   
      <label for="" class="mt-2"> Patients name :</label>
      <input type="text" class="border-0 form-control col-2" name="" value=" {{$item->patient}}" aria-describedby="helpId" placeholder="">
      <label for="" class="mt-2">Gender :</label>
      <input type="text" class="border-0 form-control col-2" name="" value="{{$item->gender}}" id="" aria-describedby="helpId" placeholder="">
      <label for="" class="mt-2">Age :</label>
      <input type="text" class="border-0 form-control col-2" name="" value="{{$item->age}}" id="" aria-describedby="helpId" placeholder="">
      <label for="" class="mt-2">Data :</label>
      <input type="text" class="border-0 form-control col-3" name="" value=" {{$item->created_at}}" id="" aria-describedby="helpId" placeholder="">
     
</div>
                <!-- Table row -->
                <div class="ml-3 row" style="height: 1200px">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                         
                            <thead>
                                @php
                               
                                $tests = json_decode($item->test,true);
                                $catagory1 = json_decode($item->category,true);
                                @endphp
                                <tr>
                                    @foreach ($catagory1 as $coty)
                                        <th colspan="3">
                                            <h3 class="bg-secondary" style="border-radius: 30px"><i>{{$coty['category']}}</i></h3>
                                        </th>
                                 
    
    
                                </tr>
                            </thead>
                            <tbody>
                                
                                    @foreach ($tests as $test)
                                    @if ($coty['category'] == $test['category'])
                                        
                                   
                                 <tr> 
                                       <td style="width: 450px; background-color:rgb(24, 180, 204); border-radius: 30px">
                                        <h3><i>{{$test['name']}}</i></h3>
                                    </td> 
                                    <td style="width: 450px">
                                        <h3><i>{{$test['result']}}</i></h3>
                                        
                                    </td>
                                    {{-- @if ($coty['category'] != 'General_StoolExamination' && $coty['category'] != 'General_Urin_Examiation_Deposite') --}}
                                        
                                    
                                    <td  style="width: 500px">
                                       {{-- <li> {{$test['Range']}}</li> --}}
                                      @foreach ($test_in_order as $test_o)
                                      @php
                                     
                                      $Range_all = json_decode($test_o->Range,true);
                                      @endphp
                                @if ($test['name'] == $test_o['name'])
                                         
                                   
                                       @if (is_array($Range_all) || is_object($Range_all))
                                      @foreach ($Range_all as $range)
                                      
                                      @if ($range['name'] == null)
        
                                      @else
                      
                                      @if ($range['min'] == null)
                                      {{$range['name']}} (> {{$range['max']}} ) {{$test_o['Unit']}}   <br>
                                      @elseif ($range['max'] == null)
                                      {{$range['name']}} (< {{$range['min']}} )  {{$test_o['Unit']}} <br>
                                      @else
                                      {{$range['name']}}  ({{$range['min']}} --  {{$range['max']}})  {{$test_o['Unit']}} <br>
                      
                                      @endif
                                      @endif
                                          
                                    
                                      @endforeach
                                      @endif
                                      
                                @endif
                                      @endforeach
                                      </td>  
                                      {{-- @endif --}}
                                   
                                 </tr>
                                  @endif
                                @endforeach
                                     @endforeach
                              
                            </tbody>

                            
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6">

                    </div>
                    <!-- /.col -->
                    {{-- <div class="col-6">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Subtotal:</th>
                                        <td>{{$all}}</td>
                                    </tr>
                                    <tr>
                                        <th>Discount:</th>
                                        <td>0</td>
                                    </tr>

                                    <tr>
                                        <th>Total:</th>
                                        <td>23,000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> --}}
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12">
                        <button onclick="window.print()" class="btn btn-info"><i class="fas fa-print"></i>
                            Print</button>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>


@endsection
