@extends('Site.Layouts.master')

@section('title')
    {{__('main.register')}}
@endsection


@section('navbar')

<body class="donation-requests">

@endsection


@section('content')

  <!--inside-article-->
  <div class="all-requests">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">طلبات التبرع</li>
                        </ol>
                    </nav>
                </div>

                <!--requests-->
                <div class="requests">
                    <div class="head-text">
                        <h2>طلبات التبرع</h2>
                    </div>
                    <div class="content">
                        <form action="{{route('site.donation.index')}}" method="get" class="row filter">
                            <div class="col-md-5 blood">
                                <div class="form-group">
                                    <div class="inside-select">
                                        <select name="blood_type" class="form-control" id="exampleFormControlSelect1">
                                            <option selected disabled>اختر فصيلة الدم</option>
                                            @foreach ($blood_types as $blood_type )
                                            <option value="{{$blood_type->id}}">{{$blood_type->name}}</option>
                                            @endforeach


                                        </select>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 city">
                                <div class="form-group">
                                    <div class="inside-select">
                                        <select name="governorate" class="form-control" id="exampleFormControlSelect1">
                                            <option selected disabled>اختر المدينة</option>
                                            @foreach ($governorates as $governorate)
                                            <option value="{{$governorate->id}}">{{$governorate->name_ar}}</option>
                                            @endforeach


                                        </select>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 search">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                        @foreach($donations as $donation)
                        <div class="patients">
                            <div class="details">
                                <div class="blood-type">
                                    <h2 dir="ltr">{{$donation->bloodType->name}}</h2>
                                </div>
                                <ul>
                                    <li><span>اسم الحالة:</span>{{$donation->name}} </li>
                                    <li><span>مستشفى:</span>{{$donation->hospital_name}}</li>
                                    <li><span>المدينة:</span> {{$donation->city->name_ar}}</li>
                                </ul>
                                <a href="{{route('site.donation.show',$donation->id)}}">التفاصيل</a>
                            </div>

                        </div>
                        @endforeach
                        <div class="pages">
                            <nav aria-label="Page navigation example" dir="ltr">
                                <ul class="pagination">

                                    <li class="page-item">{{$donations->links()}}</li>
{{--                                    <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">4</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">5</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">6</a></li>--}}

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
