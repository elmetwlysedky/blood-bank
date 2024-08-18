@extends('Dashboard.Layouts.master')

@section('title')
    {{$post->title}}
@endsection

@section('content')


    <div class="col-md">

        <!-- Blog layout #1 with video -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title font-weight-semibold"><a href="#" class="text-default">{{$post->title}}</a></h5>

                <div class="list-icons">
                    <div class="dropdown">
                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                            <i class="icon-menu9"></i>
                        </a>

                        <div class="dropdown-menu ">
                            <a href="{{route('post.edit',$post->id)}}"class="dropdown-item"><i class="icon-pencil7"></i> {{__('main.edit')}} </a>

                            <form action="{{route('post.destroy',$post->id)}}" method="POST" >
                                @csrf
                                @method('DELETE')

                                <button class="dropdown-item" type="submit"><i class="icon-bin"> </i>{{__('main.delete')}}</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body ">
                <div class="card-img  embed-responsive-16by9 mb-3">

                    @if($post->image != null)
                        <img src="/storage/{{$post->image}}"class="embed-responsive-item" allowfullscreen="" frameborder="0" mozallowfullscreen="" >

                    @else
                        <img src="/storage/NOproduct.png" class="embed-responsive-item" allowfullscreen="" frameborder="" mozallowfullscreen="" >
                    @endif
                </div>
                {{$post->content}}
            </div>

            <div class="card-footer bg-transparent d-sm-flex justify-content-sm-between align-items-sm-center border-top-0 pt-0 pb-3">
                <ul class="list-inline list-inline-dotted text-muted mb-3 mb-sm-0">
                    <li class="list-inline-item">{{$post->created_at->diffForhumans()}}</li>


                </ul>

            </div>
        </div>
        <!-- /blog layout #1 with video -->

    </div>

@endsection


