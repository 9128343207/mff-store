@extends('layouts.vendor')
@section('title')
    Home
@endsection
@section('header')
    @include('inc.v-sidebar')
    @include('inc.vendor-nav')
@endsection

@section('content')
    <h1>Add New Product - </h1>
    {{-- <hr>{{ dd($product)}} --}}
    @if($productImages)
     @foreach ($productImages as $image )
     <img height="300px" width="300px" src="{{ asset('files/',$image)}}">
    @endforeach
    @endif

    <form action="/vendor/upload" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
        <div class="input-group control-group increment" >
                <input type="file" name="filename[]" class="form-control">
                <div class="input-group-btn">
                  <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                </div>
              </div>
              <div class="clone hide">
                <div class="control-group input-group" style="margin-top:10px">
                  <input type="file" name="filename[]" class="form-control">
                  <div class="input-group-btn">
                    <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
    </form>
    <script type="text/javascript">

        $(document).ready(function() {

          $(".btn-success").click(function(){
              var html = $(".clone").html();
              $(".increment").after(html);
          });

          $("body").on("click",".btn-danger",function(){
              $(this).parents(".control-group").remove();
          });

        });

    </script>

@endsection
