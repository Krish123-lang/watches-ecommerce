@extends('app')
@section('title')
    Payment
@endsection

@section('content')
    <section class="container mt-5 my-3 py-5"  style="margin: 50px auto">
        <div class="container mt-2 text-center">
            <h4>Payment</h4>

            @if (Session::has('total') && Session::get('total') != null)
                @if (Session::has('order_id') && Session::get('order_id') != null)
                    <h4 class="my-5" style="color: blue">Total: ${{Session::get('total')}}</h4>

                    <div id="paypal-button-container"></div>
                @endif
            @endif
        </div>
    </section>

    <script src="https://www.paypal.com/sdk/js?client-id=AQXy9bVX7ZjNqt0LfoT5qH1lLccMT-wZWlF85Z6OdEtEneQZigKva3At8bkmeWzQBLhw4gvoz7TTivr0&currency=USD"></script>

    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            // currency_code: 'USD',
                            value: "{{ Session::get('total') }}"
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction=orderData.purchase_units[0].payments.captures[0];
                    alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                    console.log(orderData);

                    window.location.href = "/verify_payment/"+transaction.id;
                });
            }
        }).render('#paypal-button-container');
    </script>
@endsection