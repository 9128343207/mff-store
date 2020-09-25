@extends('layouts.vendor')
@section('title')
    Categories
@endsection
@section('header')
    @include('inc.ad-sidebar')
    @include('inc.vendor-nav')
@endsection

@section('style')
<style type="text/css">
    .tree, .tree ul {

    margin:0;

    padding:0;

    list-style:none

}

.tree ul {

    margin-left:1em;

    position:relative

}

.tree ul ul {

    margin-left:.5em

}

.tree ul:before {

    content:"";

    display:block;

    width:0;

    position:absolute;

    top:0;

    bottom:0;

    left:0;

    border-left:1px solid

}

.tree li {

    margin:0;

    padding:0 1em;

    line-height:2em;

    color:#369;

    font-weight:700;

    position:relative

}

.tree ul li:before {

    content:"";

    display:block;

    width:10px;

    height:0;

    border-top:1px solid;

    margin-top:-1px;

    position:absolute;

    top:1em;

    left:0

}

.tree ul li:last-child:before {

    background:#fff;

    height:auto;

    top:1em;

    bottom:0

}

.indicator {

    margin-right:5px;

}

.tree li a {

    text-decoration: none;

    color:#369;

}

.tree li button, .tree li button:active, .tree li button:focus {

    text-decoration: none;

    color:#369;

    border:none;

    background:transparent;

    margin:0px 0px 0px 0px;

    padding:0px 0px 0px 0px;

    outline: 0;

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
                    <h4>Stores</h4>
                    <!-- <div class="add-product">
                    <a href="{{ Route('vendor.product.listing') }}"></a>
                    </div> -->
                    <div class="col-md-6">
                        <div class="asset-inner">
                       <h3>Category List</h3>

                        <ul id="tree1">

                            @foreach($categories as $category)

                                <li>

                                    {{ $category->title }}

                                    @if(count($category->childs))

                                        @include('admin.products.manageChild',['childs' => $category->childs])

                                    @endif

                                </li>

                            @endforeach

                        </ul>

                    </div>
                    </div>
                    

                    <div class="col-md-6">

                        <h3>Add New Category</h3>


                            
                            <form action="{{route('admin.add.category')}}" method="post">
                                @csrf
                                @if ($message = Session::get('success'))

                                    <div class="alert alert-success alert-block">

                                        <button type="button" class="close" data-dismiss="alert">×</button> 

                                            <strong>{{ $message }}</strong>

                                    </div>

                                @endif
                                <div class="form-group ">
                                    <select name="type">
                                        <option>Choose...</option>
                                        <option value="main">Main menu</option>
                                        <option value="products">Products</option>
                                    </select>
                                </div>
                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <label>Title</label>
                                <input type="text" name="title" class="form-control">
                                <span class="text-danger">{{ $errors->first('title') }}</span>

                                <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">

                                    
                                    
                                                                <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">

                                    {!! Form::label('Category:') !!}

                                    {!! Form::select('parent_id',$allCategories, old('parent_id'), ['class'=>'form-control', 'placeholder'=>'Select Category']) !!}

                                    <span class="text-danger">{{ $errors->first('parent_id') }}</span>

                                </div>
                                <div class="form-group">

                                    <button class="btn btn-success">Add New</button>

                                </div>
                            </div>
                            </form>


                               


                                



                    </div>

                </div>


                

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
        $.fn.extend({

    treed: function (o) {

      

      var openedClass = 'glyphicon-minus-sign';

      var closedClass = 'glyphicon-plus-sign';

      

      if (typeof o != 'undefined'){

        if (typeof o.openedClass != 'undefined'){

        openedClass = o.openedClass;

        }

        if (typeof o.closedClass != 'undefined'){

        closedClass = o.closedClass;

        }

      };

      

        /* initialize each of the top levels */

        var tree = $(this);

        tree.addClass("tree");

        tree.find('li').has("ul").each(function () {

            var branch = $(this);

            branch.prepend("");

            branch.addClass('branch');

            branch.on('click', function (e) {

                if (this == e.target) {

                    var icon = $(this).children('i:first');

                    icon.toggleClass(openedClass + " " + closedClass);

                    $(this).children().children().toggle();

                }

            })

            branch.children().children().toggle();

        });

        /* fire event from the dynamically added icon */

        tree.find('.branch .indicator').each(function(){

            $(this).on('click', function () {

                $(this).closest('li').click();

            });

        });

        /* fire event to open branch if the li contains an anchor instead of text */

        tree.find('.branch>a').each(function () {

            $(this).on('click', function (e) {

                $(this).closest('li').click();

                e.preventDefault();

            });

        });

        /* fire event to open branch if the li contains a button instead of text */

        tree.find('.branch>button').each(function () {

            $(this).on('click', function (e) {

                $(this).closest('li').click();

                e.preventDefault();

            });

        });

    }

});

/* Initialization of treeviews */

$('#tree1').treed();
    </script>
@endsection
