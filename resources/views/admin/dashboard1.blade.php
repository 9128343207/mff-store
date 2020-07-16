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
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form id="serchbyorderid"  method="post" >
                        <label>Search by Order number</label>
                        <input type="text" name="order_id" value="" placeholder="enter order id">
                        <input type="submit" name="search" class="btn btn-primary" value="search">
                    </form><br>
                    <form id="serchbyinvoiceid"  method="post" >
                        <label>Search by Invoice Number</label>
                        <input type="text" name="invoice_id" value="" placeholder="enter #invoice">
                        <input type="submit" name="search" class="btn btn-primary" value="search">
                    </form><br>
                    <form id="serchbytrns"  method="post" >
                        <label>Search by Transaction Id</label>
                        <input type="text" name="trans_id" value="" placeholder="enter transaction id">
                        <input type="submit" name="search" class="btn btn-primary" value="search">
                    </form>
                    <div class="product-status-wrap">
                    <div class="asset-inner">
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Order Number</th>
                                <th>Order By</th>
                                <th>Status</th>
                                <th>Payment Method</th>
                                <th>Items Ordered</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            <tbody id="result">
                                
                            </tbody>
                               
                            

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
            $("#serchbyinvoiceid").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: '/admin/searchByInvoice',
                    dataType: 'json',
                    type: 'post',
                    data: $('#serchbyinvoiceid').serialize(),
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
        html = '<tr>';
        html += '<td></td>';
        html += '<td>'+item.order.order_number+'</td>';
        html += '<td>'+item.user.email+'</td>';
        html += '<td>'+item.order.status+'</td>';
        html += '<td>'+item.payment_method.title+'</td>';
        html += '<td>'+item.items+'</td>';
        // html += '<td><button type="button" onclick="orderDetail(this)" class="btn btn-primary" data-id="'+item.order.id+'" data-toggle="modal" >View</button><td>';
        html += '<td><a class="btn btn-primary" href="order/preview/'+item.order.id+'">View</a></td>'

        html += '</td>';
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
                         html = '<div>';
                        html += '<table class="modaltable">';
                        html += '<tr><td>'+res.user.name+'</td><td>'+res.user.email+'</td></tr>';
                        
                        html += '</tr>';
                        html += '<tr><td><b>Payment Method</b></td><td>'+res.payment_method.title+'</td></tr><tr></tr>';
                        html += '<tr><td><b>Order Number</b></td><td>'+res.order.order_number+'</td><td></tr>';
                        
                        html += '<tr><td><b>Status</b></td><td>'+res.order.status+'</td><td></tr>';
                        
                        html += '<table>';
                        res.items.forEach(function (it){
                            html = '<td>'+it.item.name+'</td>';
                            html += '<td>'+it.qty+'</td>';
                            html += '<td>'+it.store.store_name+'</td>';
                        });
                        html += '</table>';
                        html += '<tr><td><a href="/invoice/s/'+res.order.id+'">view invoice</a><td><tr>'
                        html += '</table>';
                        html += '</div>';
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

            html = '<td>'+items.item.name+'</td>';
            html += '<td>'+items.qty+'</td>';
            html += '<td>'+items.store.store_name+'</td>';
            return html;

        }
</Script>
@endsection