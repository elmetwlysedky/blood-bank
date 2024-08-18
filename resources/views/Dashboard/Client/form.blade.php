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
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.email')}} <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            {!!Form::email('email',null,['class'=>'form-control'])!!}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.phone')}}<span class="text-danger"></span></label>
        <div class="col-lg-9">
            {!!Form::number('phone',null,['class'=>'form-control'])!!}

        </div>
    </div>


       <!-- Password field -->
       <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.password')}}  <span class="text-danger">*</span></label>
        <div class="col-lg-9">

            {!!Form::password('password',['class'=>'form-control'])!!}

        </div>
    </div>
    <!-- /password field -->


    <!-- Repeat password -->
    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.confirm')}} <span class="text-danger">*</span></label>
        <div class="col-lg-9">


            {!!Form::password('password_confirmation',['class'=>'form-control'])!!}

        </div>
    </div>



    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.cities')}}<span class="text-danger">*</span></label>
        <div class="col-lg-9">
            {!! Form::select('city_id', $cities,null,[
            'class'=>'js-example-basic-multiple form-control','placeholder' => '...'
            ]) !!}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.blood_type')}}<span class="text-danger">*</span></label>
        <div class="col-lg-9">
            {!! Form::select('blood_type_id', $blood_types,null,[
            'class'=>'js-example-basic-multiple form-control','placeholder' => '...'
            ]) !!}
        </div>
    </div>


    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.date_of_birth')}}<span class="text-danger">*</span></label>
        <div class="col-lg-9">
        {!! Form::date('date_of_birth',null,[
            'class'=>' form-control' ]) !!}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.last_donation')}}<span class="text-danger">*</span></label>
        <div class="col-lg-9">
            {!! Form::date('last_donation',null,[
            'class'=>' form-control' ]) !!}

        </div>
    </div>


</fieldset>


