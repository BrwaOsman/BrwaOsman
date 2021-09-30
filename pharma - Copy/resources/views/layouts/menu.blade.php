<!-- need to remove -->
{{-- <li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li> --}}
<style>
    /* .icon2:active{
        background-color:blue;
    } */
    .active, .icon2:hover {
      background-color: #666;
      color: white;
    }
        </style>
    <div class="" id="myDIV">
    <li class="nav-item">
        <a href="http://localhost/pharma/public/categories" class="nav-link icon2 active1 ">
            <i class="nav-icon fas fa-align-center"></i>
            <p>Categoris</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="http://localhost/pharma/public/allCategory" class="nav-link icon2 active1 ">
            <i class="nav-icon fas fa-fw fa-cash-register "></i>
            <p>All_Test</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="http://localhost/pharma/public/Doctors" class="nav-link icon2">
             <i class=" nav-icon fas fa-user-md"></i>
            <p>Doctors</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="http://localhost/pharma/public/Patients" class="nav-link icon2">
            <i class="nav-icon fas fa-procedures"></i>
            <p>Patients</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="http://localhost/pharma/public/Tests" class="nav-link icon2">
            <i class=" nav-icon fas fa-vials"></i>
            <p>Tests</p>
        </a>
    </li>
    {{-- <li class="nav-item">
        <a href="http://localhost/pharma/public/Orders" class="nav-link icon2 ">
          
            <i class="nav-icon fas fa-fw fa-cash-register "></i>
            <p>Orders</p>
        </a>
    </li> --}}
    
     {{-- <li class="nav-item">
        <a href="http://localhost/pharma/public/allTest" class="nav-link icon2 ">
            <i class="nav-icon fas fa-fw fa-cash-register "></i>
            <p>AllTest</p>
        </a>
    </li> --}}
    
    <li class="nav-item">
        <a href="http://localhost/pharma/public/report" class="nav-link icon2 ">
          
            <i class="nav-icon fas fa-paste"></i>
            <p>Report</p>
        </a>
    </li>
    
   
    
    
    <li class="nav-item">
        <a href="http://localhost/pharma/public/Users" class="nav-link icon2 ">
            <i class="nav-icon fas fa-user"></i>
            <p>Users</p>
        </a>
    </li>
    
    
    </div>
    <script>
        // Add active class to the current button (highlight it)
        var header = document.getElementById("myDIV");
        var btns = header.getElementsByClassName("icon2");
        for (var i = 0; i < btns.length; i++) {
          btns[i].addEventListener("click", function() {
          var current = document.getElementsByClassName("active1");
          current[0].className = current[0].className.replace(" active1", "");
          this.className += " active1";
          });
        }
        </script>