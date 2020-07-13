@extends('bootstrapLinks')
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/">Navbar</a>
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
        <a class="nav-link" href="#">Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">Login</a>
      </li>
    </ul>
    
  </div>
  
</nav>
