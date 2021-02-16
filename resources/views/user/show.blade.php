@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">Users</div>

                       <div class="panel-body">

                                    <div class="row">
                                        <div class="col-md-2 col-xs-2 b-r">
                                            <strong>Full Name</strong>
                                        </div>
                                        <div class="col-md-8 col-xs-8 b-r">
                                            <p class="text-muted">{{$datas->name}}</p>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-2 col-xs-2 b-r">
                                            <strong>gender</strong>
                                        </div>
                                        <div class="col-md-8 col-xs-8 b-r">
                                            <p class="text-muted">{{$datas->gender}}</p>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-2 col-xs-2 b-r">
                                            <strong>card_id</strong>
                                        </div>
                                        <div class="col-md-8 col-xs-8 b-r">
                                            <p class="text-muted">{{$datas->card_id}}</p>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-2 col-xs-2 b-r">
                                            <strong>nationality </strong>
                                        </div>
                                        <div class="col-md-8 col-xs-8 b-r">
                                            <p class="text-muted">{{$datas->nationality}}</p>
                                        </div>
                                    </div>
                                    <hr>


                                    <div class="row">
                                        <div class="col-md-2 col-xs-2 b-r">
                                            <strong>phone </strong>
                                        </div>
                                        <div class="col-md-8 col-xs-8 b-r">
                                            @foreach ($datas->phone as $key => $phone)
                                              <li>{{ $phone->phone }}</li>
                                               @endforeach
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-2 col-xs-2 b-r">
                                            <strong>address </strong>
                                        </div>
                                        <div class="col-md-8 col-xs-8 b-r">
                                            @foreach ($datas->address as $key => $address)
                                              <li>{{ $address->address }}</li>
                                               @endforeach
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-2 col-xs-2 b-r">
                                            <strong>Email</strong>
                                        </div>
                                        <div class="col-md-8 col-xs-8 b-r">
                                            <p class="text-muted">{{$datas->email}}</p>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-2 col-xs-2 b-r">
                                            <strong>Last Register</strong>
                                        </div>
                                        <div class="col-md-8 col-xs-8 b-r">
                                            <p class="text-muted">{{$datas->created_at}}</p>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-2 col-xs-2 b-r">
                                            <strong>Last Update</strong>
                                        </div>
                                        <div class="col-md-8 col-xs-8 b-r">
                                            <p class="text-muted">{{$datas->updated_at}}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    </div>
            </div>

        </div>
    </div>
</div>

@endsection
