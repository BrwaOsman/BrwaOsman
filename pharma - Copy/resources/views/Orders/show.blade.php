@extends('layouts.app')
@section('content')


<div class=" " style="min-height: 697px; ;">


    @php
    $i=1;
@endphp

    <div class="content">

        <div class="">
            <style type="text/css">
                * {
                    -webkit-print-color-adjust: exact;
                }
                p{
                    word-spacing: 10px;
                    font-size:20px;
                   
                }
                li{
                    list-style-type: none;
                    font-size:20px;
                     font-weight: bold;
                }

                td {
                    text-align: center;
                    /* padding-left: 20px; */
                    border-bottom: 1px solid rgb(81, 79, 79);
                    /* padding: 5px;
                    margin:5px; */
                }

                th {
                    text-align: center !important;
                    font-size: 20px;
                }
                   
               
                h3,
                h4,
                h2,
                h1 {
                    font-weight: bold;
                    font-family: 'Times New Roman', Times, serif
                }

                h6 {
                    font-weight: bold;
                    font-family: 'Times New Roman', Times, serif;
                    margin-right: 80px;
                }
             
                @media print {
    .main-footer {
        position: fixed;
        bottom: 0px;
        
     }
     .hhhh{
        position: fixed;
        top : 0px;

     }
}


              


            </style>

            <div class="ml-2 mr-2 text-center row bg-dark  divHeader" style="border-radius:40px 40px 0 0" >

                <div class="row">
                    <div class=" col-3 mt-2">
                        <img src="img/ss.jpg" width="150" height="150" class="img-fluid" style="border-radius: 20px;" alt="">
        
                    </div>
                    <div class=" col-9 row">
                        <div class="text-right row  mt-2" style="border-radius: 10px;">
                            <h3 style="text-align:right;" class="mr-5 col-4 text-light">Shifa Laboratory</h3>
                            <h3 style="text-align:right;" class="ml-5 col-5 text-light">تاقیگەی پزیشکی شیفا</h3>    
                            <h4 class=" col-4 text-danger">for Clinical Pathology</h4>
                             <h4 class=" ml-5 col-5 text-danger">بۆشیکاری نەخۆشی</h4>
        
        
                        </div>
                         <p class="w-100 "style="">هۆرمۆنات-ڤایرۆسات–پاراسایت- سیرۆلۆجی - هیماتۆلۆجی – بەکترۆلۆجی – بایۆکیمستری </p>
                    <span class="" style="margin-left: 250px;">*Cobas E411 * Cobas c111 * Swela</span>
                    </div>
                </div>
               
        
             <img src="img/img.png" width="100%" height="70px" alt="">
               

            </div>
           
           
           
            <div class="  ">
            @foreach ($order as $item)
            <div class="ml-2 mr-2 bg-dark  row" style="border-radius:0 0 40px 40px" >

                <label for="" class="mt-2 ml-3"> Patients name :</label>
                <input type="text" class="border-0 form-control bg-dark col-4" style="  font-size:24px;" name="" value=" {{$item->patient}}"
                    aria-describedby="helpId" placeholder="">
                <label for="" class="mt-2">Gender :</label>
                <input type="text" class="border-0 form-control bg-dark col-1" name="" value="{{$item->gender}}" id=""
                    aria-describedby="helpId" placeholder="">
                <label for="" class="mt-2">Age :</label>
                <input type="text" class="border-0 form-control bg-dark col-1" name="" value="{{$item->age}}" id=""
                    aria-describedby="helpId" placeholder="">
                <label for="" class="mt-2">Data :</label>
                <input type="text" class="border-0 form-control bg-dark col-2" name="" value=" {{$item->created_at}}" id=""
                    aria-describedby="helpId" placeholder="">

            </div>
            <!-- Table row -->
            <div class="ml-3 row" style="height: 1100px">
                <div class="col-12 table-responsive">
                    <table class="w-100">
                        <thead>
                            @php
                            $sum = 1;
                            $sum2= 1;
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
                                   <td class="bg-dark" style="width: 450px; border-radius:40px ">
                                    <h3><i>{{$test['name']}}</i></h3>
                                </td> 

                                <td  style="width: 450px">

                                    <h3 data-toggle="modal"
                                    data-target=".bd-example-modal-sm{{$i}}" class="result{{$i}}"> <i>{{$test['result']}}</i></h3>
                                    
                                    <div class="modal fade bd-example-modal-sm{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">result</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>

                                                </div>
                                                <div class="card-body">
                                                  
                                                   
                                                 <span onclick="btn1({{$i}})" class="btn btn-success p-3"></span>
                                                 <span onclick="btn2({{$i}})" class="btn btn-danger p-3"></span>
                                                 <span onclick="btn3({{$i}})" class="btn btn-warning p-3"></span>
                                                <span class="d-none">{{$i++}}</span> 
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <script>
  
                                            $(".bbb").click(function(){
                                          $(".Header").removeClass("d-none");
                                        });
                                        var i = 1;
                                        i++;
                                        function btn1(i) {
                                            $('.result'+i).addClass("bg-success");
                                            $('.result'+i).removeClass("bg-danger");
                                            $('.result'+i).removeClass("bg-warning");
                                        }
                                        function btn2(i) {
                                            $('.result'+i).addClass("bg-danger");
                                            $('.result'+i).removeClass("bg-success");
                                            $('.result'+i).removeClass("bg-warning");
                                        }
                                        function btn3(i) {
                                            $('.result'+i).addClass("bg-warning");
                                            $('.result'+i).removeClass("bg-danger");
                                            $('.result'+i).removeClass("bg-success");
                                        }
                                            </script>
                                    


                                </td>
                                @if ($id== 1)
                                    
                                
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
                                  @endif
                               
                             </tr>
                              @endif
                            @endforeach
                                 @endforeach
                          
                        </tbody>
                    @endforeach
                   </table>
                   
                </div>
                <!-- /.col -->
            </div>
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
            <button onclick="window.print()" class="btn btn-info "><i class="bbb fas fa-print"></i>
              <span  class="bbb">Print</span>  </button>

        </div>
    </div>
</div>

</div>
</div>

</div>





<footer class="main-footer bg-dark " style="width: 100%; margin-top:100px; border-radius: 20px">
    <div class="float-right d-none d-sm-block">
        <b style="font-size: 20px"> ناونیشان : چەمچەماڵ-شەقامی پزیشکان- بەرامبەرگەراجی تەکیە</b>
            <br>
           <p class="text-right"  style="font-size: 20px"> ژ.م: 07510319385 – 07502931517  </p>
    </div>
    <strong>            Fb:تەلاری پزیشکی شیفا
        <br>      Copyright &copy; 2020 - 2021 <a href="https://www.facebook.com/brwa.osman.902">Brwa osman</a> Programmer 

    </strong> 
</footer>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>



@endsection
