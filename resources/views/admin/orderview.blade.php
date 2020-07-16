@extends('layouts.vendor')
@section('title')
    Dashboard
@endsection
@section('header')
    @include('inc.ad-sidebar')
    @include('inc.vendor-nav')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Order Preview</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- <form id="serchbyorderid"  method="post" >
                        <label>Search by Order number</label>
                        <input type="text" name="order_id" value="" placeholder="enter order id">
                        <input type="submit" name="search" class="btn btn-primary" value="search">
                    </form> -->
                    <div class="product-status-wrap">
                    <div class="asset-inner">
                        <table class="modaltable">
                            <tr>
                                <td><strong>{{$data['user']->name}}</strong></td>
                                <td><strong>{{$data['user']->email}}</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Payent Method</strong></td>
                                <td>{{$data['payment_method']->title}}</td>
                            </tr>
                            <tr>
                                <td><strong>Order Number</strong></td>
                                <td>{{$data['order']->order_number}}</td>
                                <td><strong>status</strong></td>
                                <td>{{$data['order']->status}}</td>
                            </tr>
                        </table><br>
                        <h4>Ordered Items</h4>
                        <div>
                        <table class="modaltable">
                            @foreach($data['items'] as $product)
                                <tr>
                                    <td>{{$product->item->name}}</td>
                                    <td>{{$product->store->store_name}}</td>
                                    <td>{{$product->qty}}</td>
                                    <td>{{$product->amount}}</td>
                                    <td><a href="/admin/item/preview/{{$product->id}}">View</a></td>
                                </tr>
                            @endforeach
                        <!-- <tr><td>'+res.user.name+'</td><td>'+res.user.email+'</td></tr>
                        
                        </tr>
                        <tr><td><b>Payment Method</b></td><td>'+res.payment_method.title+'</td></tr><tr></tr>
                        <tr><td><b>Order Number</b></td><td>'+res.order.order_number+'</td><td></tr>
                        
                        <tr><td><b>Status</b></td><td>'+res.order.status+'</td><td></tr>
                        
                        <table>
                        res.items.forEach(function (it){
                            html = '<td>'+it.item.name+'</td>
                            <td>'+it.qty+'</td>
                            <td>'+it.store.store_name+'</td>
                        }); -->
                        </table>
                        <tr><td><a href="/invoice/s/{{$data['order']->id}}">view invoice</a><td><tr>'
                        </table>
                        </div>

                        </table>
                    </div></div>
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
<Script>

    $(document).ready(function(){
            $("#serchbyorderid").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: '/admin/searchByOrderId ',
                    dataType: 'json',
                    type: 'post',
                    data: $('#serchbyorderid').serialize(),
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    success: function(res) {
                        console.log(res);
                        $('#result').empty();
                        res.forEach(renderResult);
                    }
                });

            });
        });
    function renderResult(item){
        // var items = item.items;
        html = '<tr>
        <td></td>
        <td>'+item.order.order_number+'</td>
        <td>'+item.user.email+'</td>
        <td>'+item.order.status+'</td>
        <td>'+item.payment_method.title+'</td>
        <td>'+item.items+'</td>
        <td><button type="button" onclick="orderDetail(this)" class="btn btn-primary" data-id="'+item.order.id+'" data-toggle="modal" >View</button><td>'

        </td>
        $('#result').append(html);

    }

    function orderDetail(e) {
            var id = $(e).attr('data-id');
            $.ajax({
                url: '/admin/get-order-details',
                dataType: 'json',
                type: 'post',
                data: {id: id},
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                success: function(res) {
                    // get the ajax response data
                    // var data = res.body;
                    console.log(res);
                    $('.modal-body').empty();
                         html = '<div>
                        <table class="modaltable">
                        <tr><td>'+res.user.name+'</td><td>'+res.user.email+'</td></tr>
                        
                        </tr>
                        <tr><td><b>Payment Method</b></td><td>'+res.payment_method.title+'</td></tr><tr></tr>
                        <tr><td><b>Order Number</b></td><td>'+res.order.order_number+'</td><td></tr>
                        
                        <tr><td><b>Status</b></td><td>'+res.order.status+'</td><td></tr>
                        
                        <table>
                        res.items.forEach(function (it){
                            html = '<td>'+it.item.name+'</td>
                            <td>'+it.qty+'</td>
                            <td>'+it.store.store_name+'</td>
                        });
                        </table>
                        <tr><td><a href="/invoice/s/'+res.order.id+'">view invoice</a><td><tr>'
                        </table>
                        </div>
                    $('.modal-body').append(html);

                    // // show modal
                    $('#viewOrder').modal('show');

                },
                error:function(request, status, error) {
                    console.log("ajax call went wrong:" + request.responseText);
                }
            });
        }

        function populateItems(items){

            html = '<td>'+items.item.name+'</td>
            <td>'+items.qty+'</td>
            <td>'+items.store.store_name+'</td>
            return html;

        }
</Script>
@endsection