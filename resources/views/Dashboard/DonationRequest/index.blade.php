@extends('Dashboard.Layouts.master')

@section('title')
    {{__('main.donation_requests')}}
@endsection

@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">{{__('main.table')}} {{__('main.donation_requests')}} : {{$donations->count()}}</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <form action="{{ route('post.index') }}" method="get">

            <div class="col-lg-11">
                <div class="input-group-append">
                    <input type="text" class="form-control"placeholder="@lang('main.search')" name="search" value="{{ request()->search }}">

                    <button type="submit" class="btn bg-blue " > @lang('main.search')</button>
                </div>
            </div>
        </form>
        <div class="card-body">

        </div>

        <div class="container">
            @if(Session::has('success'))

                <div class="alert alert-success border-0 alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    <span class="font-weight-semibold">{{session('success')}}</span>
                </div>

            @elseif(Session::has('delete'))
                <div class="alert alert-danger border-0 alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    <span class="font-weight-semibold ">{{session('delete')}}</span>
                </div>

            @endif
        </div>

        <table class="table datatable-basic">
            <thead>
            <tr>
                <th>#</th>
                <th>{{__('main.name')}}</th>
                <th>{{__('main.phone')}}</th>
                <th>{{__('main.age')}}</th>
                <th>{{__('main.blood_type')}}</th>
                <th>{{__('main.city')}}</th>
                <th>{{__('main.hospital_name')}}</th>
                <th>{{__('main.hospital_address')}}</th>

                <th>{{__('main.client')}}</th>
                <th>{{__('main.actions')}}</th>

            </tr>
            </thead>
            <div>

                <tbody>
                @php $counter = 1 @endphp
                 @isset($donations)
                 @foreach($donations as $item)
                     <tr>
                         <td>{{$counter++}}</td>
                         <td>{{$item->name}}</td>
                         <td>{{$item->phone}}</td>
                         <td>{{$item->age}}</td>
                         <td>{{$item->bloodType->name}}</td>
                         <td>{{$item->city->name_ar}} ... {{$item->city->governorate->name_ar}} </td>
                         <td>{{$item->hospital_name}}</td>


                         <td>{{Str::limit($item->hospital_address,30,'.....')}}
                         <td>{{$item->client->name}}</td>
                         <td>
                             <div class="list-icons">
                                 <div class="list-icons-item dropdown">
                                     <a href="#" class="list-icons-item caret-0 dropdown-toggle" data-toggle="dropdown">
                                         <i class="icon-menu9"></i>
                                     </a>
                                     <div class="dropdown-menu ">
                                        <a href="#" class="dropdown-item"><i class="icon-file-eye2 mr-3 icon"></i> {{__('main.show')}} </a>


                                         <div class="dropdown-divider"></div>
                                         <form action="{{route('donation_request.destroy',$item->id)}}" method="POST">
                                            @csrf
                                          @method('DELETE')
                                         <button class="dropdown-item" type="submit"><i class="icon-bin"> </i>{{__('main.delete')}}</button>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </td>
                     </tr>
                @endforeach
                @endisset
                </tbody>
            </div>

        </table>

        <!-- /media library -->


        <!-- /content area -->
        <div class="card card-body border-top-1 border-top-pink text-center">
            <ul class="pagination pagination-separated align-self-center">
                {!! $donations->links() !!}

            </ul>
        </div>

@endsection
