<?php
session_start();
require_once("Assest/main.php");
$obj= new front_end();
$db=$obj->Db_conn("amazone20");
extract($_SESSION);
extract($_POST);
if(isset($user) && isset($pay))
{
	 
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Payment Getway</title>
  
  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>

      <link rel="stylesheet" href="Assest/css/Payment.css">

  
</head>

<body>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<div class="container">
  <div id="Checkout" class="inline">
      <h1>Pay Invoice</h1>
      <div class="card-row">
          <span class="visa"></span>
          <span class="mastercard"></span>
          <span class="amex"></span>
          <span class="discover"></span>
      </div>
      <form method='post' action="payment.php">
          <div class="form-group">
              <label for="PaymentAmount">Payment amount : &nbsp; <b>Rs. <?php echo $pay;?></b></label>
              <input type="hidden" name="final_idd" value='<?php echo $_POST['cart_idd'];?>'>
          </div>
          <div class="form-group">
              <label or="NameOnCard">Name on card</label>
              <input id="NameOnCard" name='x[]' placeholder="Name on card" class="form-control" required type="text" maxlength="255"></input>
          </div>
          <div class="form-group">
              <label for="CreditCardNumber">Card number</label>
              <input id="CreditCardNumber" name='x[]' placeholder="16 Digit card no."  required pattern="[0-9]{16}" title='Enter 16 - Digit Number'  class="null card-image form-control" type="text"></input>
          </div>
          <div class="expiry-date-group form-group">
              <label for="ExpiryDate">Expiry date</label>
              <input id="ExpiryDate" name='x[]' class="form-control" pattern="[0-9]{4}"  required  type="text" placeholder="MMYY"></input>
          </div>
          <div class="security-code-group form-group">
              <label for="SecurityCode">Cvv no.</label>
              <div class="input-container" >
                  <input id="SecurityCode" name='x[]' placeholder="234" pattern="[0-9]{3}" title='Three Digit CVV - No.' required  class="form-control" type="text" ></input>
                  <i id="cvc" class="fa fa-question-circle"></i>
              </div>
              <input type="hidden" name='x[]' value='<?php echo $pay;?>'>
              <div class="cvc-preview-container two-card hide">
                  <div class="amex-cvc-preview"></div>
                  <div class="visa-mc-dis-cvc-preview"></div>
              </div>
          </div>
          <div class="zip-code-group form-group">
              <label for="ZIPCode"></label>
               
          </div>
          <button id="PayButton" class="btn btn-block btn-success submit-button" type="submit">
              <span class="submit-button-lock"></span>
              <span class="align-middle" style='color:white;'>Pay <?php echo $pay;?>.00</span>
          </button>
      </form>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
<?php
}
else if(isset($buy_now) && isset($user))
{
	
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Payment Getway submit</title>
  
  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>

      <link rel="stylesheet" href="Assest/css/Payment.css">

  
</head>

<body>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<div class="container">
  <div id="Checkout" class="inline">
      <h1>Pay Invoice 2</h1>
      <div class="card-row">
          <span class="visa"></span>
          <span class="mastercard"></span>
          <span class="amex"></span>
          <span class="discover"></span>
      </div>
      <form method='post' action="payment.php">
          <div class="form-group">
              <label for="PaymentAmount">Payment amount : &nbsp; <b>Rs. <?php echo $buy_price;?></b></label>
              <input type="hidden" name="buy_idd" value='<?php echo $_POST['buy_id'];?>'>
          </div>
          <div class="form-group">
              <label or="NameOnCard">Name on card</label>
              <input id="NameOnCard" name='x[]' placeholder="Name on card" class="form-control" required type="text" maxlength="255"></input>
          </div>
          <div class="form-group">
              <label for="CreditCardNumber">Card number</label>
              <input id="CreditCardNumber" name='x[]' placeholder="16 Digit card no."  required pattern="[0-9]{16}" title='Enter 16 - Digit Number'  class="null card-image form-control" type="text"></input>
          </div>
          <div class="expiry-date-group form-group">
              <label for="ExpiryDate">Expiry date</label>
              <input id="ExpiryDate" name='x[]' class="form-control" pattern="[0-9]{4}"  required  type="text" placeholder="MMYY"></input>
          </div>
          <div class="security-code-group form-group">
              <label for="SecurityCode">Cvv no.</label>
              <div class="input-container" >
                  <input id="SecurityCode" name='x[]' placeholder="234" pattern="[0-9]{3}" title='Three Digit CVV - No.' required  class="form-control" type="text" ></input>
                  <i id="cvc" class="fa fa-question-circle"></i>
              </div>
              <input type="hidden" name='x[]' value='<?php echo $buy_price;?>'>
              <div class="cvc-preview-container two-card hide">
                  <div class="amex-cvc-preview"></div>
                  <div class="visa-mc-dis-cvc-preview"></div>
              </div>
          </div>
          <div class="zip-code-group form-group">
              <label for="ZIPCode"></label>
               
          </div>
          <button id="PayButton" class="btn btn-block btn-success submit-button" name='buy_submit' type="submit">
              <span class="submit-button-lock"></span>
              <span class="align-middle" style='color:white;'>Pay <?php echo $buy_price;?>.00</span>
          </button>
      </form>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
<?php
}
else
{
	echo "<script>
		alert('Invalid Entry pls. Try Again')
		window.location='index.php'
	</script>";
}
?>