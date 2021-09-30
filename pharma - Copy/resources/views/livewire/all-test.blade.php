<div>

    <div class="container">
        {{-- <nav class="navbar navbar-expand-lg">
         
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active btn btn-info ml-2 tablinks"  onclick="openCity(event, 'get')" >
                  <a class="nav-link text-white all" data-toggle="modal" data-target=".bd-example-modal-xl" href="#">All Test</a>
                </li>
                <li class="nav-item active btn btn-info ml-2 tablinks" onclick="openCity(event, 'London')">
                  <a class="nav-link text-white all" href="#" >GUED test</a>
                </li>
                <li class="nav-item active btn btn-info ml-2 tablinks" onclick="openCity(event, 'Paris')">
                  <a class="nav-link text-white all"  href="#" >GSE Test</a>
                </li>
               
               
              </ul>
             
            </div>
        </div>
    </nav>

    <div id="London" class="tabcontent" style="display: none">
      <h3>London</h3>
      <p>London is the capital city of England.</p>
    </div>
     --}}
        
            {{-- <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content"> --}}
        
                  {{-- <div class="tabcontent" id="get" style="display: none"> --}}
                    <div class="row">
                      <div class="input-group col-5 mt-2 mb-2">
                          <input type="search" class="ml-1 form-control "  name="search" id="search" placeholder="Test Name">
                      <span class="input-group-btn">
                          {{-- <button type="submit" class="btn btn-success"> <i class="fas fa-search"></i> </button> --}}
                          </span>
                      </div>
                      <div class="input-group col-5 mt-2 mb-2">
                         
                      {{-- <span class="input-group-btn">
                          Name Test: {{$search}}
                         @foreach ($name as $item=>$value)
                           <span class="text-danger " style="font-size: 20px">{{$value}}</span>   <span>||</span>
                         @endforeach
                          
                          </span> --}}


<button  class="btn btn-info m-2" data-toggle="modal" data-target=".bd-example-modal-xl">GUED</button>


<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <livewire:g-u-e-d>
    </div>
  </div>
</div>

<button  class="btn btn-info m-2" data-toggle="modal" data-target="#GSE">GSE</button>


<div class="modal fade bd-example-modal-xl"id="GSE" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <livewire:g-s-e>
    </div>
  </div>
</div>


                      </div>
                   </div>
                      <div class="get_but  "  role="group" aria-label="Basic example"  style="height: 880px; min-height: 278px; overflow: scroll; ">
                          @foreach ($tests as $item)
                          {{-- @foreach (json_decode($item->Item) as $key=>$value) --}}
              
                          {{-- onclick="get_data({{$item->id}} , {{$item->Price}} )" --}}
                        
                              <button type="button"  onclick="get_data({{$item->id}} , {{$item->Price}} )" class="mb-1  btn catygory " id="catygory"
                                  @if ($item->category == "Hematology Test" )
                              style='width:150px; height:150px; background-color:red; color:white'
                              @elseif ($item->category == "Anemia and Thalassaemia")
                              style='width:150px; height:150px; background-color:#00BE9C; color:white'
                              @elseif ($item->category == "Infertility Hormones Examination")
                              style='width:150px; height:150px; background-color:#52D68A; color:white'
                              @elseif ($item->category == "General Urin Examiation Deposite")
                              style='width:150px; height:150px; background-color:#2A80B9; color:white'
                              @elseif ($item->category == "Prothrombin Time")
                              style='width:150px; height:150px; background-color:#8F44AD; color:white'
                              @elseif ($item->category == "SEROLOGY  TEST")
                              style='width:150px; height:150px; background-color:#17A086; color:white'
                              @elseif ($item->category == "Serology Test")
                              style='width:150px; height:150px; background-color:#E77E22; color:white'
                              @elseif ($item->category == "Thyroid Function Test")
                              style='width:150px; height:150px; background-color:#2A80B9; color:white'
                              @elseif ($item->category == "Vitamin Tests")
                              style='width:150px; height:150px; background-color:#8F44AD; color:white'
                              @elseif ($item->category == "chemistry Analyser")
                              style='width:150px; height:150px; background-color:#9CAAAB; color:white'
                              @elseif ($item->category == "Viral Test")
                              style='width:150px; height:150px; background-color:#F1C50E; color:white'
              
              @elseif ($item->category == "Diabetic")
              style='width:150px; height:150px; background-color:#424242; color:white'
              @elseif ($item->category == "24-Hour Urine Protein")
              style='width:150px; height:150px; background-color:#E67D21; color:white'
              @elseif ($item->category == "24hr urine collection test")
              style='width:150px; height:150px; background-color:#546E7A; color:white'
              @elseif ($item->category == "Auto Immunity")
              style='width:150px; height:150px; background-color:#263238; color:white'
              @elseif ($item->category == "Complement Fixation Test")
              style='width:150px; height:150px; background-color:#E84C3D; color:white'
              @elseif ($item->category == "Coagulations Profile")
              style='width:150px; height:150px; background-color:#F06292; color:white'
              @elseif ($item->category == "Serology Test For COVID-19 (IgG & IgM) By VIDAS")
              style='width:150px; height:150px; background-color:#D81B60; color:white'
              @elseif ($item->category == "Electrolyte report")
              style='width:150px; height:150px; background-color:#BA68C8; color:white'
              @elseif ($item->category == "Fluid Analysis")
              style='width:150px; height:150px; background-color:#7B1FA2; color:white'
              @elseif ($item->category == "Hormonal Analysis")
              style='width:150px; height:150px; background-color:#4A148C; color:white'
              @elseif ($item->category == "Glucose Tolerance Test")
              style='width:150px; height:150px; background-color:#9575CD; color:white'
              @elseif ($item->category == "HbA1C Test")
              style='width:150px; height:150px; background-color:#3F51B5; color:white'
              @elseif ($item->category == "G-6-PDH")
              style='width:150px; height:150px; background-color:#1A237E; color:white'
              @elseif ($item->category == "Iron profile report")
              style='width:150px; height:150px; background-color:#0097A7; color:white'
              @elseif ($item->category == "Stone Analysis")
              style='width:150px; height:150px; background-color:#006064; color:white'
              @elseif ($item->category == "Immunological Analysis")
              style='width:150px; height:150px; background-color:#009688; color:white'
              @elseif ($item->category == "Tumor markers")
              style='width:150px; height:150px; background-color:#43A047; color:white'
              @elseif ($item->category == "SEROLOGY TEST")
              style='width:150px; height:150px; background-color:#1B5E20; color:white'
              @elseif ($item->category == "Urine Albumin/Creatinine ratio")
              style='width:150px; height:150px; background-color:#689F38; color:white'
              @elseif ($item->category == "Urea Breath Test - UBT")
              style='width:150px; height:150px; background-color:#827717; color:white'
              @elseif ($item->category == "Vasculitis")
              style='width:150px; height:150px; background-color:#EF6C00; color:white'
              @elseif ($item->category == "Viral Screen")
              style='width:150px; height:150px; background-color:#D84315; color:white'
              @elseif ($item->category == "BLOOD EXAMINATION")
              style='width:150px; height:150px; background-color:#8D6E63; color:white'
              @elseif ($item->category == "Anti mullerian hormone")
              style='width:150px; height:150px; background-color:#3E2723; color:white'
              @elseif ($item->category == "Anti mullerian hormone")
              style='width:150px; height:150px; background-color:#607D8B; color:white'
              @elseif ($item->category == "General Stool Examination")
              style='width:150px; height:150px; background-color:#263238; color:white'
              
              @else
              style='width:150px; height:150px; background-color:green; color:white'>
              
                                 @endif
                              <input type="hidden" name=""id="number" value="0">
                              <h5> {{$item->name}}</h5>
                             
                            
                            
                            
                         
                          </button>
  
                          @endforeach
              
                        
                      </div>
                
        
                {{-- </div>
              </div>
            </div> --}}

            {{-- <div class="tab">
              <button class="tablinks" onclick="openCity(event, 'London')">London</button>
              <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
              <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
            </div>
            
            <div id="London" class="tabcontent">
              <h3>London</h3>
              <p>London is the capital city of England.</p>
            </div>
            
            <div id="Paris" class="tabcontent">
              <h3>Paris</h3>
              <p>Paris is the capital of France.</p> 
            </div>
            
            <div id="Tokyo" class="tabcontent">
              <h3>Tokyo</h3>
              <p>Tokyo is the capital of Japan.</p>
            </div> --}}


  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      
            <script>
                $(document).ready(function(){
                $( ".all" ).click(function() {
                  $( "#get" ).removeClass("d-none");
                  console.log("brwa");
                });
            });
                </script> --}}
                <script>
                  function openCity(evt, cityName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                      tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                      tablinks[i].className = tablinks[i].className.replace(" bg-dark", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " bg-dark";
                  }
                  </script>
                  
                </div>