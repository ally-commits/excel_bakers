@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-switch.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/switch.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/toggle/bootstrap-switch.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/toggle/switchery.min.css') }}">
@endsection

@section('js')
<script src="{{ asset('app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js') }}"></script>

<script src="{{ asset('app-assets/js/scripts/forms/switch.js') }}" type="text/javascript"></script>
@endsection
@section('content') 
    <div class="card m-2">
        <div class="card-header d-flex" style="justify-content: space-between;">
            <h2>Add Product</h2>
            <a href="/admin/view-product" class="btn btn-primary">View Product</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.addProduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Product Name</label> 
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                    </div>
                    <div class="form-group col-md-6">
                        <label>Product Price</label> 
                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Product Image</label> 
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" required autocomplete="image" autofocus>

                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}< /strong>
                            </span>
                        @enderror 
                    </div> 

                    <div class="col-md-4 d-flex" style="align-items: center;">
                        <label class="mr-1">Veg</label>
                        <input type="radio" name="type" value="1" class="mr-3">
                        <label class="mr-1">Non Veg</label>
                        <input type="radio" name="type" value="0" class="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <label for="">Enter the Description</label>
                        <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" name="desc" id="" cols="10" rows="5"
                            value="{{ old('desc') }}" required autocomplete="desc" autofocus
                        ></textarea>

                        @error('desc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                    </div>
                </div>
                <button class="btn btn-primary mt-1" type="submit">Add Product</button>
            </form>
        </div>
    </div> 
@endsection