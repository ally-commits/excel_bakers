@extends('layouts.app')
@section('css') 
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/users.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
@endsection
@section('content')
<div class="container py-1">
    <div class="card">
        <div id="user-profile">
            <div class="row">
                <div class="col-12">
                    <div class="card profile-with-cover">
                        <div class="card-img-top img-fluid bg-cover height-300" style="background: url('{{ asset('images/sample/profile-bg.jpg') }}') 50%;"></div>
                            <div class="media profil-cover-details w-100">
                                <div class="media-left pl-2 pt-2">
                                    <a href="#" class="profile-image">
                                        <img src="{{ asset( $profile[0]->image ) }}" class="rounded-circle img-border height-100" alt="Card image">
                                    </a>
                                </div>
                                <div class="media-body pt-3 px-2">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="card-title">{{ Auth::user()->name}} </h3>
                                        </div> 
                                    </div>
                                </div>
                            </div> 
                        </div>

                        <div class="card-body p-1"> 
                            <ul class="nav nav-tabs nav-iconfall">
                                <li class="nav-item">
                                    <a class="nav-link @if($active == 1) active @endif" id="baseIcon-tab41" data-toggle="tab" aria-controls="tabIcon41" href="#tabIcon41" aria-expanded="true">
                                    <i class="ft-user"></i> Edit Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if($active == 2) active @endif" id="baseIcon-tab42" data-toggle="tab" aria-controls="tabIcon42" href="#tabIcon42" aria-expanded="false">
                                    <i class="ft-voicemail"></i> Manage Address</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if($active == 3) active @endif" id="baseIcon-tab43" data-toggle="tab" aria-controls="tabIcon43" href="#tabIcon43" aria-expanded="false">
                                    <i class="ft-shopping-cart"></i> Your Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if($active == 4) active @endif" id="baseIcon-tab44" data-toggle="tab" aria-controls="tabIcon44" href="#tabIcon44" aria-expanded="false">
                                    <i class="la la-cog"></i> Review</a>
                                </li>
                            </ul>
                            <div class="tab-content px-1 pt-1">
                                <div role="tabpanel" class="tab-pane @if($active == 1) active @endif" id="tabIcon41" aria-expanded="true" aria-labelledby="baseIcon-tab41">
                                    <h3 class="mb-1">Edit Profile</h3>
                                    <form action="{{ route('editProfile') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Change your Name</label>
                                                <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Change Your Name">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Change your Phone Number</label>
                                                <input type="number" value="{{ $profile[0]->phoneNumber }}" name="phoneNumber" class="form-control @error('phoneNumber') is-invalid @enderror" placeholder="Change Your Name">
                                                @error('phoneNumber')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row my-1">
                                            <div class="col-md-6">
                                                <label for="">Change your Profile Image</label>
                                                <input type="file" name="image" value="" class="form-control @error('image') is-invalid @enderror" placeholder="Change Your Name">

                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6"> 

                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success">Change Profile</button>
                                    </form>
                                </div>
                                <div class="tab-pane @if($active == 2) active @endif" id="tabIcon42" aria-labelledby="baseIcon-tab42">
                                    <h3 class="mb-1">Manage Address</h3>
                                    <div class="row">
                                        <div class="col-md-6"> 
                                            <form action="{{ route('addAddress') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="">Enter Address</label>
                                                    <textarea name="address" value="{{ old('address') }}"
                                                    class="form-control @error('address') is-invalid @enderror" rows="4"></textarea>
                                                    @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Enter the PhoneNumber</label>
                                                    <input type="number" value="phoneNumber" name="phoneNumber" value="{{ old('phoneNumber') }}"
                                                    class="form-control @error('phoneNumber') is-invalid @enderror">
                                                    @error('phoneNumber')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-success">Add Address</button>
                                            </form>
                                        </div>
                                        <div class="col-md-6 d-flex flex-v align-items-start" style="justify-content: flex-start;">
                                            @if(count($address) == 0)
                                                <p><i class="ft-alert-triangle"></i> No Address Found</p>
                                            @else
                                                @foreach($address as $key=>$adr)
                                                    <div class="flex-h w-100" style="align-items: center;justify-content: space-between;">
                                                        <div class="flex-v">
                                                            <p>Address {{$key+1}}: {{ $adr->address }}</p>
                                                            <p>Tel:  +{{ $adr->phoneNumber }}</p>
                                                        </div>
                                                        <a href="/del-address/{{$adr->id}}" class="ft ft-x" style="font-size: 22px;"></a>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane @if($active == 3) active @endif" id="tabIcon43" aria-labelledby="baseIcon-tab43">
                                    @if(count($orders) == 0)
                                        <p><i class="ft-alert-triangle"></i> No Orders Yet..</p>
                                    @else
                                        @foreach($orders as $key=>$order)
                                        <div class="flex-h w-100" style="align-items: center;justify-content: space-between;">
                                            <div class="flex-v">
                                                <p>Address : {{ $order->address }}</p>
                                                <p>Tel:  +{{ $order->phoneNumber }}</p>
                                                <p>Total:  ${{ $order->total }}</p>
                                                <p>Order Date: {{ $order->created_at }}</p>
                                            </div>
                                            <div>

                                            </div>
                                            <div>
                                                @if($order->status == 'pending')
                                                    <div class="badge badge-warning mr-1">Pending</div>
                                                @elseif($order->status == 'approved')
                                                    <div class="badge badge-success mr-1">Approved</div>
                                                @else
                                                    <div class="badge badge-danger mr-1">{{ $order->status }}</div>
                                                @endif
                                                @if($order->status == 'approved')
                                                    <a href="/profile/3/invoice/{{$order->id}}" class="disabled">View Details</a>
                                                @else
                                                    <a href="/profile/3/cancel-order/{{$order->id}}">Cancel Order</a>
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="tab-pane @if($active == 4) active @endif" id="tabIcon44" aria-labelledby="baseIcon-tab44">
                                    @if(count($products) == 0)
                                        No Products Available
                                    @endif
                                    @foreach($products as $product)
                                        <div class="row"> 
                                            <div class="col-md-2">
                                                <img src="{{ asset($product->image) }}" class="img-fluid">
                                            </div>
                                            <div class="col-md-3">
                                                <h6>{{ $product->name }}</h6>
                                                <p>{{ $product->desc }}</p>
                                                <p>{{ $product->price }}</p>
                                            </div>
                                            <div class="col-md-7">
                                                <form action="/user/review" method="POST"> 
                                                    @csrf
                                                    <input type="hidden" name="prdId" value="{{ $product->id }}">
                                                    <div class="form-group">
                                                        Rating:
                                                        <select name="rate">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option >3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Description</label>
                                                        <textarea class="form-control" name="desc" id="" cols="30" rows="2"></textarea>
                                                    </div>
                                                    <input type="submit" class="btn btn-primary btn-sm">
                                                </form>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
