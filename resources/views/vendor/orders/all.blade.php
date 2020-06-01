@extends('layouts.vendor')
@section('title')
    Home
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
                    <h4>Orders</h4>
                    <!-- <div class="add-product">
                    <a href="{{ Route('vendor.product.listing') }}"></a>
                    </div> -->
                    <div class="asset-inner">
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Status</th>
                                <th>Department</th>
                                <th>In Stock</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->item->name}}</td>
                                    <td>{{$order->qty}}</td>
                                    <td>{{$order->amount}}</td>
                                    <td>{{$order->order->user->name}}</td>
                                    <td>{{$order->order->order_number}}</td>
                                    <td><button type="button" onclick="orderDetail(this)" class="btn btn-primary" data-id='{{$order->id}}' data-toggle="modal" >
                                    View
                                    </button><td>
                                </tr>
                                @endforeach

                            

                        </table>
                    </div>
                    <div class="">
                        {{$orders->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  MODAL-->
<div class="modal fade" id="viewOrder" tabindex="1" role="dialog" aria-labelledby="viewOrder" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Order Summary</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">

                     

                   
        </div>

    </div>
    </div>
</div>

@endsection

@section('script')
    
    <script type="text/javascript">
         function orderDetail(e) {
            var id = $(e).attr('data-id');
            $.ajax({
                url: '/vendor/orders/get-order-details',
                dataType: 'json',
                type: 'post',
                data: {id: id},
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                success: function(res) {
                    // get the ajax response data
                    // var data = res.body;
                    $('.modal-body').empty();
                         html = '<div>';
                        html += '<table>';
                        html += '<tr><td>'+res.item.name+'</td><td>'+res.orderDetail.qty+'</td><td>'+res.orderDetail.amount+'</td></tr>';
                        html += '<tr><td>'+res.user.name+'</td><td>'+res.user.email+'</td></tr>';
                        html += '</tr>'
                        html += '</table>';
                        html += '</div>';
                    // // update modal content here
                    // // you may want to format data or 
                    // // update other modal elements here too
                    $('.modal-body').append(html);

                    // // show modal
                    $('#viewOrder').modal('show');

                },
                error:function(request, status, error) {
                    console.log("ajax call went wrong:" + request.responseText);
                }
            });
        }

        function renderOrderdata(res) {
            html = '<div>';
            html += '<table>';
            html += '<tr><td>'+res.item.name+'</td><td>'+res.orderDetail.qty+'</td><td>'+res.orderDetail.amount+'</td></tr>';
            html += '<tr><td>'+res.user.name+'</td><td>'+res.user.email+'</td></tr>';
            html += '</tr>'
            html += '</table>';
            html += '</div>';
        }
    </script>

@endsection
