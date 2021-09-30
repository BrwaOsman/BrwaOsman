@extends('layouts.my')
@section('content')
<div class=" " style="min-height: 697px;">


    <div class="content-header">
        <div class="container-fluid">
        </div>
    </div>


    <div class="content">

        <div class="container-fluid">
            <style type="text/css">
                td {
                    text-align: center;
                }

                th {
                    text-align: center !important;
                }

            </style>

            <h4>Report</h4>

            <section class="invoice">
                <div class="page-header">
                    <center>
                        <br>
                        <img src="img/pharmacy.svg" style="width:100px;height:100px">
                        <br>
                        <h3>Ferga Laboratory Management System</h3>
                        <br>
                        <form class="form-inline justify-content-center bg-info" style="padding: 15px;" action=""
                            method="POST">
                            {{-- <input type="hidden" name="_token" value="FE55FQ53g2c9upq7xK7atFUkWqJDTHmekpSlFtOZ">
                            <input type="hidden" name="_token" value="FE55FQ53g2c9upq7xK7atFUkWqJDTHmekpSlFtOZ"> --}}

                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="form-group">
                                        <label for="staticEmail2">From Date</label>
                                        <input class="form-control" type="date" id="from_date" name="from_date">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="inputPassword2">To Date</label>
                                        <input class="form-control" type="date" id="to_date" name="to_date">
                                    </div>
                                </div>
                                <div class="col-md-2">

                                    <div class="form-group">
                                        <input type="hidden" id="doctor_id" name="doctor_id">
                                        <label for="inputPassword2">Doctor</label>
                                        <select class="jsselect form-control select2-hidden-accessible" name="doctor_id"
                                            style="width:100%;" id="search3" data-select2-id="search3" tabindex="-1"
                                            aria-hidden="true">
                                            <option value="" data-select2-id="2">Select A Referrer</option>
                                            @foreach($doctor as $key )
                                            <option value="{{$key->name}}">{{$key->name}}</option>
                                            @endforeach



                                        </select><span
                                            class="select2 select2-container select2-container--default d-none"
                                            dir="ltr" data-select2-id="1" style="width: 100%;"><span
                                                class="selection"><span
                                                    class="select2-selection select2-selection--single" role="combobox"
                                                    aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                    aria-disabled="false"
                                                    aria-labelledby="select2-search3-container"><span
                                                        class="select2-selection__rendered"
                                                        id="select2-search3-container" role="textbox"
                                                        aria-readonly="true" title="Select A Referrer">Select A
                                                        Referrer</span><span class="select2-selection__arrow"
                                                        role="presentation"><b
                                                            role="presentation"></b></span></span></span><span
                                                class="dropdown-wrapper" aria-hidden="true"></span></span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Action</label>
                                    <button type="submit" name="action" value="summary"
                                        class="btn btn-light form-control mb-2"><i
                                            class="fa fa-fw fa-save"></i>Filter</button>

                                    <button type="submit" name="action" value="detail"
                                        class="btn btn-light form-control mb-2"><i
                                            class="fa fa-fw fa-clipboard"></i>Detail</button>
                                    <button type="submit" name="action" value="doctorDetail"
                                        class="btn btn-light form-control mb-2"><i
                                            class="fa fa-fw fa-clipboard"></i>Doctor Detail</button> </div>
                            </div>
                        </form>
                        <br>
                    </center>

                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-4">

                            <div class="info-box">
                                <span class="info-box-icon bg-info">   <i class="nav-icon fas fa-fw fa-cash-register "></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Orders</span>
                                    <span class="info-box-number">{{App\Models\Doctor::all()->count()}}</span> </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="info-box">
                                <span class="info-box-icon bg-info icon">  <i class="nav-icon fas fa-procedures"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Patients</span>

                                    <span class="info-box-number">{{App\Models\patient::all()->count()}}</span> </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="info-box">
                                <span class="info-box-icon bg-info">  <i class=" nav-icon fas fa-user-md"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Doctors</span>
                                    <span class="info-box-number">{{App\Models\Doctor::all()->count()}}</span> </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="far fa fa-road"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Orders</span>
                                    <span class="info-box-number">753,800</span> </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="far fa fa-road"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Discounts</span>
                                    <span class="info-box-number">12,000</span> </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="far fa fa-road"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Profits</span>
                                    <span class="info-box-number">742,000</span> </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <script src="http://lab.ku-host.com/vendor/jquery/jquery.min.js"></script>
            <script type="text/javascript">
                var url = "http://lab.ku-host.com";
                $(document).ready(function () {
                    $('.jsselect2').select2({
                        placeholder: "Type to search ...",
                        minimumInputLength: 2,
                        ajax: {
                            url: url + '/doctors/search',
                            dataType: 'json',
                            data: function (params) {
                                return {
                                    q: $.trim(params.term)
                                };
                            },
                            processResults: function (data) {
                                return {
                                    results: data
                                };
                            },
                            cache: true
                        }
                    });

                    $('#search').on("select2:select", function (e) {

                        console.log("select it");
                        console.log(this.value);
                        $.get(url + '/doctor/search/' + this.value, {}, function (data) {
                            console.log(data);
                            document.getElementById("doctor_id").value = data['id'];

                            document.getElementById("select2-search-container").innerHTML =
                                '<span class="select2-selection__placeholder">Type to search ...</span>';
                            console.log("done");
                        });
                    });
                });

            </script>
        </div>
    </div>

</div>


@endsection
