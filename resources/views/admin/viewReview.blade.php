@extends('layouts.admin')
@section('css') 
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/scripts/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="card m-1 p-1">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">  
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped table-bordered zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr> 
                            <th>Name</th>
                            <th>Image</th>
                            <th>Rating</th>
                            <th>Description</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach($products as $key=>$product)
                            <tr> 
                                <td>{{ $product->name }}</td>
                                <td><img src="{{ asset($product->image) }}" style="height: 50px;"/></td>
                                <td>{{ $product->rate }}</td> 
                                <td>{{ $product->desc }}</td>
                                <td>{{ $product->email }}</td>
                                <td><a href="/admin/delete-review/{{$product->id}}">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            
    </div>
</div>
@endsection