@extends('layouts.app')
@section('title')
    Checkout
@endsection
@section('header')
    @include('inc.navbar')
@endsection
@section('content')

<!-- MAIN -->
<style>
    .box{
        /* color: #fff; */
        padding: 20px;
        display: none;
        margin-top: 20px;
    }
</style>
    <main class="site-main checkout">
        <div class="container">
            <ol class="breadcrumb-page">
                <li><a href="#">Home </a></li>
                <li class="active"><a href="#">checkout</a></li>
            </ol>
        </div>
    <div class="container">
        <form action="/checkout" class="checkout" method="post" name="checkout">
            @csrf
                <div class="row">
                    <div class="form-group shipping col-md-6">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li><br>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{-- @if ($accept_payment == 1)

                        @endif --}}
                            <h4 class="title-checkout">Billing Address</h4>
                        @if (count(App\User::find(Auth::id())->billing) != 0)
                            @foreach (App\User::find(Auth::id())->billing as $address)
                                <input type="radio" name="billing_address" value="{{$address->id}}" required>
                                <li>{{ json_decode($address->address)->street}}</li><br>
                            @endforeach
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#billingModal">
                                    Add new billing Address
                            </button>
                        @else
                        <li>You do not have any shipping address added!</li>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#billingModal">
                                    Add billing Address
                            </button>
                        @endif
                    </div>
                    <div class="form-group shipping col-md-6">
                            <h4 class="title-checkout">Shipping Address</h4>
                            @if (count(App\User::find(Auth::id())->shipping) != 0)
                                @foreach (App\User::find(Auth::id())->shipping as $address)
                                <input type="radio" name="shipping_address" value="{{$address->id}}" required>
                            <li>{{ json_decode($address->address)->street}}</li><br>
                                @endforeach
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#shippingModal">
                                        Add New Shipping Address
                                </button>
                            @else
                            <li>You do not have any shipping address added!</li>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#shippingModal">
                                        Add Shipping Address
                                </button>
                            @endif
                    </div>

                        <div class="form-group payment col-md-12">
                            <input type="radio" name="order_type" value="checkout" required>
                            <label for="choice-animals-dogs">Proceed to payment</label>

                            <div class="form-group checkout box col-md-6">
                                <h4 class="title-checkout">Payment Method</h4>
                                <ul style="list-style-type:none">
                                    <li><label class="" ><input type="radio" name='payment_method' value='2'>Wire Tranfer</label></li>
                                    <li><label class="" ><input type="radio" name='payment_method' value='1'>Pay using paypal</label></li>
                                </ul>
                                <p class="credit">You can pay with your credit<br> card if you don't have a paypal account</p>
                                <span class="grand-total">Grand Total<span>${{$cart->cartTotal}}</span></span><br>
                                <button type="submit" class="btn-order">Place Order Now</button>
                            </div>

                            <input type="radio" name="order_type" value="proposal">
                            <label for="choice-animals-cats">Send only proposal</label>

                            <div class="reveal-if-active proposal box">
                                <label for="">Proposal enquery :</label><br>
                                <textarea name="proposal_note" id="" cols="40" rows="5"></textarea>
                                <button type="submit" class="btn-order">Send proposal</button>
                            </div>
                        </div>
                </div>
        </form>
    </div>

      <!--  BILLING -->
            <div class="modal fade" id="billingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Billing Address</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                            <form method="POST" id="addbilling" action="">
                                @csrf
                                 <div class="form-group col-md-6">
                                    <label for="">Street/Building/Locality: </label>
                                    <textarea class="form-control" id="" name="street">Enter Street/Building/Locality details</textarea>
                                 </div>
                                  <div class="form-group col-md-6">
                                    <label for="">Street/Building/Locality 2: </label>
                                    <textarea class="form-control" id="" name="street2">Enter Street/Building/Locality details</textarea>
                                   </div>
                                  <div class="form-group col-md-6">
                                    <label for="">City: </label>
                                    <input type="text" class="form-control" name="city" id="" placeholder="Example input">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="">State:</label>
                                    <input type="text" class="form-control" name="state" id="" placeholder="Another input">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="">Zip Code:</label>
                                    <input type="number" class="form-control" onKeyPress="if(this.value.length==6) return false;" name="zip_code" id="" placeholder="Another input">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="">Country:</label>
                                    <input type="text" class="form-control" id="" name="country" placeholder="Another input">
                                  </div>
                                  <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                  </div>
                            </form>
                    </div>
                </div>
                </div>
            </div>
            <!--- SHIPPING -->
            <div class="modal fade" id="shippingModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Shipping Address</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                                <form method="POST" id="addshipping" action="">
                                    @csrf
                                     <div class="form-group col-md-6">
                                        <label for="">Street/Building/Locality: </label>
                                        <textarea class="form-control" id="" name="street">Enter Street/Building/Locality details</textarea>
                                     </div>
                                      <div class="form-group col-md-6">
                                        <label for="">Street/Building/Locality 2: </label>
                                        <textarea class="form-control" id="" name="street2">Enter Street/Building/Locality details</textarea>
                                       </div>
                                      <div class="form-group col-md-6">
                                        <label for="">City: </label>
                                        <input type="text" class="form-control" name="city" id="" placeholder="Example input">
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="">State:</label>
                                        <input type="text" class="form-control" name="state" id="" placeholder="Another input">
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="">Zip Code:</label>
                                        <input type="number" class="form-control" onKeyPress="if(this.value.length==6) return false;" name="zip_code" id="" placeholder="Another input">
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="">Country:</label>
                                        <input type="text" class="form-control" id="" name="country" placeholder="Another input">
                                      </div>
                                      <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                </form>
                        </div>

                    </div>
                    </div>
                </div>
                    </div>
                </div>
            </form>
        </div>
    </main><!-- end MAIN -->

@endsection

@section('script')
<script>
        $(document).ready(function(){
            $("#addbilling").submit(function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: '/add-billaddress',
                    data: $('#addbilling').serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        console.log(data);
                        if (data != 1) {
                            // TODO render error message
                        }
                    }
                });
            });
        });
        $(document).ready(function(){
            $("#addshipping").submit(function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: '/add-shipaddress',
                    data: $('#addshipping').serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        console.log(data);
                        if (data != 1) {
                            // TODO render error message
                        }
                    }
                });
            });
        });


        $(document).ready(function(){
            $('input[name="order_type"]').click(function(){
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".box").not(targetBox).hide();
                $(targetBox).show();
            });
        });

        </script>
@endsection
