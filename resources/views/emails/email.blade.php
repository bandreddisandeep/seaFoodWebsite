@include('bootstrapLinks')

<div style="background-color:black;color:white">
    <h2 style="text-align:center;text-decoration:underline;">BRP Foods</h2>
<h3>Bill Id : {{$orderPrice[0]->Bill_id}}</h3>
<table style="width:100%;border: 1px solid white;">
  <tr style="border: 1px solid white;">
    <th style="border: 1px solid white;">Product</th>
    <th style="border: 1px solid white;">Qty</th>
    <th style="border: 1px solid white;">Product Price</th>
    <th style="border: 1px solid white;">Offer Price</th>
    <th style="border: 1px solid white;">Total Price</th>
  </tr>
  
  @foreach($orderPrice as $bill)
<tr style="border: 1px solid white;">
    <th style="border: 1px solid white;">{{$bill->product_name}}</th>
    <th style="border: 1px solid white;">{{$bill->sel_quantity}}</th>
    <th style="border: 1px solid white;">{{$bill->product_price}}</th>
    <th style="border: 1px solid white;">{{$bill->offer_price}}</th>
    <th style="border: 1px solid white;">{{$bill->offer_price*$bill->sel_quantity}}</th>
</tr>
@endforeach
</table>
<h3>Total Price : {{$totalPrice}}</h3>
</div>