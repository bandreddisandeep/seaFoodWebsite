@include('User.header',['productnames' => $productnames])
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
<div class="innerBody">

<h3>Seafood Trending</h3>
@include('World.trendingSeafood',['products' => $SeaFood])

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
  <p id="secondary" class="card-text">{{$product->views}} Views</p>
</div>
</div>
</div>
</div>
<div class="blockFooter"><span class="footerTxt1">views: {{$product->views}}</span><span class="footerTxt2">purchases: {{$product->purchases}}</span></div>
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
</div>
@include('User.footer')
</body>
</html>