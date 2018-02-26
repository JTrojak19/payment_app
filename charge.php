<?php
require_once('vendor/autoload.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Customer.php');
require_once('models/Transaction.php');

\Stripe\Stripe::setApiKey('sk_test_FH0p8HqW5RKBxSzV68qfiPOc');

$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$firstName = $POST['first_name'];
$lastName = $POST['last_name'];
$email = $POST['email'];
$token = $POST['stripeToken'];

//Create customer in Stripe
$customer = \Stripe\Customer::create(array(
    "email" => $email,
    "source" => $token
));
//Charge customer
$charge = \Stripe\Charge::create(array(
    "amount" => 5000,
    "currency" => "usd",
    "description" => "Intro to React",
    "customer" => $customer->id
));
//Customer Data
$customerData = array(
    'id' => $charge->customer,
    'first_Name' => $firstName,
    'last_Name' => $lastName,
    'email' => $email
);
//Instiate a customer
$customer = new Customer();
//Add Customer
$customer->addCustomer($customerData);

//Transaction Data
$transactionData = array(
    'id' => $charge->id,
    'customer_Id' => $charge->customer,
    'product' => $charge->description,
    'amount' => $charge->amount,
    'currency' => $charge->currency,
    'status' => $charge->status
);
//Instiate a transaction
$transaction = new Transaction();
//Add Transaction
$transaction->addTransaction($transactionData);

//Redirect to success
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);
