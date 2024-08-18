@extends('Dashboard.Layouts.master')

@section('title')
    {{__('main.donation_request')}}
@endsection

@section('content')










    <div class="card text-center">
        <div class="card-body">
            <div class="mb-4">
                <div class="mb-3 text-center">
                    <a href="#" class="d-inline-block">
                        <img src="/storage/" class="img-fluid" alt="" style="height: 300px;">
                    </a>
                </div>

                <h4 class="font-weight-semibold mb-1">
                    <p >{{$donation_request->name}}</p>
                    <h4 class="text-default">  {{$donation_request->phone}}</h4>
                    <h5>{{$donation_request->hospital_name}}</h5>

                </h4>

                <div class="container">

                    <div class="container" style="margin-top:50px;">
                        <table class="table table-bordered table-hover datatable-highlight">
                            <thead>
                            <tr>
                            <th>{{__('main.name')}}</th>
                            <th>{{__('main.phone')}}</th>
                            <th>{{__('main.age')}}</th>
                            <th>{{__('main.blood_type')}}</th>
                            <th>{{__('main.bags')}}</th>



                            </tr>
                            </thead>

                            <tbody>
                                <tr>
                                <td>{{$donation_request->name}}</td>
                                <td>{{$donation_request->phone}}</td>
                                <td>{{$donation_request->age}}</td>
                                <td>{{$donation_request->bloodType->name}}</td>
                                <td>{{$donation_request->bags}}</td>


                                </tr>
                            </tbody>
                        </table>

                    </div>


                    <div class="container">
                        <table class="table table-bordered table-hover datatable-highlight"style="margin-top:30px;">
                            <thead>
                            <tr>
                                <th>{{__('main.governorate')}}</th>
                                <th>{{__('main.city')}}</th>
                                <th>{{__('main.hospital_name')}}</th>
                                <th>{{__('main.hospital_address')}}</th>
                                <th>{{__('main.client')}}</th>

                            </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>{{$donation_request->city->governorate->name_ar}}</td>
                                    <td>{{$donation_request->city->name_ar}}</td>
                                    <td>{{$donation_request->hospital_name}}</td>
                                    <td>{{$donation_request->hospital_address}}</td>
                                    <td>{{$donation_request->client->name}}</td>

                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="mb-4">

                    <ul class="list-inline list-inline-dotted text-muted mb-3">
                        <li class="list-inline-item"><h4>{{$donation_request->created_at->format('d/m/Y')}} : {{$donation_request->created_at->diffForhumans()}}</h4></li>
                    </ul>
                    </div>

            </div>
        </div>

    </div>













    <!-- Content area -->
    <!-- <div class="col-md"> -->

<!-- Blog layout #1 with video -->
        <!-- <div class="card"> -->
    <!-- <div class="card-header">
        <h5 class="card-title font-weight-semibold"><a href="#" class="text-default">{{$donation_request->name}}</a></h5>

        <div class="list-icons">
            <div class="dropdown">
                <a href="#" class="list-icons-donation_request" data-toggle="dropdown">
                    <i class="icon-menu9"></i>
                </a>

                <div class="dropdown-menu ">


                    <form action="{{route('donation_request.destroy',$donation_request->id)}}" method="POST" >
                        @csrf
                        @method('DELETE')

                        <button class="dropdown-donation_request" type="submit"><i class="icon-bin"> </i>{{__('main.delete')}}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="card-body ">

        {{$donation_request->hospital_name}}
    </div>

    <div class="card-footer bg-transparent d-sm-flex justify-content-sm-between align-donation_requests-sm-center border-top-0 pt-0 pb-3">
        <ul class="list-inline list-inline-dotted text-muted mb-3 mb-sm-0">
            <li class="list-inline-donation_request">{{$donation_request->created_at->diffForhumans()}}</li>
            <li class="list-inline-donation_request">
                        <a href="#" class="text-muted"><i class="icon-cash3 text-green mr-2">{{__('main.selling_price')}}</i> </a>
                    </li>
                    <li class="list-inline-donation_request">
                        <a href="#" class="text-muted"><i class="icon-cash3 text-green mr-2">{{__('main.Purchasing_price')}}</i> </a>
                    </li>

        </ul> -->

    <!-- </div>
</div> -->
<!-- /blog layout #1 with video -->

<!-- </div> -->
@endsection

