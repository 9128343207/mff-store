@extends('layouts.app')
@section('title')
Create Support Ticket
@endsection
@section('header')
    @include('inc.navbar')
@endsection
@section('content')
    <!-- MAIN -->
    {{-- {{ dd($items)}} --}}
    @if (Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{{ Session::get('success') }}</li>
        </ul>
    </div>
@endif
    <main class="site-main shopping-cart">
        <div class="container">
            <ol class="breadcrumb-page">
                <li><a href="#">Home </a></li>
                <li class="active"><a href="#">Support</a></li>
            </ol>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                       
                </div>
                <div class="col-md-3 padding-left-5">
                    
                </div>
            </div>
            
    </main><!-- end MAIN -->

@endsection

@section('script')
    <script>

        function quantity(e){
            // console.log(e);
            var qnty = $(e).val();
                var citem = $(e).attr('data-item');
                var cdata = {qty: qnty, item:citem};
                $.ajax({
                    type: "post",
                    url: '/update-cart',
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    data: cdata,
                    success: function(data)
                    {
                        getCartList();
                    }
                });
        }

    </script>
@endsection
