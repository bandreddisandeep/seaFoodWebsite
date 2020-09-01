@include('User.header',['productnames' => $productnames])
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
<div id="loaderBg">
  <div class="loader"></div>
</div>
<div class="innerBody">

<form class="postFormAdmin" onsubmit="return loaderActivate()" action="/admin/updateProduct" method="post" enctype="multipart/form-data">
@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Product Name<span class="required-symbol">*</span></label>
      <input style="display:none" name="prod_id_update" readonly value="{{$selectedItem[0]->prod_id}}">
      <input required name="productName" type="text" class="form-control" id="inputEmail4" placeholder="Product Name" value="{{$selectedItem[0]->product_name}}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Product Type<span class="required-symbol">*</span></label>
      <input required name="productType" list="categories" type="text" class="form-control" id="inputPassword4" placeholder="Product Type" value="{{$selectedItem[0]->category}}">
      <datalist id="categories" >
    <option value="SeaFood">
    <option value="Species">
</datalist>
</div>
  </div>
  
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputPassword4">Product Price<span class="required-symbol">*</span></label>
      <input required name="productPrice" type="number" step="0.01" class="form-control" id="inputPassword4" placeholder="Product Price" value="{{$selectedItem[0]->product_price}}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail3">Offer Price<span class="required-symbol">*</span></label>
      <input required name="offerPrice" type="number" step="0.01" class="form-control" id="inputEmail3" placeholder="Offer Price" value="{{$selectedItem[0]->offer_price}}">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputPassword3">Quantity type<span class="required-symbol">*</span></label>
      <input required name="QuantityType" type="text" class="form-control" id="inputPassword3" placeholder="Quantity" value="{{$selectedItem[0]->type}}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword3">Total Quantity<span class="required-symbol">*</span></label>
      <input required name="totalQuantity" type="text" class="form-control" id="inputPassword3" placeholder="Quantity" value="{{$selectedItem[0]->total_quantity}}">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    @if($selectedItem[0]->product_pic1)
    <img height="200" width="100%" src="/public/images/{{ $selectedItem[0]->product_pic1}}" alt="First slide">
     @endif
     <label for="inputCity">Change Pic 1<span class="required-symbol">*</span></label>
      <input name="picOne" type="file" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-6">
    @if($selectedItem[0]->product_pic2)
    <img height="200" width="100%" src="/public/images/{{ $selectedItem[0]->product_pic2}}" alt="First slide">
     @endif
     <label for="inputCity">Pic 2</label>
      <input type="file" name="picTwo" class="form-control" id="inputCity">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    @if($selectedItem[0]->product_pic3)
    <img height="200" width="100%" src="/public/images/{{ $selectedItem[0]->product_pic3}}" alt="First slide">
     @endif
      <label for="inputCity">Pic 3</label>
      <input type="file" name="picThree" class="form-control" id="inputCity">
    </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description<span class="required-symbol">*</span></label>
    <textarea required name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$selectedItem[0]->description}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Update Product</button>
</form>
</div>
@include('User.footer')
</body>
<script>
function loaderActivate(){
  document.getElementById("loaderBg").style.display = "block";
    return true;
}
</script>
</html>

