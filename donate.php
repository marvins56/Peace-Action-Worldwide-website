<?php
include 'database.php';

$errors = array();
if(isset($_POST['donate'])){

$name =  mysqli_real_escape_string( $conn,$_POST['name']);
$email =  mysqli_real_escape_string($conn,$_POST['email'] );
$comments =  mysqli_real_escape_string( $conn,$_POST['comments']);
$amount =  mysqli_real_escape_string( $conn,$_POST['amount']);
 if(empty($email)){
   array_push($errors,"please enter name");
 }

 if(empty($amount) || $amount == 0){
   array_push($errors,"please enter amount to donate");
 }


}


if(count($errors) == 0){


      //Integrate Rave pament
      $endpoint = "https://api.flutterwave.com/v3/payments";

      //Required Data
      $postdata = array(
          "tx_ref" => uniqid().uniqid(),
          "currency" => "UGX",
          'payment_options' => 'Mobile Money',
          "amount" => $amount,
          "customer" =>array(
              "name" => $name,
              "email" => $email,

          ),
          "customizations" =>array(
              "title" => "PEACE AND ACTION WORLDWIDE",
              "description" => "donation from ".$name,
          ),

          "meta" =>array(
              "reason" => "donation from ".$email,
          ),
         "redirect_url" =>  "http://localhost/paw1/verify.php"
      );

      //Init cURL handler
      $ch = curl_init();

      //Turn of SSL checking
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

      //Set the endpoint
      curl_setopt($ch, CURLOPT_URL, $endpoint);

      //Turn on the cURL post method
      curl_setopt($ch, CURLOPT_POST, 1);

      //Encode the post field
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));

      //Make it reurn data
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      //Set the waiting timeout
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 200);
      curl_setopt($ch, CURLOPT_TIMEOUT, 200);

      //Set the headers from endpoint
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         "Authorization: Bearer FLWSECK-019c7aede86c7e57cbd57a33d12e5268-X",
         "Content-Type: Application/json",
         "Cache-Control: no-cahe"
      ));

      //Execute the cURL session
      $request = curl_exec($ch);

      $result = json_decode($request);
      header("Location: ".$result->data->link);
      //var_dump($result);
      //Close the cURL session
      curl_close($ch);
  //  echo('<div class="alert alert-success " role="alert" style=" width:80%; margin:auto; text-align:center;">ORDER PLACED SUCCESSFULLY</div>');


}

 ?>
