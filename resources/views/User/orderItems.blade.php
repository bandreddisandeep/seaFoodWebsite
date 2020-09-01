@include('User.header',['productnames' => $productnames])

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
  <img class="block-image" height="100%" width="80%" src="{{ URL::to('public/images/p_letter.jpg') }}" alt="Card image cap">
</div>
<div id="textDescript" class="col-7">
<div class="form-row">
  <div class="form-group col-md-9">
    <h5 class="card-title">Bill No : {{$individualBill->Bill_id}}</h5>
<?php $date = explode(" ",$individualBill->created_at); ?>
    <p id="secondary" class="card-text">Ordered On : {{$date[0]}}</p>
    <button class="btn btn-dark btn-sm">View Bill</button>
  </div>
  <div class="form-group col-md-3">
  <h5 class="card-title">Rs.{{round($individualBill->Bill_price,2)}}</h5>
</div>
</div>
</div>
</div>
</span>
<div id="{{$individualBill->Bill_id}}" class="individualBill">
<table id="{{$individualBill->Bill_id.'table'}}" style="width:100%">
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
    <td>{{round($bill->product_price,2)}}</td>
    <td>{{round($bill->offer_price,2)}}</td>
    <td>{{round($bill->offer_price*$bill->sel_quantity,2)}}</td>
</tr>
@endif
@endforeach
<h4 style="color:red">Status : {{$individualBill->Bill_status}} 
@if(Session::get('NameLoggedIn')=="admin")
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="updateStatus('{{$individualBill->Bill_id}}','{{$individualBill->Bill_status}}')">Edit Status</button>
@endif
</h4>
<button style="float:right;margin:10px" class="btn btn-Danger" onclick="exportTable('{{$individualBill->Bill_id}}')">Download Bill</button>
</table>
</div>
<!---Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form onsubmit="return loaderActivate()" method="post" action="/updateStatus">
      @csrf
          <div class="form-group">
            <input type="text" readonly class="form-control" name="bill_id" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Status:</label>
            <textarea class="form-control" name="status" id="message-text"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Status</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="blockFooter">
@if(Session::get('NameLoggedIn')=="admin")
<span class="footerTxt1">From: {{$individualBill->email_id}}</span>
@else
<span class="footerTxt1">Status: {{$individualBill->Bill_status}}</span>
@endif
<?php $date = explode(" ",$individualBill->created_at); ?>
<span class="footerTxt2">Date: {{$date[0]}}</span></div>
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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
   
<script>
    function loaderActivate(){
    document.getElementById("loaderBg").style.display = "block";
    return true;
}
 $(".individualBill").slideUp(1);
function slideToggleFun(x){
     $(".individualBill").slideUp(1);
    let idTag = '#'+x;
     $(idTag).slideToggle();
}
function updateStatus(billId,billStatus){
  document.getElementById("recipient-name").value = billId;
  document.getElementById("message-text").value = billStatus;
}
//export excel

    function exportTable(billTable){   
        let getTable = '#'+billTable+'table';
         let getTableFile = billTable+'.pdf';
         html2canvas($(getTable)[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download(getTableFile);
                }
            });
    }
</script>
</html>

