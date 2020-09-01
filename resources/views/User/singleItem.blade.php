@include('User.header',['productnames' => $productnames])
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
<div id="loaderBg">
  <div class="loader"></div>
</div>
<div class="innerBody">
<div class="form-row">
<div id="singleItemsDisplay" class="form-group col-md-6">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  @if($selectedItem[0]->product_pic1!='')
    <div class="carousel-item active">
      <img height="100%" width="50%" class="d-block w-100" src="/public/images/{{ $selectedItem[0]->product_pic1 }}" alt="First slide">
    </div>
  @endif
  @if($selectedItem[0]->product_pic2!='')
    <div class="carousel-item">
      <img height="100%" width="50%" class="d-block w-100" src="/public/images/{{ $selectedItem[0]->product_pic2 }}" alt="Second slide">
    </div>
  @endif
  @if($selectedItem[0]->product_pic3!='')
    <div class="carousel-item">
      <img height="100%" width="50%" class="d-block w-100" src="/public/images/{{ $selectedItem[0]->product_pic3 }}" alt="Third slide">
    </div>
  @endif
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<div class="form-group col-md-6">
<div class="content">
<h3 class="card-title">{{$selectedItem[0]->product_name}}</h3>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Product Type</th>
      <th scope="col">{{$selectedItem[0]->category}}</th>
    </tr>
    <tr>
      <th>Product Price</th>
      <th><span class="strikeAmount">Rs. {{round($selectedItem[0]->product_price,2)}}</span> Rs. {{round($selectedItem[0]->offer_price,2)}}</th>
    </tr>
    <tr>
      <th>Description</th>
      <th>{{$selectedItem[0]->description}}</th>
    </tr>
    <tr>
      <th>Available</th>
      <th>{{$selectedItem[0]->total_quantity}} {{$selectedItem[0]->type}}</th>
    </tr>
    <tr>
      <th>Views</th>
      <th>{{$selectedItem[0]->views}}</th>
    </tr>
    @if(Session::has('NameLoggedIn'))
@if(Session::get('NameLoggedIn')!="admin")
    <tr>
      <th>
<div class="row">
   <div class="form-group col-md-12">Quantity</div>
    </div>
    </div>
    </th>
    <th>
  <div style="width:50%;margin-left:25%">
      <input required value="1" name="EnteredPrice" oninput="calcTotalPrice(this.value)" type="number" class="form-control" id="EnteredPrice" placeholder="Quantity">
    </div>
    </th>  
    </tr>
@endif
@endif
    <tr>
    <th>
    Total
    </th>
    <th>
    <div id="totalPrice">
    Rs.{{round($selectedItem[0]->offer_price,2)}}
    </div>
    </th>
    </tr>
    <tr>
    <th>
    <input disabled style="display:none" id="availability" value="{{$selectedItem[0]->total_quantity}}" >
    <input disabled style="display:none" id="savedPrice" value="{{$selectedItem[0]->offer_price}}"  type="number">

<div class="form-group col-md-12">

@if(Session::has('NameLoggedIn'))
@if(Session::get('NameLoggedIn')=="admin")
<form class="checkOut" onsubmit="return loaderActivate()" method="post" action="/{{$selectedItem[0]->prod_id}}/delete">
@csrf
<button type="submit" class="btn btn-danger">Delete</button>
</form>
      @endif
  @endif
  </div>
    </th>
    <th>
    
  <div class="form-group col-md-12">
@if(Session::has('NameLoggedIn'))
@if(Session::get('NameLoggedIn')=="admin")
<form class="checkOut" onsubmit="return loaderActivate()" method="post" action="/{{$selectedItem[0]->prod_id}}/update">
@csrf
<button type="submit" class="btn btn-success">Update</button>
</form>
@else
<form class="checkOut" onsubmit="return loaderActivate()" method="post" action="/{{$selectedItem[0]->prod_id}}/addToCart">
@csrf
<input style="display:none" id="quantity_backend" name="quantity_backend" value="1">
  <button type="submit" class="btn btn-primary">Add to Cart</button>
  </form>
  @endif
  @else
  <button data-toggle="modal" data-target="#exampleModalCenter" type="button" class="btn btn-primary">Add to Cart</button>
      @endif
  </div>
</th>
    </tr>
  </thead>
  <tbody>
    
  </tbody>
</table>
</div>
</div>
</div>

<h3>{{$category}} Trending</h3>
@if($category=='SeaFood')
  @include('World.trendingSeafood',['products' => $ItemCategoryTrending])
@else
  @include('World.trendingSpecies',['products' => $ItemCategoryTrending])
@endif

<div class="totalBlock">
@foreach($products as $product)
<a id="a" href="/singleItem/{{$product->category}}/{{$product->prod_id}}">
<div id="block" class="row">
<div class="col-5">
  <img class="block-image" height="100%" width="80%" src="/public/images/{{ $product->product_pic1 }}" alt="Card image cap">
</div>
<div id="textDescript" class="col-7">
<div class="form-row">
  <div class="form-group col-md-9">
    <h5 class="card-title">{{$product->product_name}}</h5>
    <p id="secondary" class="card-text">{{$product->description}}</p>
  </div>
  <div class="form-group col-md-3">
  <h5 class="card-title"><span class="strikeAmount">Rs. {{round($product->product_price,2)}}</span> Rs.{{round($product->offer_price,2)}}/{{$product->type}}</h5>
  <p id="secondary" class="card-text">{{$product->views}} Views</p>
</div>
</div>
</div>
</div>
<div class="blockFooter"><span class="footerTxt1">views: {{$product->views}}</span><span class="footerTxt2">purchases: {{$product->purchases}}</span></div>
</a>
@endforeach
</div>
</div>
@include('User.footer')
</body>
<script>
function calcTotalPrice(text){
  if(text<=parseInt(document.getElementById('availability').value)){
    document.getElementById('totalPrice').innerHTML = 'Rs. '+ document.getElementById('savedPrice').value*text;
    document.getElementById('quantity_backend').value = text;
    document.getElementById('quantity_backend2').value = text;
  }
  else{
    document.getElementById('totalPrice').innerHTML = 'Rs. '+ document.getElementById('savedPrice').value;
    document.getElementById('quantity_backend').value = 1;
    document.getElementById('EnteredPrice').value =  1;
  }
}
function loaderActivate(){
  if(parseInt(document.getElementById("EnteredPrice").value)<0 || document.getElementById("EnteredPrice").value==""){
    return false;
  }
    document.getElementById("loaderBg").style.display = "block";
    return true;
}
</script>
</html>
