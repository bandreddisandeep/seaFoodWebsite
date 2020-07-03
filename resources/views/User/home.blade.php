@include('User.header')
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
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
    <div class="w3-display-container">
<div id="content" class="prawnsTrending">
@for ($i = 0; $i < 10; $i++)
<a id="a" href="redirect">
<div class="card" id="card-style">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div id="b" class="card-body">
    <h5 class="card-title">Card title</h5>
    <h5 class="card-title">Card title</h5>
    <h5 class="card-title">Rs.1000</h5>
  </div>
</div>
</a>
@endfor
</div>
<button class="w3-button w3-black w3-display-left" id="left-button">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" id="right-button">&#10095;</button>
</div>
<h3>Spices</h3>
    <div class="w3-display-container">
<div id="spicesContent" class="prawnsTrending">
@for ($i = 0; $i < 10; $i++)
<a id="a" href="redirect">
<div class="card" id="card-style">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div id="b" class="card-body">
    <h5 class="card-title">Card title</h5>
    <h5 class="card-title">Card title</h5>
    <h5 class="card-title">Rs.1000</h5>
  </div>
</div>
</a>
@endfor
</div>
<button class="w3-button w3-black w3-display-left" id="left-button-spices">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" id="right-button-spices">&#10095;</button>
</div>

<div class="totalBlock">
@for ($i = 0; $i < 10; $i++)
<a id="a" href="redirect">
<div id="block" class="row">
<div class="col-3">
  <img class="block-image" height="100%" width="80%" src="https://images.pexels.com/photos/396547/pexels-photo-396547.jpeg" alt="Card image cap">
</div>
<div id="textDescript" class="col-9">
<div class="form-row">
  <div class="form-group col-md-10">
    <h5 class="card-title">The Web Developer Bootcamp</h5>
    <p id="secondary" class="card-text">The only course you need to learn web development - HTML, CSS, JS, Node, and More!</p>
  </div>
  <div class="form-group col-md-2">
  <h5 class="card-title">Rs.455</h5>
    <p class="card-text">201 Bought</p>
</div>
</div>
</div>
</div>
</a>
@endfor
</div>

</body>
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
//spicesContent
$('#right-button-spices').click(function() {
  event.preventDefault();
  $('#spicesContent').animate({
    scrollLeft: "+=500px"
  }, "slow");
});

 $('#left-button-spices').click(function() {
  event.preventDefault();
  $('#spicesContent').animate({
    scrollLeft: "-=500px"
  }, "slow");
});
  </script>
</html>

