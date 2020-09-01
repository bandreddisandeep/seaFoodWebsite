<div class="w3-display-container">
<div id="content" class="prawnsTrending">
<?php
$totalProducts = 0;
foreach($products as $product){
  if($product->category=="SeaFood"){
    $totalProducts += 1;
?>
<a id="a" href=<?php echo "/singleItem/SeaFood/".$product->prod_id ?>>
<div class="card" id="card-style">
  <img class="card-img-top" height="100" width="100" src='/public/images/<?php echo $product->product_pic1; ?>' alt="Card image cap">
  <div id="b" class="card-body">
    <p class="card-title"><?php echo $product->product_name; ?><br>Rs.<?php echo round($product->offer_price,2); ?></p>
  </div>
</div>
</a>
<?php
}
}
?>
</div>
<?php if($totalProducts>=6) {?>
<button class="w3-button w3-black w3-display-left" id="left-button">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" id="right-button">&#10095;</button>
<?php }?>
</div>
<script>
    $('#right-button').click(function() {
  event.preventDefault();
  $('#content').animate({
    scrollLeft: "+=500px"
  }, "slow");
});

 $('#left-button').click(function() {
  event.preventDefault();
  $('#content').animate({
    scrollLeft: "-=500px"
  }, "slow");
});
    </script>