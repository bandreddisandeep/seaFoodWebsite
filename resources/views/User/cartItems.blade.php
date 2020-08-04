@include('User.header')

<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
<div id="loaderBg">
  <div class="loader"></div>
</div>
<div class="innerBody">

<div class="totalBlock">
@foreach($cartItems as $cartItem)
<div id="block" class="row">
<div class="col-5">
  <img class="block-image" height="100%" width="80%" src="{{ URL::to('/images/' . $cartItem->product_pic1) }}" alt="Card image cap">
</div>
<div id="textDescript" class="col-7">
<div class="form-row">
  <div class="form-group col-md-9">
    <h5 class="card-title"><a href="/singleItem/{{$cartItem->category}}/{{$cartItem->prod_id}}">{{$cartItem->product_name}}</a></h5>
    <p id="secondary" class="card-text">{{$cartItem->description}}</p>
    <button type="button" onclick="storeSelectedData({{$cartItem->prod_id}},{{$cartItem->no_of_items}},{{$cartItem->total_quantity}})" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter2">
    Qty : {{$cartItem->no_of_items}} {{$cartItem->type}}
  </button>
  <form style="display:inline" onsubmit="return loaderActivate()" method="post" action="/deleteItem/cartItems">
      @csrf
      <input style="display:none" name="selectedIdForDel" value="{{$cartItem->prod_id}}">
      <button id="desktopRemBtn" type="submit" class="btn btn-danger btn-sm">Remove</button>
</form>
  </div>
  <div class="form-group col-md-3">
  <h5 class="card-title"><span class="strikeAmount">Rs. {{$cartItem->product_price*$cartItem->no_of_items}}</span> Rs.{{$cartItem->offer_price*$cartItem->no_of_items}}</h5>
    <p id="secondary" class="card-text">{{$cartItem->views}} Views</p>
</div>
</div>
</div>
</div>
<form onsubmit="return loaderActivate()" method="post" action="/deleteItem/cartItems">
      @csrf
      <input style="display:none" name="selectedIdForDel" value="{{$cartItem->prod_id}}">
<div class="blockFooter"><span class="footerTxt1">views: {{$cartItem->views}}</span><span class="footerTxt2">purchases: {{$cartItem->purchases}}<button id="removeBtn" type="submit" class="btn btn-danger btn-sm">Remove</button></span></div>
</form>
@endforeach
<div class="form-row">
@if(Session::get('noofNotifications')!=0) 
  <div class="form-group col-md-10">
  </div>
  <div class="form-group col-md-2">
  <div style="float:right;margin-right:20%">
<h5 class="card-title">Total : Rs.{{number_format($totalPrice[0]->totalPrice, 2, '.', '')}}</h5>
<form onsubmit="return loaderActivate()" method="post" action="/checkout">
      @csrf
      <input style="display:none" name="total_price" value="{{number_format($totalPrice[0]->totalPrice, 2, '.', '')}}">
<button type="button" onclick="razorPayAmnt('{{number_format($totalPrice[0]->totalPrice, 2, '.', '')}}','{{date('YmdHis'.rand(1,100))}}')" class="btn btn-primary">Check Out</button>
<!-- <button type="submit" class="btn btn-primary">Check Out</button> -->
</form>
  </div>
  </div>
  @else
  <div class="form-group col">
  <div style="text-align:center">
<h5 class="card-title">Cart is Empty!!!</h5>
  </div>
  </div>
@endif
  </div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change Quantity</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form onsubmit="return loaderActivate()" method="post" action="/changeQuantity/cartItems">
      @csrf
      <div class="modal-body">
      <input style="display:none" id="selectedId" name="selectedId">
      
      <div class="form-group">
    <label for="exampleInputEmail1">Enter Quantity less than </label><input style="border:none" readonly id="selectedMaxQty">
    <input type="number" step="0.01" required class="form-control" id="selectedQuantity" name="selectedQuantity" aria-describedby="emailHelp" placeholder="Enter Quantity">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Quantity</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>

<h3>Sea Food Supply</h3>
   @include('World.trendingSeafood',['products' => $seafood])
<h3>Spices</h3>
   @include('World.trendingSpecies',['products' => $species])
  
@include('User.footer')
</body>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
function storeSelectedData(id,qty,totQty){
  document.getElementById('selectedId').value=id;
  document.getElementById('selectedQuantity').value=qty;
  document.getElementById('selectedMaxQty').value=totQty;
}
function loaderActivate(){
  if(parseInt(document.getElementById('selectedMaxQty').value)<parseInt(document.getElementById('selectedQuantity').value)){
    return false;
  }
    document.getElementById("loaderBg").style.display = "block";
    return true;
}
//razor pay setup
$.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
         }); 
function razorPayAmnt(amnt,id) {
  var totalAmount = amnt;
           var bill_id =  id;
           var options = {
           "key": "rzp_test_cz7JNpNK7k3gKX",
           "amount": (totalAmount*100), // 2000 paise = INR 20
           "name": "BRP Foods",
           "description": "Payment",
           "image": "{{ URL::to('/images/p_letter.jpg') }}",
           "handler": function (response){
                 $.ajax({
                   url: SITEURL + 'paysuccess',
                   type: 'post',
                   dataType: 'json',
                   data: {
                    razorpay_payment_id: response.razorpay_payment_id , 
                     totalAmount : totalAmount ,product_id : bill_id,
                   }, 
                   success: function (msg) {
          
                       window.location.href = SITEURL + 'razor-thank-you';
                   }
               });
             
           },
          "prefill": {
               "contact": '9988665544',
               "email":   'devfeedly21@gmail.com',
           },
           "theme": {
               "color": "#528FF0"
           }
         };
         var rzp1 = new Razorpay(options);
         rzp1.open();
         e.preventDefault();
}          
</script>
</html>

