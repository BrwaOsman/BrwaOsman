@extends('layouts.app')

@section('content')

<div class="" style="min-height: 697px; background-color: #999999">


    <div class="content-header">
        <div class="container-fluid">
            <h2>{{$date->toDateString()}}</h2>
            <h1 class="text-white">Dashboard</h1>
        </div>
    </div>


    <div class="">

        <div class="">
            <style type="text/css">
                td {
                    text-align: center;
                }

                th {
                    text-align: center !important;
                }

            </style>

            <div class="row" style="padding:20px">
                <div class="text-center col-md-4 col-sm-12 col-xs-12 responsive">
                    <div class="text-center small-box bg-info color-palette ">
                        <div class="inner">
                            <h3>{{App\Models\test::all()->count()}}</h3>
                           

                            <p style="font-weight: bold;color:white;">Today Tests</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-fw fa-vial"></i>
                        </div>
                        <form class="form-inline justify-content-center " style="padding: 15px;width:100%;"
                           >
                           
                            <a href="" type="submit" class="btn btn-sm btn-info" name="button">Visit <i
                                    class="fa fa-arrow-circle-left"></i></a>
                        </form>
                    </div>
                </div>
                <div class="text-center col-md-4 col-sm-12 col-xs-12 responsive">
                    <div class="text-center small-box bg-warning color-palette ">
                        <div class="inner">
                            <h3>{{App\Models\patient::all()->count()}}</h3>

                            <p style="font-weight: bold;color:white;">Today Patients</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-fw fa-procedures"></i>
                        </div>
                        <form class="form-inline justify-content-center " style="padding: 15px;width:100%;"
                           >
                           
                            <button type="submit" class="btn btn-sm btn-warning" name="button">Visit <i
                                    class="fa fa-arrow-circle-left"></i></button>
                        </form>
                    </div>
                </div>
                <div class="text-center col-md-4 col-sm-12 col-xs-12 responsive">
                    <div class="text-center small-box bg-light color-palette ">
                        <div class="inner">
                            <h3>{{App\Models\Doctor::all()->count()}}</h3>

                            <p style="font-weight: bold;color:black;">Today Doctors</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-fw fa-user-md"></i>
                        </div>
                        <form class="form-inline justify-content-center " style="padding: 15px;width:100%;"
                           >
                          
                            <button type="submit" class="btn btn-sm btn-light" name="button">Visit <i
                                    class="fa fa-arrow-circle-left"></i></button>
                        </form>
                    </div>
                </div>
                <div class="text-center col-md-4 col-sm-12 col-xs-12 responsive">
                    <div class="text-center small-box bg-success color-palette ">
                        <div class="inner">
                            <h3>0</h3>

                            <p style="font-weight: bold;color:white;">Today Payments</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <form class="form-inline justify-content-center " style="padding: 15px;width:100%;"
                           >
                       
                            <button type="submit" class="btn btn-sm btn-success" name="button">Visit <i
                                    class="fa fa-arrow-circle-left"></i></button>
                        </form>
                    </div>
                </div>
                <div class="text-center col-md-4 col-sm-12 col-xs-12 responsive">
                    <div class="text-center small-box bg-danger color-palette ">
                        <div class="inner">
                            <h3>{{App\Models\order::where('created_at',$date->toDateString())->get()->count()}}</h3>

                            <p style="font-weight: bold;color:white;">Pending Orders</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-fw fa-cash-register"></i>
                        </div>
                        <form class="form-inline justify-content-center " style="padding: 15px;width:100%;"
                           >
                           
                            <button type="submit" class="btn btn-sm btn-danger" name="button">Visit <i
                                    class="fa fa-arrow-circle-left"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row" style="padding:20px">
                <div class="col-md-4">
                    <div class="card card-success">
                        <div class="text-center card-header" style="padding:0px;">
                            <h2>Top Tests</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th># of Tests</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($test as $item)
                                          <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td> 3</td>
                                    </tr>
                                    @endforeach
                                  
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-success">
                        <div class="text-center card-header" style="padding:0px;">
                            <h2>Top Doctors</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th># of Referring</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($doctor as $item)
                                     <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->percentage}}</td>
                                    </tr>
                                 @endforeach
                                    
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>

    </div>





</div>

@endsection
