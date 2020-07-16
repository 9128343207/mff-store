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
                        @php
                        // get payment method which is not added in store payment account
                            $storePayAccounts = App\User::find(Auth::id())->store->payAccounts;
                            $methodsIdCollection = $storePayAccounts->map(function ($method) { return $method->pivot->only(['a_payment_methods_id']);});
                            $methodId =[];
                            foreach ($methodsIdCollection as $value) {
                                array_push($methodId, $value['a_payment_methods_id']);
                            }
                            $payMethods =   App\APaymentMethods::get()->whereNotIn('id', $methodId);
                            // dd($payMethods);
                           @endphp

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Payment Methods</h4>
                    <div class="add-product">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paymentMethod">
                                    Add New Method
                            </button>
                    </div>
                    <div class="asset-inner">
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Title</th>

                            </tr>
                            {{-- {{dd(App\User::find(Auth::id())->store->payAccounts[0]->title)}} --}}
                            @foreach (App\User::find(Auth::id())->store->payAccounts as $method )
                                <tr>
                                <td>{{$method->pivot->title}}</td>
                                <td>{{$method->title}}</td>
                                    <tr>
                            @endforeach

                        </table>
                    </div>
                    <div class="custom-pagination">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="paymentMethod" tabindex="1" role="dialog" aria-labelledby="paymentMethod" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Add Payment Methods</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">

                     <div class="form-group col-md-6">
                       <select id='method' name="method">
                           <option>Choose one</option>
                            @foreach ($payMethods as $method)
                                <option value="{{$method->id}}">{{$method->title}}</option>
                            @endforeach
                       </select>
                    </div>


                    <form method="POST" id="pay-method" action="">

                      <div id="field-attributes">

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
@endsection

@section('script')
    <script>

        $(document).ready(function(){
            $('#method').on('change', function() {
                var method = $(this).val();
                document.cookie = "method="+method+";";
                $.ajax({
                    type: "post",
                    url: '/vendor/payments/attributes',
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    data: {method: method},
                    success: function(data)
                    {
                        $('#field-attributes').empty();
                        JSON.parse(data).forEach(populateForm);
                    }
                });
            });
    	});
        $('#pay-method').on('submit', function(e) {
            e.preventDefault();
            // alert(getCookie('method'));
                $.ajax({
                    type: "post",
                    url: '/vendor/payments/add',
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    data: {'formData': $(this).serializeArray(), 'method': getCookie('method')},
                    success: function(data)
                    {
                        if (data == 1) {
                            // TODO alert success message
                        }
                    }
                });
                document.cookie = "method=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/vendor/payments;";
            });

        function populateForm(data) {
            var html = '<div class="form-group col-md-6">';
            html += '<input type="'+data.type+'" name="'+data.name+'" placeholder="'+data.placeholder+'">';
            html += '</div>';
                $('#field-attributes').append(html);
        }
    </script>
@endsection
