@extends("layouts.admin")
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
@endsection

@section('content')
    <div class="card m-1 p-1">
    @if(count($orders) == 0)
        <p><i class="ft-alert-triangle"></i> No New Orders</p>
    @else
        @foreach($orders as $key=>$order)
        <div class="flex-h w-100" style="align-items: center;justify-content: space-around;">
            <div class="flex-v mx-1" style="flex:4">
                <p>Address : {{ $order->address }}</p> 
                <p>Tel:  +{{ $order->phoneNumber }}</p>
                <p>Order Date: {{ $order->created_at }}</p>
            </div>
            <div style="flex:2">
                @foreach($orderProducts as $prd) 
                    @if($prd->orderId == $order->id)
                    <div class="flex-h" style="justify-content: space-between;">
                        <h6>{{ $prd->name}}</h6>
                        <div class="flex-h">
                            <span class="text-muted">{{ $prd->quantity }} x</span>
                            <span class="text-muted">${{ $prd->price }} =</span>
                            <span class="text-muted">${{ $prd->quantity * $prd->price }}</span>
                        </div>
                    </div> 
                    <hr class="m-0" style="margin: 5px 0px;">
                    @endif
                @endforeach
            <p>Total:  ${{ $order->total }}</p>
            </div>
            <div class="flex-v mx-1" style="flex: 1">
                @if($order->status == 'pending')
                    <div class="badge badge-warning mb-1">Pending</div>
                @elseif($order->status == 'approved')
                    <div class="badge badge-success mb-1">Approved</div>
                @else
                    <div class="badge badge-danger mb-1">{{ $order->status }}</div>
                @endif   
                @if($order->status == "pending")
                <a href="/admin/approve-order/{{$order->id}}">Approved Order</a>
                <a href="/admin/cancel-order/{{$order->id}}">Cancel Order</a> 
                @endif
            </div>
        </div>

        <hr>
        @endforeach
    @endif
    </div>
@endsection