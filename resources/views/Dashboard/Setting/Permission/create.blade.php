@extends('Dashboard.Layouts.master')

@section('title')
    {{__('main.add')}} {{__('main.categories')}}
@endsection

@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">{{__('main.add')}} {{__('main.categories')}}</h5>
        </div>

        <div class="card-body">
            <p class="mb-4"></p>
            {!! Form::open(['route'=>'permission.store','method'=>'POST','class'=>'form-validate-jquery']) !!}


            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>



    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.name')}}<span class="text-danger">*</span></label>
        <div class="col-lg-9">
            {!!Form::text('name',null,['class'=>'form-control'])!!}

            <input type="hidden" name="guard_name" value="web">
        </div>
    </div>


            <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right"><b><i class="icon-plus3"></i></b>{{__('main.add')}}</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection