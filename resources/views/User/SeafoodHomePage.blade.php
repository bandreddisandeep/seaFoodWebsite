@include('User.header')
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
<h3>Seafood Trending</h3>
@include('World.trendingSeafood',['products' => $SeaFood])

<div class="totalBlock">
@foreach($products as $product)
<a id="a" href="redirect">
<div id="block" class="row">
<div class="col-3">
  <img class="block-image" height="100%" width="80%" src="/images/{{ $product->product_pic1 }}" alt="Card image cap">
</div>
<div id="textDescript" class="col-9">
<div class="form-row">
  <div class="form-group col-md-10">
    <h5 class="card-title">{{$product->product_name}}</h5>
    <p id="secondary" class="card-text">{{$product->description}}</p>
  </div>
  <div class="form-group col-md-2">
  <h5 class="card-title">Rs.{{$product->product_price}}</h5>
    <p class="card-text">{{$product->views}} Views</p>
</div>
</div>
</div>
</div>
</a>
@endforeach

<form name="loadMoreForm" method="post">
@csrf
  <div class="form-row">
  <div class="form-group col-md-6">
      <input name="totalProducts" type="hidden" value="{{count($products)}}">
    </div>
    </div>
<button type="submit" id="nextBtnInst" class="btn btn-dark">Load More</button>
</form>

</div>
@include('User.footer')
</body>
</html>