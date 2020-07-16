@extends('layouts.vendor')
@section('title')
    Update Footer
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
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Update Footer</h4>

                    <div class="add-product">
                       
                    </div>
                    <div class="asset-inner">
                         @php
                            $footer = App\Footer::where('status', 1)->first();
                            
                        @endphp
                        <form action="{{route('admin.CMS.footer.update')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$footer->id}}">
        
                    <div class="form-group">
                        <label for="description">About Us</label>
                        <textarea type="text"  class="form-control" id="taskDescription" name="about">{{{ isset($footer->about) ? $footer->about : '' }}}</textarea>
                        @error('s_desc')
                            <span class="alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                            <label for="title">Company Address</label>
                            <input type="text" value="{{{ isset($footer->address) ? $footer->address : '' }}}" class="form-control" id="taskTitle"  name="address" placeholder="Company Address">
                        </div>
                        
                        <div class="form-group">
                                <label for="title">Company support mail</label>
                                <input type="text" value="{{{ isset($footer->support_mail) ? $footer->support_mail : '' }}}" class="form-control" id="taskTitle"  name="mail" placeholder="Company support mail">
                            </div>

                            <div class="form-group">
                                <label for="title">Company support phone</label>
                                <input type="text" value="{{{ isset($footer->support_number) ? $footer->support_number : '' }}}" class="form-control" id="taskTitle"  name="phone" placeholder="Company support phone">
                            </div>
                           
                        
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  MODAL-->


@endsection

@section('script')
    
    <script type="text/javascript">
         function orderDetail(e) {
            var id = $(e).attr('data-id');
            $.ajax({
                url: '/admin/orders/get-order-details',
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

        $('#paystatus').on('change', function() {
          var val = this.value;
         window.location.href = '/admin/orders/get/'+val;
        });
    </script>

@endsection
