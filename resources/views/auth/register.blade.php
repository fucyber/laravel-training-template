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

        <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
        </div>

        @if(isset($obj))
        {!!Form::open(['route' => [$url, $obj->id], 'files' => true,'id'=>'form_register','method' => $method])!!}
        @else
        {!!Form::open(['route' => 'user.store', 'files' => true,'id'=>'form_register','method' => 'POST' ])!!}
        @endif
        {{ csrf_field() }}
        <div class="form-group">
            {!! Form::label('name','Name')!!}
            <div class="errorwrap">
                {!! Form::text('name',$obj->name ?? "", $attributes = ['placeholder' =>'Name' ,'id' => 'name' , 'class'
                =>'form-control validate-required '])!!}
                <span class="errorplace"></span>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('email','Email')!!}
            <div class="errorwrap">
                {!! Form::email('email', $obj->email ?? "", $attributes = ['placeholder' =>'Email' ,'id' => 'email' ,
                'class'
                =>'form-control validate-required validate-email'])!!}
                <span class="errorplace"></span>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('personal_id','Personal ID')!!}
            <div class="errorwrap">
                {!! Form::text('personal_id', $obj->personal_id ?? "", $attributes = ['placeholder' =>'Personal ID'
                ,'id' =>
                'personal_id' , 'class' =>'form-control validate-required validate-nationalid'])!!}
                <span class="errorplace"></span>
            </div>
        </div>
        <div class="form-group">
            <label for="gender" class="control-label input-group">Gender</label>
            <div class="btn-group" data-toggle="buttons">
                <label
                    class="btn btn-default {{  ($obj->gender ?? "") == 'Male' ? "active": (!isset($obj) ? "active":"")  }}">
                    {!! Form::radio('gender', 'Male', ($obj->gender ?? "") =='Male' ? true : (!isset($obj) ? true:false)
                    )!!}Male
                </label>
                <label class="btn btn-default {{ ($obj->gender ??  "")  =='Female' ? "active": "" }}">
                    {!! Form::radio('gender', 'Female', ($obj->gender ?? "") =='Female' ? true : false )!!}Female
                </label>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('nationality','Nationality')!!}
            {!! Form::select('nationality', ['Thai' => 'Thai', 'USA' => 'USA' ,'France'=>'France'], $obj->nationality ??
            'Thai', $attributes = ['class' =>'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('Address','Address')!!}
            @if(empty($obj->address))
            <p>
                <div class="row">
                    <div class="col-md-11 col-xs-10">
                        <div class="errorwrap">
                            {!! Form::textarea('address[]', $value = null, $attributes = ['placeholder' =>'Address'
                            ,'class'
                            =>'form-control validate-required address','size' =>'30x2'])!!}
                            <span class="errorplace"></span>
                        </div>
                    </div>
                    <div class="col-md-1 col-xs-2">

                    </div>
                </div>
            </p>
            @else
            @php $i=1 @endphp
            @foreach (unserialize($obj->address) as $key => $value)
            @if($i==1)
            <p>
                <div class="row">
                    <div class="col-md-11 col-xs-10">
                        <div class="errorwrap">
                            {!! Form::textarea('address[]', $value, $attributes = ['placeholder' =>'Address' ,'class'
                            =>'form-control
                            validate-required address','size' =>'30x2'])!!}
                            <span class="errorplace"></span>
                        </div>
                    </div>

                </div>
            </p>
            @else

            <p>
                <div class="row">
                    <div class="col-md-11 col-xs-10">
                        <div class="errorwrap">
                            {!! Form::textarea('address[]', $value, $attributes = ['placeholder' =>'Address' ,'class'
                            =>'form-control
                            validate-required address','size' =>'30x2'])!!}
                            <span class="errorplace"></span>
                        </div>
                    </div>
                    <div class="col-md-1 col-xs-2"><a href="javascript:void(0)" onclick="remove_field(this);"
                            class="remove_field">x</a></div>

                </div>
            </p>
            @endif

            @php $i++ @endphp
            @endforeach
            @endif

            {!! Form::button('เพิ่ม',$attributes = ['id'=>'add_address', 'class'=>'btn btn-info'])!!}
        </div>
        <div class="form-group">
            <label>Phone</label>
            @if(empty($obj->phone))
            <p>
                <div class="row">
                    <div class="col-md-11 col-xs-10">
                        <div class="errorwrap">
                            {!! Form::text('phone[]', $value = null, $attributes = ['placeholder' =>'Phone' , 'class'
                            =>'form-control
                            validate-required validate-numberonly validate-minlength9 validate-maxlength10
                            validate-zerobegin
                            phone','size' =>'30x2'])!!}
                            <span class="errorplace"></span>
                        </div>
                    </div>
                    <div class="col-md-1 col-xs-2">

                    </div>
                </div>
            </p>
            @else
            @php $n=1 @endphp
            @foreach (unserialize($obj->phone) as $key => $value)
            @if($n==1)
            <p>
                <div class="row">
                    <div class="col-md-11 col-xs-10">
                        <div class="errorwrap">
                            {!! Form::text('phone[]', $value, $attributes = ['placeholder' =>'Phone' , 'class'
                            =>'form-control
                            validate-required validate-numberonly validate-minlength9 validate-maxlength10
                            validate-zerobegin
                            phone','size' =>'30x2'])!!}
                            <span class="errorplace"></span>
                        </div>
                    </div>
                </div>
            </p>
            @else
            <p>
                <div class="row">
                    <div class="col-md-11 col-xs-10">
                        <div class="errorwrap">
                            {!! Form::text('phone[]', $value, $attributes = ['placeholder' =>'Phone' , 'class'
                            =>'form-control
                            validate-required validate-numberonly validate-minlength9 validate-maxlength10
                            validate-zerobegin
                            phone','size' =>'30x2'])!!}
                            <span class="errorplace"></span>
                        </div>
                    </div>
                    <div class="col-md-1 col-xs-2"><a href="javascript:void(0)" onclick="remove_field(this);"
                            class="remove_field">x</a></div>

                </div>
            </p>
            @endif

            @php $n++ @endphp
            @endforeach
            @endif
            {!! Form::button('เพิ่ม',$attributes = ['id'=>'add_phone', 'class'=>'btn btn-info'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('password','Password')!!}
            <div class="errorwrap">
                {!! Form::password('password',$attributes =['id'=>'password', 'placeholder' =>'Password','class'
                =>!isset($obj)
                ? 'form-control validate-required validate-minlength9' :'form-control'])!!}
                <span class="errorplace"></span>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation','Confirm Password')!!}
            <div class="errorwrap">
                {!! Form::password('password_confirmation',$attributes =['id'=>'password_confirmation', 'placeholder'
                =>'Confirm
                Password','class' =>!isset($obj) ? 'form-control validate-required validate-minlength9'
                :'form-control'])!!}
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
    $("#add_address").click(function(e) {
                $(this).before('<p><div class="row"><div class="col-md-11 col-xs-10"><div class="errorwrap"><textarea  name="address[]" class="form-control required validate-required address" placeholder="Address"></textarea><span class="errorplace"></span></div></div><div class="col-md-1 col-xs-2"><a href="javascript:void(0)" onclick="remove_field(this);" class="remove_field">x</a></div></div></p>');
            });
            $("#add_phone").click(function(e) {
                $(this).before('<p><div class="row"><div class="col-md-11 col-xs-10"><div class="errorwrap"><input type="text" name="phone[]" class="form-control  required validate-required validate-numberonly validate-minlength9 validate-maxlength10 validate-zerobegin phone" placeholder="Phone"><span class="errorplace"></span></div></div><div class="col-md-1 col-xs-2"><a href="javascript:void(0)" onclick="remove_field(this);" class="remove_field">x</a></div></div></p>');
            });
            $(function() {
                $("#form_register").validate({
                    errorPlacement: function(error, element) {
                        divelement = element.closest(".errorwrap").find(".errorplace");
                        error.appendTo(divelement);
                    },
                    submitHandler:function(form) {
                        var isValid = true;
                        $(".validate-required").each(function() {
                            if(!$(this).valid()) {
                                $(this).addClass('error');
                                isValid = false;
                            } else {
                                $(this).parent().closest(".errorwrap").find(".errorplace").html("")
                                $(this).removeClass('error');
                            }
                        });
                        if(isValid) {
                            //form.submit();
                            $('form#form_register').on('submit', function(event){
                                event.preventDefault();
                                var formData = $(this).serialize();
                                $.ajax({
                                    type     : "POST",
                                    url      : $(this).attr('action'),
                                    data     : formData,
                                    cache    : false,
                                    success  : function(data)
                                    {
                                        window.location.href = "{{URL::to('user')}}"
                                    },
                                    error: function (data)
                                    {
                                        printErrorMsg(data.responseJSON);
                                    },
                                })


                            });
                        }
                    },
                });
                StartRules();

                function printErrorMsg (msg) {
                    $(".print-error-msg").find("ul").html('');
                    $(".print-error-msg").css('display','block');
                    if(typeof msg.errors != "undefined"){
                        $.each( msg.errors, function( key, value ) {
                            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                        });
                    }else{
                        $(".print-error-msg").find("ul").append('<li>'+msg.message+'</li>');
                    }
                }
            });

            $(document).ready(function() {
                function printErrorMsg (msg) {
                    $(".print-error-msg").find("ul").html('');
                    $(".print-error-msg").css('display','block');
                    $.each( msg, function( key, value ) {
                        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                    });
                }
            });
</script>
@endsection