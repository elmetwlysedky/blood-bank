@extends('Dashboard.Layouts.master')

@section('title')
    {{__('main.edit')}} {{$post->title}}
@endsection


@section('content')



    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">{{__('main.edit')}} {{$post->title}}</h5>
        </div>

        <div class="card-body">
            <p class="mb-4"></p>
            {!! Form::model($post,['route'=>['post.update',$post->id],
            'class'=>'form-validate-jquery' ,'method'=>'PATCH','enctype'=>'multipart/form-data'
            ]) !!}

             @include('Dashboard.Post.form')

            <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right"><b>
                    <i class="icon-plus3"></i></b>{{__('main.update')}}</button>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
