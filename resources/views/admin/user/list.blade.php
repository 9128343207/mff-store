@extends('layouts.vendor')
@section('title')
    Users
@endsection
@section('header')
    @include('inc.ad-sidebar')
    @include('inc.vendor-nav')
@endsection

@section('style')
    <style type="text/css">
            .modaltable > tbody > tr{
                padding: 10px;
                margin: 5px;
                border-bottom: 1px solid grey;
            }
            .modaltable > tbody > tr > td {
                margin: 5px;
                padding: 10px;
            }
    </style>
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
                    <h4>Users</h4>
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
                            
                                @foreach($users as $user)
                                <tr>

                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td> 
                                    
                                    @if(isset($user->is_seller) )
                                        <td><a href="store/view/{{$user->id}}">View Store</a></td>
                                    @else
                                        <td>No</td>
                                    @endif
                                    
                                </tr>
                                @endforeach

                            

                        </table>
                    </div>
                    <div class="">
                        
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
                    console.log(res);
                    $('.modal-body').empty();
                         html = '<div>';
                        html += '<table class="modaltable">';
                        html += '<tr><td>'+res.user.name+'</td><td>'+res.user.email+'</td></tr>';
                        
                        html += '</tr>';
                        html += '<tr><td><b>Payment Method</b></td><td>'+res.payment.method.title+'</td></tr><tr></tr>';
                        html += '<tr ><td>'+res.item.name+'</td><td></tr><tr><td><b>Quantity</b></td><td>'+res.orderDetail.qty+'</td><td><b>Total Amount</b></td><td>'+res.orderDetail.amount+'</td></tr>';
                        html += '<tr><td><b>Status</b></td><td>'+res.order.status+'</td><td></tr>';
                        html += '<tr><td><form id="orderstatus" method="post" onsubmit="event.preventDefault(); changeStatus(this);" action="#"  >';
                        html += '<input type="hidden" name="item" value="'+res.orderDetail.id+'">';
                        html += '<input type="hidden" name="store" value="'+res.orderDetail.id+'">' 
                        html += '<select name="orderstatus">';
                        html += '<option value="1">Onhold</option>';
                        html += '<option value="2">Processing</option>';
                        html += '<option value="3">Shipping</option>';
                        html += '<option value="4">Complete</option>';
                        html += '</select >';
                        html += '<button type="submit" class="btn btn-primary">Update</button>';
                        html += '<tr><td><a href="/invoice/s/'+res.orderDetail.id+'">view invoice</a><td><tr>'
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


        // function orderDetail(e) {
        //     var id = $(e).attr('data-id');
        //     $.ajax({
        //         url: '/vendor/orders/status',
        //         dataType: 'json',
        //         type: 'post',
        //         data: {id: id},
        //         headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        //         success: function(res) {
                    

        //         },
        //         error:function(request, status, error) {
        //             console.log("ajax call went wrong:" + request.responseText);
        //         }
        //     });
        // }

        function changeStatus(e) {
                $.ajax({
                    type: "POST",
                    url: '/vendor/orders/status',
                    data: $('#orderstatus').serialize(), // serializes the form's elements.
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    success: function(data)
                    {
                        // $('.alert').alert()
                        // if (data == 1) {
                        //     $('.btn-add-to-cart').hide();
                        //     $('.btn-added').show();
                        //     $('body').append('<div class="alert alert-success">Added to cart</div>');
                        // } else {
                        //     $('body').append('<div class="alert alert-warning">Product already added</div>');
                        // }
                        // setTimeout(function() {
                        //     $(".alert").alert('close');
                        // }, 6000);
                    }
                });
        }

        // $(document).ready(function(){
        //     $("#orderstatus").submit(function(e){
        //         e.preventDefault();
        //         $.ajax({
        //             type: "POST",
        //             url: '/vendor/orders/status',
        //             data: $('#orderstatus').serialize(), // serializes the form's elements.
        //             success: function(data)
        //             {
        //                 // $('.alert').alert()
        //                 // if (data == 1) {
        //                 //     $('.btn-add-to-cart').hide();
        //                 //     $('.btn-added').show();
        //                 //     $('body').append('<div class="alert alert-success">Added to cart</div>');
        //                 // } else {
        //                 //     $('body').append('<div class="alert alert-warning">Product already added</div>');
        //                 // }
        //                 // setTimeout(function() {
        //                 //     $(".alert").alert('close');
        //                 // }, 6000);
        //             }
        //         });
        //     });
        // });
    </script>

@endsection
