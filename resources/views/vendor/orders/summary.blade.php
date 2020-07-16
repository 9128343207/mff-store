@extends('layouts.vendor')
@section('title')
        {{ $ordersSummary->order->order_number}}
@endsection
@section('header')
    @include('inc.v-sidebar')
    @include('inc.vendor-nav')
@endsection

@section('content')
    <div class="product-status mg-b-15">
        @if (session('status')) 
        <div class="alert alert-success">
            {{ session('status') }}
        </div>

        
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Order Summary - #{{ $ordersSummary->order->order_number}}</h4>
                    <!-- <div class="add-product">
                    <a href="{{ Route('vendor.product.listing') }}"></a>
                    </div> -->
                    <div class="asset-inner">
                         <div>
                        <table class="modaltable">
                        <tr><td>{{ $ordersSummary->user->name}}</td><td>{{ $ordersSummary->user->email}}</td></tr>  
                        
                        </tr>
                        <tr><td><b>Payment Method</b></td><td>{{ $ordersSummary->payment->method->title}}</td></tr><tr></tr>
                        <tr ><td>{{ $ordersSummary->item->name}}</td><td></tr><tr><td><b>Quantity</b></td><td>{{ $ordersSummary->orderDetail->qty}}</td><td><b>Total Amount</b></td><td>{{ $ordersSummary->orderDetail->amount}}</td></tr>
                        <tr><td><b>Order Status</b></td><td>{{ $ordersSummary->orderDetail->vn_status}}</td><td></tr>
                        <tr><td><form id="orderstatus" method="post" onsubmit="event.preventDefault(); changeStatus(this);" action="#"  >
                        <input type="hidden" name="item" value="{{ $ordersSummary->orderDetail->id}}">
                        <select id="paystatus" name="paystatus">
                                <!-- <option value="PAYMENTCOMPLETED">Payment Completed</option> -->
                                <option value="HOLD">Hold</option>
                                <!-- <option value="SHIPPING">Shiping</option> -->
                                <option value="PROCESSING">Processing</option>
                                <option value="SHIPPING">Shipping</option>
                                <option value="COMPLETED">Completed</option>
                            </select>
                        <button type="submit" class="btn btn-primary">Update</button></form></td></tr>
                        
                            
                        <tr><td><a href="/invoice/s/{{ $ordersSummary->orderDetail->id}}">view invoice</a><td><tr>'
                        </table>
                        </div>
                    </div>
                    <div class="">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        
        function changeStatus(e) {
            console.log(e);
            $.ajax({
                    type: "post",
                    url: '/vendor/orders/status/update',
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    data: $(e).serialize(),
                    success: function(data)
                    {
                        location.reload(); 
                    }
                });

        }
    </script>
@endsection
