@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
@endsection
@section('content')
    <div class="card container">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ asset($product->image) }}" class="img-fluid">
            </div>
            <div class="col-md-9">
                <h2 class="display-4">{{ $product->name}}</h2>
                <p class="text-muted">{{ $product->desc }}</p>
                <div class="row">
                    <div class="col-md-6">
                        <p>Price: {{ $product->price}}</p>
                    </div>
                    <div class="col-md-6">
                        <p>Type: {{ $product->type}}</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            @foreach($reviews as $review)
                <div class="col-md-2 p-0 d-flex flex-column" style="align-items: center;">
                    <img src="{{ asset($review->image) }}" style="width: 50px; height: 50px; border-radius: 100px;">
                    <p>{{ $review->name }}</p>
                </div>
                <div class="col-md-4 p-0">
                    <p>{{$review->rate}} <i class="ft-star"></i></p>
                    <p>{{ $review->desc }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection