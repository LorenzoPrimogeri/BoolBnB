@extends('layouts.app')
@section('content')
    <div class="main-slct-item">
        <div class="cnt-pay">
            <div class="cnt-type-ads">
                <div class="ico-ads"></div>
            </div>
            <div class="cnt-txt-card">
                <span>Type:</span>
                <p> {{ $sponsor->type }}</p>
            </div>
            <div class="cnt-txt-card">
                <span>Duration:</span>
                <p> {{ $sponsor->duration }} Hr</p>
            </div>
            <div class="cnt-txt-card">
                <span>Price:</span>
                <p> {{ $sponsor->price }}$</p>
            </div>
            <div class="cnt-txt-card">
                <span>apartment id:</span>
                <p> {{ $apartment->id }}</p>
            </div>
            <div class="cnt-txt-card">
                <span>N. Card:</span>
                <p> 4009348888881881</p>
            </div>

            <div>
                <form id="payment-form" action="{{ route('admin.payment') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <section>
                        <label for="amount">
                            <div class="input-wrapper amount-wrapper">
                                <input type="hidden" id="amount" name="amount" min="1" placeholder="amount"
                                    value="{{ $sponsor->price }}" readonly>
                            </div>
                        </label>

                        <input type="hidden" name="id" value="{{ $id }}">
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="bt-drop-in-wrapper">
                            <div id="bt-dropin"></div>
                        </div>
                        <input type="hidden" name="payment_method_nonce" value="fake-valid-visa-nonce" id="nonce">
                    </section>
                    <div class="cnt-btn-cta">
                        <button class="btn-cta" type="submit">
                            <span>BUY</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://js.braintreegateway.com/web/dropin/1.31.0/js/dropin.min.js"></script>

    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{ $token }}";
        braintree.dropin.create({
            authorization: client_token,
            selector: '#bt-dropin',
        }, function(createErr, instance) {
            if (createErr) {
                console.log('Create Error', createErr);
            }
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                instance.requestPaymentMethod(function(err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;
                    }
                    //Add the nonce to the form and submit
                    document.querySelector('input[name="payment_method_nonce"]').value = payload
                        .nonce;
                    form.submit();
                });
            });
        });
    </script>
@endsection
