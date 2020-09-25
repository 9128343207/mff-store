@extends('layouts.vendor')
@section('title')
    Home
@endsection
@section('header')
    @include('inc.v-sidebar')
    @include('inc.vendor-nav')
@endsection

@section('content')
    <h1>Add products images - </h1>
    <hr>

    @if(Session::has('type') !== 0 && session('type') == 'new')
        @if($productImages)
       @foreach ($productImages as $image )
       <img height="300px" width="300px" src="{{  url('storage/products/img/',$image)}}">
        @endforeach
      @endif
    @else
      @if($productImages)
       @foreach ($productImages as $image )
       <div id="{{$image->id}}">
          <img height="300px" width="300px" src="{{  url('storage/products/img/',$image->filename)}}"><br><button class="btn btn-danger" onclick="deleteimage('{{$image->id}}')" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button><br>
       </div>
      
      @endforeach
      @endif
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

        function deleteimage(id) {
          $.ajax({
            url: "/vendor/delete",
            type: "post",
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            data: {'id': id},
            success: function (response) {
              // console.log(JSON.parse(response.msg));
              var msg = JSON.parse(response);
              var html = '';
              // switch(response.code){
              //   case 1:
              //     // html = '<div class="alert alert-success">';
              //     html += response.msg;
              //     // html += '</div>';
              //     break;

              //   case 0:
              //        // html = '<div class="alert alert-error">';
              //         html += response.msg;
              //         // html += '</div>';
              //     break;

              //   default:
              //     // html = '<div class="alert alert-error">';
              //         html += 'something went wrong!';
              //         // html += '</div>';
              // }
              // $(document.body).append(html);
              alert(msg.msg);
              $('#'+msg.id).remove();
               
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });

        }

    </script>

@endsection
