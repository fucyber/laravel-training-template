@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">User</div>
          <div class="panel-body">
            <div class="nav_num right hide_mobile">
              <div class="total_nav">{{$datas->total()}} Results Found</div>
              <ul class="pagination">
                @for ($i=1; $i <= $datas->lastPage() ; $i++)
                  @if ($datas->currentPage()==$i)
                    <li class="active"><a href="{{$datas->url($i)}}">{{$i}}</a></li>
                  @else
                    <li ><a href="{{$datas->url($i)}}">{{$i}}</a></li>
                  @endif
                @endfor
                <li class="nav_next"><a href="{{$datas->nextPageUrl()}}">&rsaquo;</a></li>
                <li class="nav_next"><a href="{{$datas->url($datas->lastPage())}}">&raquo;</a></li>
              </ul>
            </div>
            <table class="table table-hover table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>e-Mail</th>
                  <th>Name</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @php $i=0 @endphp
                @foreach ($datas as $key => $data)
                  @if($data->status==1)
                    <tr>
                      <th scope="row">{{ ++$i }}</th>
                      <td>{{ $data->email }}</td>
                      <td>{{ $data->name }}</td>
                      <td>
                        @if (Auth::user()->id==$data->id)
                          <a class="btn btn-info btn-outline" href="{{ URL::to('user/' . $data->id . '/edit') }}">Edit</a>
                        @else
                          <a class="btn btn-info btn-outline" href="{{ URL::to('user/' . $data->id . '/edit') }}">Edit</a>
                          <a class="btn btn-danger btn-outline" href="{{ URL::to('remove/' . $data->id. '/0') }}">Remove</a>
                        @endif
                      </td>
                    </tr>
                  @else
                    <tr>
                      <th scope="row"> <strike>{{ ++$i }} </strike></th>
                      <td> <strike>{{ $data->email }} </strike></td>
                      <td> <strike>{{ $data->name }} </strike></td>
                      <td>
                        <a class="btn btn-warning btn-outline" href="{{ URL::to('remove/' . $data->id . '/1') }}">Restore</a>
                      </td>
                    </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
            <div class="topic_top">
              <div class="nav_num right">
                <div class="total_nav">{{$datas->total()}} Results Found</div>
                <ul class="pagination">
                  @for ($i=1; $i <= $datas->lastPage() ; $i++)
                    @if ($datas->currentPage()==$i)
                      <li class="active"><a href="{{$datas->url($i)}}">{{$i}}</a></li>
                    @else
                      <li ><a href="{{$datas->url($i)}}">{{$i}}</a></li>
                    @endif
                  @endfor
                  <li class="nav_next"><a href="{{$datas->nextPageUrl()}}">&rsaquo;</a></li>
                  <li class="nav_next"><a href="{{$datas->url($datas->lastPage())}}">&raquo;</a></li>
                </ul>
              </div>
              <div class="clear"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
