
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Checkout example for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">
    <div class="row">
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" id="form_payment" method="post" action="{{ route ('stripe.payment') }}" novalidate>
                @csrf
                <hr class="mb-4">
                <h4 class="mb-3">Payment</h4>

                <style>
                    .not-valid{
                        color: red;
                        text-align: center;
                        font-size: 13px;
                        font-family: "Roboto Slab", "Roboto", "Helvetica", "Arial", sans-serif;
                    }
                </style>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                        <label class="custom-control-label" for="credit">Credit card</label>
                    </div>
                </div>
                <input type="hidden" id="stripeToken" name="stripeToken">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name on card</label>
                        <input type="text" class="form-control" value="Kyle SSDLV" id="name" name="name" placeholder="" required>
                        <small class="text-muted">Full name as displayed on card</small>
                        <div class="invalid-feedback">
                            Name on card is required
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" value="ssdlv@evenma.com" id="name" name="email" placeholder="" required>
                        <small class="text-muted">Full name as displayed on card</small>
                        <div class="invalid-feedback">
                            email is required
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Credit card number</label>
                        <input type="text" data-stripe="number" class="form-control" id="number" value="4242424242424242" placeholder="" required>
                        <div class="invalid-feedback">
                            Credit card number is required
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">Expiration Month</label>
                        <input type="text" data-stripe="exp_month" class="form-control" id="exp_month" value="11" placeholder="" required>
                        <div class="invalid-feedback">
                            Expiration date month
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">Expiration Year</label>
                        <input type="text" data-stripe="exp_year" class="form-control" id="exp_year" value="22" placeholder="" required>
                        <div class="invalid-feedback">
                            Expiration date year
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">CVV</label>
                        <input type="text" data-stripe="cvc" class="form-control" id="cvc" value="123" placeholder="" required>
                        <div class="invalid-feedback">
                            Security code required
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" id="btn_payment" type="submit">Continue to checkout</button>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://js.stripe.com/v2/"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../assets/js/vendor/holder.min.js"></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<script>
    let stripe = Stripe.setPublishableKey('pk_test_1yZui80AafTwSglG0AbOreJb00jBhHWEiA');

    $form = $('#form_payment');
    $form.submit( function (e) {
        e.preventDefault();
        //$form.find
        $('#btn_payment').attr('disabled', true);

        Stripe.card.createToken($form, function (status, response) {
            if (response.error){
                //console.log(response.error.message);
                $form.find('.message').remove();
                $form.prepend('<div class="not-valid message"><p>'+response.error.message+'</p></div>');
            }
            else {
                let token = response.id;
                //alert(token);
                $('#stripeToken').val(token);
                //$form.append($('<input type="hidden" name="stripeToken">')).val(token);
                $form.get(0).submit();
            }
            //debugger;
        })
    });
</script>
</body>
</html>
