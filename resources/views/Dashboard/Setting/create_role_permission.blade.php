
@extends('Dashboard.Layouts.master')

@section('title')
    {{__('main.permissions')}}
@endsection

@section('content')


    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">  {{__('main.permissions')}} </h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <p class="mb-4"><strong></strong> <code></code></p>
            {!!Form::open(['route'=>'role.store', 'class'=>'form-validate-jquery','method'=>'post'])!!}

            <div class="form-group row">
                <label class="col-form-label col-lg-3">{{__('main.name')}}<span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    {!!Form::text('name',null,['class'=>'form-control'])!!}
                </div>
            </div>


                    <div class="form-group row">

                        <label class="col-lg-3 col-form-label">{{__('main.permissions')}} <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            @foreach($permission as $item)
                                <div class="form-check ">
                                {!!  Form::checkbox('permission_id[]',$item,['class'=>'form-check-input'])!!}

                                    <label class="form-check-label">
                                    {{$item}}

                                    <input type="hidden" name="guard_name" value="web">

                                    </label>

                                </div>

                            @endforeach
                        </div>
                    </div>



            <button type="submit" class="btn bg-teal-300 btn-labeled btn-labeled-right">
                <b><i class="icon-plus3"></i></b>{{__('main.save')}}
            </button>

            {!! Form::close() !!}

        </div>
    </div>

@endsection
