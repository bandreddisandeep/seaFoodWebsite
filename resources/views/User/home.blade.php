@include('User.header',['productnames' => $productnames])
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
<div class="innerBody">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img height="50%" width="100" class="d-block w-100" src="https://images.pexels.com/photos/396547/pexels-photo-396547.jpeg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img height="50%" width="100" class="d-block w-100" src="https://images.pexels.com/photos/695644/pexels-photo-695644.jpeg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img height="50%" width="100" class="d-block w-100" src="https://images.pexels.com/photos/1040499/pexels-photo-1040499.jpeg" alt="Third slide">
    </div>
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

  <h3>Sea Food Supply</h3>
   @include('World.trendingSeafood',['products' => $seafood])
<h3>Spices</h3>
   @include('World.trendingSpecies',['products' => $species])
  
<div class="totalBlock">
@foreach($products as $product)
<a id="a" href="/singleItem/{{$product->category}}/{{$product->prod_id}}">
<div id="block" class="row">
<div class="col-5">
  <img class="block-image" height="100%" width="80%" src="{{ URL::to('public/images/' . $product->product_pic1) }}" alt="Card image cap">
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

</html>

