@extends('bootstrapLinks')
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/">BRP Foods</a>
  <div class="customizedInner">
  @if(Session::has('NameLoggedIn'))
@if(Session::get('NameLoggedIn')!="admin")
      <a href="/cartItems"><span class="input-group-text1" id="basic-addon2"><ion-icon size="large" name="cart"></ion-icon></span><span class="badge badge-danger">{{ Session::get('noofNotifications')}}</span></a>
      @else
      <a href="/admin/PostProduct"><span class="input-group-text1" id="basic-addon2"><ion-icon size="large" name="add-circle-sharp"></ion-icon></span></a>
      @endif
      @else
      <span data-toggle="modal" data-target="#exampleModalCenter" class="input-group-text1" id="basic-addon2"><ion-icon size="large" name="cart"></ion-icon></span>
      @endif
</div>
  <form onsubmit="return true" method="post" action="/searchItem" id="navForm" class="form my-2 my-lg-0">
  @csrf
    <div class="input-group">

  <input type="text" class="form-control" name="searchElement" list="searchElements" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <datalist id="searchElements" >
  @foreach($productnames as $productname)
    <option value="{{$productname->product_name}}">
  @endforeach
    
</datalist>
<button type="submit">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2"><ion-icon size="large" name="search-outline"></ion-icon></span>
  </div>
  </button>
</div>
    </form>
    <div class="customized">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
      @if(Session::has('NameLoggedIn'))
@if(Session::get('NameLoggedIn')!="admin")
      <a href="/cartItems"><span class="input-group-text1" id="basic-addon2"><ion-icon size="large" name="cart"></ion-icon></span><span class="badge badge-danger">{{ Session::get('noofNotifications')}}</span></a>
      </li>
      @else
      <a href="/admin/PostProduct"><span class="input-group-text1" id="basic-addon2"><ion-icon size="large" name="add-circle-sharp"></ion-icon></span></a>
      </li>
      @endif
      @else
      <span data-toggle="modal" data-target="#exampleModalCenter" class="input-group-text1" id="basic-addon2"><ion-icon size="large" name="cart"></ion-icon></span>
      @endif
    </ul>
</div>

<!-- row end -->
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item active">
      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Categories
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="/Seafood">Seafood</a>
    <a class="dropdown-item" href="/Species">Spices</a>
  </div>
</div>     
 </li>
      <li class="nav-item">
<!-- Button trigger modal -->
        @if(Session::has('NameLoggedIn'))
        <div class="dropdown">
  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  {{ Session::get('NameLoggedIn')}}
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
@if(Session::get('NameLoggedIn')!="admin")
    <a class="dropdown-item" href="/orders">Orders</a>
    @else
    <a class="dropdown-item" href="/adminOrders">Orders</a>
    @endif
    <a class="dropdown-item" href="{{ url('auth/google/logout') }}">Logout!</a>
  </div>  
  </div>  
  @else
  <div class="dropdown">
  <button class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">Login!</button>
  </div>  
@endif
      </li>
    </ul>
  </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Please Login!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" onsubmit="return loaderActivateLogin()" action="/adminLogin">
      @csrf

  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" required name="adminEmail" class="form-control" placeholder="Enter email" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" required name="adminPassw" class="form-control" placeholder="Enter password" id="pwd">
  </div>
  <h5 class="warning">Please use Google Login!</h5>
  <button type="submit" id="nmlLoginBtn" class="btn btn-primary">Login</button>
  <a href="{{ url('auth/google') }}"><button type="button" id="nmlLoginBtn" class="btn btn-primary">Google Login</button></a>
</form>
      </div>
    </div>
  </div>
</div>
<script>
function loaderActivateLogin(){
  if(document.getElementById('email').value=='admin@mail.com' && document.getElementById('pwd').value=='123'){
    document.getElementById("loaderBg").style.display = "block";
    return true;
  }else{
    return false;
  }
    
}
</script>