@extends("layouts.app")

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/invoice.css') }}">
@endsection
@section("content")
<section class="card">
    <div id="invoice-template" class="card-body"> 
        <div id="invoice-company-details" class="row">
            <div class="col-md-6 col-sm-12 text-center text-md-left">
                <div class="media">
                    <img src="{{ asset('/images/program/logo.png')}}" alt="company logo" class="">
                    <div class="media-body">
                        <ul class="ml-2 px-0 list-unstyled">
                            <li class="text-bold-800">Excel Bakers</li>
                            <li>Near State Bank,</li>
                            <li>Mangaluru,</li>
                            <li>Karnataka 32940,</li>
                            <li>India</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 text-center text-md-right">
                <h2>INVOICE</h2>
                <p class="pb-3"># INV-001001</p>
                <ul class="px-0 list-unstyled">
                    <li>Balance Due</li>
                    <li class="lead text-bold-800">Rs {{ $orders[0]->total}}</li>
                </ul>
            </div>
        </div> 
        <div id="invoice-customer-details" class="row pt-2">
            <div class="col-sm-12 text-center text-md-left">
                <p class="text-muted">Bill To</p>
            </div>
            <div class="col-md-6 col-sm-12 text-center text-md-left">
                <ul class="px-0 list-unstyled">
                    <li class="text-bold-800">{{ Auth::user()->name }}</li>
                    <li>{{ Auth::user()->email }}</li>
                    <li>{{ $orders[0]->address }}</li>
                    <li>{{ $orders[0]->phoneNumber }}</li> 
                </ul>
            </div>
            <div class="col-md-6 col-sm-12 text-center text-md-right">
                <p>
                    <span class="text-muted">Invoice Date :</span> {{ $orders[0]->updated_at }}</p>
                <p>
                    <span class="text-muted">Terms :</span> Due on Receipt</p> 
            </div>
        </div> 
        <div id="invoice-items-details" class="pt-2">
            <div class="row">
                <div class="table-responsive col-sm-12">
                    <table class="table">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Item &amp; Description</th>
                            <th class="text-right">Price</th>
                            <th class="text-right">Quantity</th>
                            <th class="text-right">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderProducts as $key=>$prd)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><strong>{{ $prd->name }} </strong><br>{{ $prd->desc }}</td>
                                    <td class="text-right">Rs {{ $prd->price }}</td>
                                    <td class="text-right">{{ $prd->quantity }}</td>
                                    <td class="text-right">Rs {{ $prd->quantity  * $prd->price}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row"> 
                <div class="col-md-12 ">
                    <p class="lead">Total due</p>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                <td>Sub Total</td>
                                <td class="text-right">Rs {{$orders[0]->total}}.00</td>
                                </tr>
                                <tr>
                                <td>TAX (12%)</td>
                                <td class="text-right">Rs {{ $orders[0]->total * 0.12 }}.00</td>
                                </tr>
                                <tr>
                                <td class="text-bold-800">Total</td>
                                <td class="text-bold-800 text-right">Rs {{ $orders[0]->total + $orders[0]->total * 0.12}}.00</td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p>Authorized person</p>
                        <img src="{{ asset('images/program/sign.png') }}" alt="signature" class="height-100">
                        <h6>Excel Bakeres</h6>
                        <p class="text-muted">Owner</p>
                    </div>
                </div>
            </div>
        </div> 
        <div id="invoice-footer">
            <div class="row">
            <div class="col-md-12 col-sm-12">
                <h6>Terms &amp; Condition</h6>
                <p>You know, being a test pilot isn't always the healthiest business
                in the world. We predict too much for the next year and yet far
                too little for the next 10.</p>
            </div> 
            </div>
        </div> 
    </div>
</section>
@endsection