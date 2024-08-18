@extends('Dashboard.Layouts.master')

@section('title')
    {{__('main.posts')}}
@endsection

@section('content')

    <!-- Content area -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">{{__('main.table')}} {{__('main.posts')}} : {{$posts->count()}}</h5>
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
            <code></code><strong> </strong>
            <a href="{{route('post.create')}}">
                <button class="btn bg-teal "><b><i class="icon-plus3"></i></b>
                    {{__('main.create')}}
                </button>
            </a>


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
            <td></td>
            <tr>
                <th>#</th>
                <th>{{__('main.title')}}</th>
                <th>{{__('main.image')}}</th>
                <th>{{__('main.content')}}</th>
                <th>{{__('main.categories')}}</th>
                <th>{{__('main.actions')}}</th>
            </tr>
            </thead>
            <div>

                <tbody>
                @php $counter = 1 @endphp
                @isset($posts)
                    @foreach($posts as $item)
                        <td>{{$counter++}}</td>
                        <td>{{$item->title}}</td>
                        @if($item->image == null)
                            <td><img src="/storage/NOproduct.png" alt="no image" class="img-preview rounded"  style="width: 70px;height: 50px;"></td>
                        @else
                            <td><img src="storage/{{$item->image}}" alt="" class="img-preview rounded"  style="width: 70px;height: 50px;"></td>
                        @endif
                        <td>{{Str::limit($item->content,100,'.....')}}

                        <td>{{$item->category->name}}</td>

                    <td>
                        <div class="list-icons">
                            <div class="list-icons-item dropdown">
                                <a href="#" class="list-icons-item caret-0 dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu ">
                                    <a href="{{route('post.show',$item->id)}}" class="dropdown-item"><i class="icon-file-eye2 mr-3 icon"></i> {{__('main.show')}} </a>
                                    <a href="{{route('post.edit',$item->id)}}" class="dropdown-item"><i class="icon-pencil7"></i> {{__('main.edit')}} </a>

                                    <div class="dropdown-divider"></div>
                                    <form action="{{route('post.destroy',$item->id)}}" method="POST"  >
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
        <!-- /content area -->
        <div class="card card-body border-top-1 border-top-pink text-center">
            <ul class="pagination pagination-separated align-self-center">
                {!! $posts->links() !!}

            </ul>
        </div>

@endsection
