Stripe.setPublishableKey('pk_test_sfN50WBfuNS6OEOmiNVDVh7O');

var $form = $('#checkout-form');

$form.submit(function(event){
    $('#charge-error').addClass('hidden');
    $form.find('button').prop('disabled',true);
    Stripe.card.createToken({
        number:$('#card-number').val(),
        cvc:$('#card-cvc').val(),
        exp_month:$('#card-expiry-month').val(),
        exp_year:$('#card-expiry-year').val(),
        name:$('#card-name').val(),
    },stripeResponseHandler);
    return false;
});

function stripeResponseHandler(status,response) {
    if(response.error){
        $('#charage-error').removeClass('hidden');
        $('#charage-error').test(response.error.message);
        $form.find('button').prop('disabled',false);
    }else{
        var token = response.id;
        $form.append($('<input type="hidden" name="stripeToken">').val(token));
        // Submit the form:
        $form.get(0).submit();
    }
}

