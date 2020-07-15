@include('User.header')
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
<div class="innerBody">
<div id="loaderBg">
  <div class="loader"></div>
</div>
<form class="postFormAdmin" onsubmit="return loaderActivate()" name="postProductForm" method="post" enctype="multipart/form-data">
@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Product Name<span class="required-symbol">*</span></label>
      <input required name="productName" type="text" class="form-control" id="inputEmail4" placeholder="Product Name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Product Type<span class="required-symbol">*</span></label>
      <input required name="productType" list="categories" type="text" class="form-control" id="inputPassword4" placeholder="Product Type">
      <datalist id="categories" >
    <option value="SeaFood">
    <option value="Species">
</datalist>
</div>
  </div>
  
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputPassword4">Product Price<span class="required-symbol">*</span></label>
      <input required name="productPrice" type="number" class="form-control" id="inputPassword4" placeholder="Product Price">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail3">Offer Price<span class="required-symbol">*</span></label>
      <input required name="offerPrice" type="number" class="form-control" id="inputEmail3" placeholder="Offer Price">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputPassword3">Quantity type<span class="required-symbol">*</span></label>
      <input required name="QuantityType" type="text" class="form-control" id="inputPassword3" placeholder="Quantity">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword3">Total Quantity<span class="required-symbol">*</span></label>
      <input required name="totalQuantity" type="text" class="form-control" id="inputPassword3" placeholder="Quantity">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Pic 1<span class="required-symbol">*</span></label>
      <input required name="picOne" type="file" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Pic 2</label>
      <input type="file" name="picTwo" class="form-control" id="inputCity">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Pic 3</label>
      <input type="file" name="picThree" class="form-control" id="inputCity">
    </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description<span class="required-symbol">*</span></label>
    <textarea required name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Post Product</button>
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

