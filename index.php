<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, inital-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ia-edge">
    <title>Pay Page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h2 class="my-4 text-center">Intro to React Course [$50]</h2>
<form action="./charge.php" method="post" id="payment-form">
    <div class="form-row">
        <input type="text" class="form-control mb-3 StripeElement StripeElement--empty" name="first_name" placeholder="First Name">
        <input type="text" class="form-control mb-3 StripeElement StripeElement--empty" name="last_name" placeholder="Last Name">
        <input type="email" class="form-control mb-3 StripeElement StripeElement--empty" name="email" placeholder="E-mail">
        <div id="card-element" class="form-control">
            <!-- A Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
    </div>

    <button>Submit Payment</button>
</form>
</div>
<script
    src="https://code.jquery.com/jquery-3.3.1.slim.js"
    integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA="
    crossorigin="anonymous"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="./js/charge.js"></script>
</body>
</html>