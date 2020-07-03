@extends('bootstrapLinks')
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/">Navbar</a>
  <form class="form my-2 my-lg-0">
    <div class="input-group">
  <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
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
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    
  </div>
  
</nav>
