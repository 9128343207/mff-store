@extends('layouts.vendor')
@section('title')
    Home
@endsection
@section('header')
    @include('inc.v-sidebar')
    @include('inc.vendor-nav')
@endsection

@section('content')
	<h3>Vendor profile</h3>
	
	<form>
		
		<input type="hidden" name="store_id" value="{{$store->id}}"><br>
		
		<div class="form-group">
			<input type="text" value="{{$store->store_name}}" class="form-control" id="taskTitle"  name="storename" placeholder="Item Name">
			@error('name')
			<span class="alert-danger" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
		 <div class="form-group">
			<textarea type="text"  class="form-control" id="taskDescription" name="store_desc">{{$store->description}}</textarea>
		</div>
	</form>
@endsection