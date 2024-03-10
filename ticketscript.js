var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
function save(){
    let title = $("#title").val();
    let desc = $("#desc").val();
    let price = $("#price").val();
    let image = $("#image").val();
    let place = $("#place").val();
    let time = $("#time").val();
    let status = $("#status").val();
    
    $.ajax({
      url: "ticket.php",
      type: "POST",
      dataType: "json",
      data: {titleInput: title, descInput: desc, priceInput: price,
        imageInput: image, placeInput: place, timeInput: time,
        statusInput: status},
      success: function(result){
          console.log(result);
          if(result.msg == ''){
              $('#errTitle').text(result.errTitle);
              $('#errDesc').text(result.errDesc);
              $('#msg').text('');
          }else{
              $('#msg').text(result.msg);
              $('#errTitle').text('');
              $('#errDesc').text('');
          }
      },
      error: function(error){
          console.log(error);      
      }
  });
}
function pay(){
  let cardNumber = $("#card-number").val();
  let cardHolder = $("#card-holder").val();
  let expiryDate = $("#expiry-date").val();
  let cvv = $("#cvv").val();

  $.ajax({
    url: "creditcard.php",
    type: "POST",
    dataType: "json",
    data: {cardNumber: cardNumber, 
      cardHolder: cardHolder, 
      expiryDate: expiryDate,
      cvv: cvv},
    success: function(result){
        console.log(result);
        if(result.msg == ''){
            $('#errCardHolder').text(result.errCardHolder);
            $('#errCardNumber').text(result.errCardNumber);
            $('#errExpiryDate').text(result.errExpiryDate);
            $('#errCvv').text(result.errCvv);
            $('#msg').text('');
        }else{
            $('#msg').text(result.msg);
            $('#errCardNumber').text('');
            $('#errCardHolder').text('');
            $('#errExpiryDate').text('');
            $('#errCvv').text('');
        }
    },
    error: function(error){
      console.log(error);      
    }
  });
  }
function popup(i){
  document.getElementById(i).classList.toggle("popup");
}
function buy() {
  window.location.href = "buyticket.php";
}