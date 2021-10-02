@extends('layouts.master')

@section('extra-script')
<script src="https://js.stripe.com/v3/"></script>
@endsection

{{-- formulaire du paiement --}}
@section('content')
<div class="col-md-12">
    <h1>Page de paiement</h1>
<div class="row">
    <div class="col-md-6">

        <form action="{{paiement.store}}" method="post" id="payment-form" class="my-4">
            @csrf
            <div class="form-row">
              <label for="card-element">
                Credit or debit card
              </label>
              <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
              </div>
          
              <!-- Used to display Element errors. -->
              <div id="card-errors" role="alert"></div>
            </div>
          
            <button class="btn btn-warning" id='submit' mt-6>Procedez au paiement</button>
          </form>

    </div>
</div>
</div>
@endsection

{{-- la clé js de mon stripe --}}
@section('extra-js')
    <script>
        var stripe = Stripe('pk_test_51JT6dEKDsk5EslXz4vtKmo4cndxOGHqob7gKY2fWrQK1uENVpsUtDWpSFww5fkQDDBg3FVHxGXhpManZ9XadqoJw00bCNw5zUy');
        var elements= stripe.elements();

        // Custom styling can be passed to options when creating an Element.
var style = {
  base: {
    // Add your base input styles here. For example:
    fontSize: '16px',
    color: '#32325d',
  },
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');


// afficher les erreurs de fausse carte

// Create a token or display an error when the form is submitted.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
submitButton.disable= true;
  stripe.createToken(card).then(function(result) {
    if (result.error) {
        submitButton.disable= false;
      // Inform the customer that there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

//soumettre le payement a stripe

function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}


// // Set your secret key. Remember to switch to your live secret key in production.
// // See your keys here: https://dashboard.stripe.com/apikeys
// \Stripe\Stripe::setApiKey('sk_test_51JT6dEKDsk5EslXzwKM8UsaayWERHfVUDwl0WM4Y3R1QiJlU2pK74LuQf53cGy3tdXgDa2iik12bLSrXZTmcuxz500fJNfvjqJ');

// // Token is created using Stripe Checkout or Elements!
// // Get the payment token ID submitted by the form:
// $token = $_POST['stripeToken'];
// $charge = \Stripe\Charge::create([
//   'amount' => 999,
//   'currency' => 'usd',
//   'description' => 'Example charge',
//   'source' => $token,
// ]);

    </script>
@endsection
