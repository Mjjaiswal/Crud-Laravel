<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@if(Session::has('succMsg'))
<div class="alert alert-success">{{session('succMsg')}}</div>
@endif
<table class="table">
    <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Email</th>
        <th>File</th>
        <th>Action</th>
    </tr>
    @php
    $sn=1
    @endphp
    @foreach($regdata as $reg)
    <tr>
        <th>{{$sn}}</th>
        <th>{{$reg->name}}</th>
        <th>{{$reg->email}}</th>
        <th><img src="{{asset('public/upload/'.$reg->file)}}" width=50 height=50></th>
        <th>
            <a href="{{url('editcrud/'.$reg->id)}}" class="btn btn-info">Edit</a>
            <a href="{{url('delreg/'.$reg->id)}}" class="btn btn-danger" onclick="confirm('Do you want to delete')">Delete</a>
        </th>
    </tr>
    @php
    $sn++;
    @endphp
    @endforeach
</table>