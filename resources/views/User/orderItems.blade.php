@include('User.header')

<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
<div id="loaderBg">
  <div class="loader"></div>
</div>
<div class="innerBody">

<div class="totalBlock">
@foreach($individualBills as $individualBill)
<span onclick="slideToggleFun('{{$individualBill->Bill_id}}')">
<div id="block" class="row">
<div class="col-5">
  <img class="block-image" height="100%" width="80%" src="{{ URL::to('/images/p_letter.jpg') }}" alt="Card image cap">
</div>
<div id="textDescript" class="col-7">
<div class="form-row">
  <div class="form-group col-md-9">
    <h5 class="card-title">Bill No : {{$individualBill->Bill_id}}</h5>
    <p id="secondary" class="card-text">Ordered On : {{$individualBill->created_at}}</p>
    <button class="btn btn-dark btn-sm">View Bill</button>
  </div>
  <div class="form-group col-md-3">
  <h5 class="card-title">Rs.{{$individualBill->Bill_price}}</h5>
</div>
</div>
</div>
</div>
</span>
<div id="{{$individualBill->Bill_id}}" class="individualBill">
<table style="width:100%">
  <tr>
    <th>Product</th>
    <th>Qty</th>
    <th>Product Price</th>
    <th>Offer Price</th>
    <th>Total Price</th>
  </tr>
  
  @foreach($bills as $bill)
@if($bill->Bill_id==$individualBill->Bill_id)
<tr>
    <td>{{$bill->product_name}}</td>
    <td>{{$bill->sel_quantity}}</td>
    <td>{{$bill->product_price}}</td>
    <td>{{$bill->offer_price}}</td>
    <td>{{$bill->offer_price*$bill->sel_quantity}}</td>
</tr>
@endif
@endforeach
<h4 style="color:red">Status : {{$individualBill->Bill_status}}</h4>
</table>
</div>
<div class="blockFooter"><span class="footerTxt2">Date: {{$individualBill->created_at}}</span></div>
@endforeach
<div class="form-row">
@if(count($individualBills)==0) 
  <div class="form-group col">
  <div style="text-align:center">
<h5 class="card-title">Not yet Ordered!!!</h5>
  </div>
  </div>
@endif
  </div>
  </div>
  <h3>Sea Food Supply</h3>
   @include('World.trendingSeafood',['products' => $seafood])
<h3>Spices</h3>
   @include('World.trendingSpecies',['products' => $species])
  
@include('User.footer')
</body>
<script>
    function loaderActivate(){
    document.getElementById("loaderBg").style.display = "block";
    return true;
}
 $(".individualBill").slideUp(1);
function slideToggleFun(x){
    let idTag = '#'+x;
     $(idTag).slideToggle();

}
  
</script>
</html>

