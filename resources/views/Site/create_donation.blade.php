@extends('Site.Layouts.master')

@section('title')
    {{__('main.register')}}
@endsection

@section('navbar')

    <body class="create">


@endsection


@section('content')

<div class="form">

    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> انشاء طلب التبرع</li>
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
            {!! Form::open(['route'=>'site.donation.store','class'=>'form-validate-jquery','method'=>'post']) !!}

            <input type="text" name="name" class="form-control" id="name" aria-describedby="" placeholder="الإسم">

            <input type="text" name="phone"  pattern="^01[0-2]{1}[0-9]{8}" class="form-control" id="" aria-describedby="" placeholder="رقم الهاتف">

            <input placeholder="العمر" name="age" class="form-control" type="text" onfocus="(this.type='date')" id="date">

            <input placeholder="عدد الاكياس" name="bags" class="form-control" type="text" onfocus="(this.type='date')" id="date">


            <select class="form-control" id="blod_type" name="blood_type_id">
                <option selected disabled hidden value="">فصيلة الدم</option>
                @foreach ($blood_types as $blood_type)
                    <option value="{{$blood_type}}">{{$blood_type}}</option>
                @endforeach

            </select>


            <select class="form-control" id="cities" name="city_id">
                <option  selected disabled hidden value="">المدينة</option>
                @foreach ($cities as $city)
                    <option value="{{$city}}">{{$city}}</option>
                @endforeach
            </select>



            <input type="text" name="hospital_name" class="form-control" id="name" aria-describedby="" placeholder="اسم المستشفى">

            <input type="text" name="hospital_address" class="form-control" id="name" aria-describedby="" placeholder="عنوان المستشفى">


            <div class="create-btn">
                <input type="submit" value="إنشاء"></input>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
</div>



@endsection
