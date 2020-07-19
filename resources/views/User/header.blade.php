@extends('bootstrapLinks')
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/">Amaxon</a>
  <form id="navForm" class="form my-2 my-lg-0">
    <div class="input-group">

  <input type="text" class="form-control" list="searchElements" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <datalist id="searchElements" >
    <option value="Chocolate">
    <option value="Coconut">
    <option value="Mint">
    <option value="Strawberry">
    <option value="Vanilla">c
</datalist>

  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2"><ion-icon size="large" name="search-outline"></ion-icon></span>
  </div>
</div>
    </form>
    <div class="customized">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
      <span class="input-group-text1" id="basic-addon2"><ion-icon size="large" name="cart"></ion-icon></span>
      </li>
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
    <a class="dropdown-item" href="/Species">Species</a>
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
    <a class="dropdown-item" href="/Seafood">Orders</a>
    <a class="dropdown-item" href="{{ url('auth/google/logout') }}">Logout!</a>
  </div>  
  @else
  <a class="nav-link " data-toggle="modal" data-target="#exampleModalCenter">Login!</a>
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
      <form action="/action_page.php">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" id="pwd">
  </div>

  <button type="submit" id="nmlLoginBtn" class="btn btn-primary">Login</button>
  <a href="{{ url('auth/google') }}"><button type="button" id="nmlLoginBtn" class="btn btn-primary">Google Login</button></a>
</form>
      </div>
    </div>
  </div>
</div>