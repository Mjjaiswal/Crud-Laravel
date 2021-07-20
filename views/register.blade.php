
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="jumbotron">
<center><h2>Registration Here</h2></center>
</div>
@if(Session::has('succMsg'))
<div class="alert alert-success">{{session('succMsg')}}</div>
@endif
@if(Session::has('errMsg'))
<div class="alert alert-danger">{{session('errMsg')}}</div>
@endif
<form action="{{url('/registerpost')}}" method="post" enctype="multipart/form-data">
@csrf()
  <div class="form-row">
  <div class="form-group">
     <label for="inputAddress"> Name</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Name" name="name">
  </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
    </div>
  </div>
  <input type="file" class="form-control" name="file">
  <button type="submit" class="btn btn-primary">Register</button>
</form>
