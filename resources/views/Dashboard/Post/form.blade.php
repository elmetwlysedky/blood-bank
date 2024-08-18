
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
        <label class="col-form-label col-lg-3">{{__('main.title')}}<span class="text-danger">*</span></label>
        <div class="col-lg-9">
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
    </div>


    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.categories')}}<span class="text-danger">*</span></label>
        <div class="col-lg-9">
            {!! Form::select('category_id', $categories,null,[
            'class'=>'js-example-basic-multiple form-control','placeholder' => '...'
            ]) !!}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.content')}}<span class="text-danger"></span></label>
        <div class="col-lg-9">
            {!! Form::textarea('content',null,['class'=>'form-control']) !!}
        </div>
    </div>


    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.image')}}<span class="text-danger"></span></label>
        <div class="col-lg-9">
            {!! Form::file('image',null,['class'=>'form-control']) !!}
        </div>
    </div>



</fieldset>
