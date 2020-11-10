@extends('layouts.app')
@section('title')
    Product not found!
@endsection
@section('header')
    @include('inc.navbar')
@endsection
@section('content')

<!-- MAIN -->

    <main class="site-main checkout">
        <div class="container">
            <ol class="breadcrumb-page">
                <li><a href="#">Home </a></li>
                <li class="active"><a href="#">Not Found</a></li>
            </ol>
        </div>
        <div class="container">
            <h2>Product Not Found!</h2>
            <p>The product you are trying to see where is removed by store or administrator! please conact us for more details.</p>
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
        </script>
@endsection
