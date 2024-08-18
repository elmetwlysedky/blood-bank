
@extends('Dashboard.Layouts.master')

@section('title')
    {{__('main.permissions')}}  {{$user->name}}
@endsection

@section('content')


    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">  {{__('main.roles')}}  {{$user->name}}</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


            {!!Form::open(['route'=>['add.permission',$user->id], 'class'=>'form-validate-jquery','method'=>'post'])!!}

                <input type="hidden" name="user_id" value="{{$user->id}}">

                    <div class="form-group row">

                        <label class="col-lg-3 col-form-label">{{__('main.roles')}} <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            @foreach($roles as $role)
                                <div class="form-check ">
                                    <label class="form-check-label">
                                        {!!  Form::checkbox('role_id[]', $role,null,['class'=>'form-check-input'])!!}
{{--                                        <input type="checkbox" name="permissions[]" class="form-check-input" value="{{$item->id}}">--}}
                                        {{__($role)}}
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
