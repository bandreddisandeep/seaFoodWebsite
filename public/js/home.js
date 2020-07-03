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
