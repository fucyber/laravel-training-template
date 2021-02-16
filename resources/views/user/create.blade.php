@extends('layouts.app')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Register</h3>
    </div>
    <div class="panel-body">
      @if (count($errors) > 0)
                    <div class="alert alert-danger">
                      <p><strong>Whoops!</strong> There were some problems with your input.</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
      @endif
      {!!Form::open(['route' => 'user.store', 'files' => true,'id'=>'form_register','method' => 'POST' ])!!}
      {{ csrf_field() }}
      <div class="form-group">
        {!! Form::label('name','Name')!!}
        <div class="errorwrap">
          {!! Form::text('name', $value = null, $attributes = ['placeholder' =>'Name'  ,'id' => 'name' , 'class' =>'form-control validate-required '])!!}
          <span class="errorplace"></span>
        </div>
      </div>
      <div class="form-group">
        {!! Form::label('email','Email')!!}
        <div class="errorwrap">
          {!! Form::email('email', $value = null, $attributes = ['placeholder' =>'Email' ,'id' => 'email' , 'class' =>'form-control validate-required validate-email'])!!}
          <span class="errorplace"></span>
        </div>
      </div>
      <div class="form-group">
        {!! Form::label('personal_id','Personal ID')!!}
        <div class="errorwrap">
          {!! Form::text('personal_id', $value = null, $attributes = ['placeholder' =>'Personal ID' ,'id' => 'personal_id' , 'class' =>'form-control validate-required  validate-nationalid'])!!}
          <span class="errorplace"></span>
        </div>
        </div>
        <div class="form-group">
          <label for="gender" class="control-label input-group">Gender</label>
          <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-default active">
              {!! Form::radio('gender', 'Male', true)!!}Male
            </label>
            <label class="btn btn-default">
              {!! Form::radio('gender', 'Female', false)!!}Female
            </label>
          </div>
        </div>
        <div class="form-group">
          {!! Form::label('nationality','Nationality')!!}
          {!! Form::select('nationality', ['Thai' => 'Thai', 'USA' => 'USA' ,'France'=>'France'], 'Thai', $attributes = ['class' =>'form-control'])!!}
        </div>
        <div class="form-group">
          {!! Form::label('Address','Address')!!}
          <p>
            <div class="row">
              <div class="col-md-11 col-xs-10">
                  <div class="errorwrap">
                {!! Form::textarea('address[]', $value = null, $attributes = ['placeholder' =>'Address' ,'class' =>'form-control validate-required address','size' =>'30x2'])!!}
                  <span class="errorplace"></span>
                </div>
              </div>
              <div class="col-md-1 col-xs-2">

              </div>
            </div>
          </p>
          {!! Form::button('เพิ่ม',$attributes = ['id'=>'add_address', 'class'=>'btn btn-info'])!!}
        </div>
        <div class="form-group">
          <label >Phone</label>
          <p>
            <div class="row">
              <div class="col-md-11 col-xs-10">
                <div class="errorwrap">
                {!! Form::text('phone[]', $value = null, $attributes = ['placeholder' =>'Phone' , 'class' =>'form-control validate-required validate-numberonly validate-minlength9 validate-maxlength10 validate-zerobegin phone','size' =>'30x2'])!!}
                <span class="errorplace"></span>
              </div>
              </div>
              <div class="col-md-1 col-xs-2">

              </div>
            </div>
          </p>
          {!! Form::button('เพิ่ม',$attributes = ['id'=>'add_phone', 'class'=>'btn btn-info'])!!}
        </div>

        <div class="form-group">
          {!! Form::label('password','Password')!!}
            <div class="errorwrap">
          {!! Form::password('password',$attributes =['id'=>'password', 'placeholder' =>'Password','class' =>'form-control validate-required validate-minlength9'])!!}
          <span class="errorplace"></span>
        </div>
        </div>
        <div class="form-group">
          {!! Form::label('password_confirmation','Confirm Password')!!}
            <div class="errorwrap">
          {!! Form::password('password_confirmation',$attributes =['id'=>'password_confirmation', 'placeholder' =>'Confirm Password','class' =>'form-control validate-required validate-minlength9'])!!}
          <span class="errorplace"></span>
        </div>
        </div>

        {!! Form::submit('Submit',$attributes =['class' =>'btn btn-success'])!!}
        <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
        {!!Form::close()!!}
      </div>
    </div>
  @endsection

  @section('script')
    <script>
         $("#form_register").validate({
           errorPlacement: function(error, element) {
             divelement = element.closest(".errorwrap").find(".errorplace");
             error.appendTo(divelement);
           },
            submitHandler:function(form) {
                var isValid = true;
                $(".validate-required").each(function() {
                    if($(this).val() == "" && $(this).val().length < 1) {
                        $(this).addClass('error');
                        isValid = false;
                    } else {
                        $(this).removeClass('error');
                    }
                });
                if(isValid) {
                    form.submit();
                }
            }
         });
         StartRules();
      $("#add_address").click(function(e) {
        $(this).before('<p><div class="row"><div class="col-md-11 col-xs-10"><textarea  name="address[]" class="form-control address" placeholder="Address"></textarea></div><div class="col-md-1 col-xs-2"><a href="javascript:void(0)" onclick="remove_field(this);" class="remove_field">x</a></div></div></p>');
         StartRules();
      });
      $("#add_phone").click(function(e) {
        $(this).before('<p><div class="row"><div class="col-md-11 col-xs-10"><input type="text" name="phone[]" class="form-control phone" placeholder="Phone"></div><div class="col-md-1 col-xs-2"><a href="javascript:void(0)" onclick="remove_field(this);" class="remove_field">x</a></div></div></p>');
         StartRules();
      });
   // });
    </script>
  @endsection
