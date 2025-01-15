@extends('app')
@section('title')
    Payment
@endsection

@section('content')
    <section class="container mt-5 my-3 py-5" style="margin: 50px auto">
        <div class="container mt-2 text-center">
            <h4>Thank You</h4>

            @if (Session::has('order_id') && Session::get('order_id') != null)
                <h4 class="my-5" style="color: blue">Order Id: {{ Session::get('order_id') }}</h4>
                <p>Please keep order id safe for future reference</p>
                <p>** We will deliver your order within 2 business days.</p>
            @endif
        </div>
    </section>
@endsection
