@extends('Site.Layouts.master')

@section('title')
    {{__('main.register')}}
@endsection

@section('navbar')

<body class="create">


@endsection


@section('content')


  <!--form-->
  <div class="form">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                        </ol>
                    </nav>
                </div>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <div class="account-form">
                {!! Form::open(['route'=>'site.register','class'=>'form-validate-jquery','method'=>'post']) !!}

                        <input type="text" name="name" class="form-control" id="name" aria-describedby="" placeholder="الإسم">

                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="البريد الإلكترونى">

                        <input placeholder="تاريخ الميلاد"  name="date_of_birth" class="form-control" type="text" onfocus="(this.type='date')" id="date">


                        <select class="form-control" id="blod_type" name="blood_type_id">
                            <option selected disabled hidden value="">فصيلة الدم</option>
                            @foreach ($blood_type as $blood_type)
                            <option value="{{$blood_type->id}}">{{$blood_type->name}}</option>
                            @endforeach

                        </select>

                        <!-- <select class="form-control" id="governorates" name="governorate">
                            <option selected disabled hidden value="">المحافظة</option>
                            @foreach ($governorates as $governorate)
                            <option value="{{$governorate->id}}">{{$governorate->name_ar}}</option>
                            @endforeach

                        </select> -->

                        <select class="form-control" id="cities" name="city_id">
                            <option  selected disabled hidden value="">المدينة</option>
                            @foreach ($cities as $city)
                            <option value="{{$city->id}}">{{$city->name_ar}}</option>
                            @endforeach
                        </select>

                        <input type="text" name="phone"  pattern="^01[0-2]{1}[0-9]{8}" class="form-control" id="" aria-describedby="" placeholder="رقم الهاتف">

                        <input placeholder="آخر تاريخ تبرع" name="last_donation" class="form-control" type="text" onfocus="(this.type='date')" id="date">

                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور">

                        <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="تأكيد كلمة المرور">

                        <div class="create-btn">
                            <input type="submit" value="إنشاء"></input>
                        </div>
                   {!! Form::close() !!}

                </div>
            </div>
        </div>



@endsection
