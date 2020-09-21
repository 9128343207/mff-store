@extends('layouts.app')
@section('title')
    Request for Quotes
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
                <li class="active"><a href="#">Request for Quotes</a></li>
            </ol>
        </div>
        
        <div class="container">
            <h2>Request Quotes</h2>
            <p></p>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                   
            <form class="form-cart" method="post" action="{{ route('quotes.submit')}}">
                @csrf
                        <div class="table-cart">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="tb-image"></th>
                                        <th class="tb-product">Product Name</th>
                                        <!-- <th class="tb-price">Unit Price</th> -->
                                        <th class="tb-qty">Qty</th>
                                        <!-- <th class="tb-total">SubTotal</th> -->
                                        <!-- <th class="tb-remove"></th> -->
                                    </tr>
                                </thead>
                                <tbody id=''>
                                            {{-- //TODO LOOP THIS IN JAVASCRIPT --}}
                                            <tr class="">
                                    <td></td>
                                    <td class="tb-product"><div class="product-name"><a href="{{ route('product.view', ['id' => $product->id])}}">{{ $product->name}}</a></div></td>
                                    <input type="hidden" name="productid" value="{{$product->id}}">
                                    <td class="tb-qty"><div class="quantity"><div class="buttons-added"><input type="text" value="2" data-item="{{$product->id}}" id="qty" title="Qty" name="qty" class="input-text qty text" size="1"><a href="#" class="sign plus"><i class="fa fa-plus"></i></a><a href="#" class="sign minus"><i class="fa fa-minus"></i></a></div></div></td>
                                </tbody>
                            </table>
                            <div class="form-field">
                                <label>Summary</label><br>
                                <textarea name="summary" cols="50" rows="4" required="required"></textarea><br><br>
                            </div>
                            <input type="submit" name="" value="Submit">

                        </div>
                        <div class="cart-actions">
                           
                        </div>
                    </form>
            
                </div>
            </div>


            
        </div>
        
     
         
    </main><!-- end MAIN -->

@endsection

@section('script')  
<script>
       
        </script>
@endsection
