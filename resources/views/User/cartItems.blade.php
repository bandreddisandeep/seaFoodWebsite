@include('User.header')
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
<div class="innerBody">

<div class="form-row">
<div id="singleItemsDisplay" class="form-group col-md-6">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  @if($selectedItem[0]->product_pic1!='')
    <div class="carousel-item active">
      <img height="100%" width="50%" class="d-block w-100" src="/images/{{ $selectedItem[0]->product_pic1 }}" alt="First slide">
    </div>
  @endif
  @if($selectedItem[0]->product_pic2!='')
    <div class="carousel-item">
      <img height="100%" width="50%" class="d-block w-100" src="/images/{{ $selectedItem[0]->product_pic2 }}" alt="Second slide">
    </div>
  @endif
  @if($selectedItem[0]->product_pic3!='')
    <div class="carousel-item">
      <img height="100%" width="50%" class="d-block w-100" src="/images/{{ $selectedItem[0]->product_pic3 }}" alt="Third slide">
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
      <th><span class="strikeAmount">Rs. {{$selectedItem[0]->product_price}}</span> Rs. {{$selectedItem[0]->offer_price}}</th>
    </tr>
    <tr>
      <th>Description</th>
      <th>{{$selectedItem[0]->description}}</th>
    </tr>
    <tr>
      <th>Available</th>
      <th>{{$selectedItem[0]->total_quantity}}</th>
    </tr>
    <tr>
      <th>Min Order</th>
      <th>{{$selectedItem[0]->type}}</th>
    </tr>
    <tr>
      <th>Views</th>
      <th>{{$selectedItem[0]->views}}</th>
    </tr>
    <tr>
      <th>Purchases</th>
      <th>{{$selectedItem[0]->purchases}}</th>
    </tr>
    <tr>
      <th>
      <form class="checkOut" onsubmit="return loaderActivate()" name="postProductForm" method="post" enctype="multipart/form-data">
@csrf
<div class="form-row">
   <div class="form-group col-md-12">Quantity</div>
    </div>
  <div class="form-row">
  <div class="form-group col-md-12">
      <input required value="1" name="EnteredPrice" oninput="calcTotalPrice(this.value)" type="number" class="form-control" id="EnteredPrice" placeholder="Quantity">
    </div>
    </div>
    </th>  
    <th>
    <div class="form-row">
    <input disabled style="display:none" id="availability" value="{{$selectedItem[0]->total_quantity}}" >
    <input disabled style="display:none" id="savedPrice" value="{{$selectedItem[0]->offer_price}}"  type="number">
<div id="totalPrice" class="form-group col-md-12">
    Rs.{{$selectedItem[0]->offer_price}}
    </div>
    </div>
    <div class="form-row">
<div class="form-group col-md-6">
  <button type="submit" class="btn btn-primary">Add to Cart</button>
  </div>
  <div class="form-group col-md-6">
  <button type="submit" class="btn btn-success">Buy Now</button>
  </div>
  </div>
</form>
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
  <img class="block-image" height="100%" width="80%" src="/images/{{ $product->product_pic1 }}" alt="Card image cap">
</div>
<div id="textDescript" class="col-7">
<div class="form-row">
  <div class="form-group col-md-9">
    <h5 class="card-title">{{$product->product_name}}</h5>
    <p id="secondary" class="card-text">{{$product->description}}</p>
  </div>
  <div class="form-group col-md-3">
  <h5 class="card-title"><span class="strikeAmount">Rs. {{$product->product_price}}</span> Rs.{{$product->offer_price}}/{{$product->type}}</h5>
    <p class="card-text">{{$product->views}} Views</p>
</div>
</div>
</div>
</div>
</a>
@endforeach
</div>
</div>
@include('User.footer')
</body>
<script>
function calcTotalPrice(text){
  if(text>=0 && text<=document.getElementById('availability').value){
    document.getElementById('totalPrice').innerHTML = 'Rs. '+ document.getElementById('savedPrice').value*text;
  }
  else{
    document.getElementById('totalPrice').innerHTML = 'Rs. '+ document.getElementById('savedPrice').value;
    document.getElementById('EnteredPrice').value =  1;
  }
}
</script>
</html>
