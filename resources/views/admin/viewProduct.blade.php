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
                        <tr role="row"> 
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                aria-label="Start date: activate to sort column ascending" style="width: 74px;">Product Image</th>

                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                aria-label="Position: activate to sort column ascending" style="width: 100px;">Product Name</th>
                            
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                aria-label="Office: activate to sort column ascending" style="width: 40px;">Price</th>
                            
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                aria-label="Age: activate to sort column ascending" style="width: 80px;">Type</th>
                            
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                aria-label="Start date: activate to sort column ascending" style="width: 30px;">Action</th>     
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach($products as $key=>$product)
                            <tr> 
                                <td><img src="{{ asset($product['image']) }}" style="height: 50px;"/></td>
                                <td>{{ $product['name'] }}</td> 
                                <td>{{ $product['price'] }}</td> 
                                <td>
                                    @if($product['type'])
                                        <span class="d-flex align-items-center"><i class="ft-stop-circle text-success mr-1"></i> Veg</span>
                                    @else
                                        <span class="d-flex align-items-center"><i class="ft-stop-circle text-danger mr-1"></i> Non Veg</span>
                                    @endif
                                </td> 
                                <td class="d-flex" style="align-items: center;"> 
                                    <span class="dropdown">
                                        <button id="{{ $product->id }}" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft ft-settings"></i></button>
                                        <span aria-labelledby="btnSearchDrop10" class="dropdown-menu mt-1 dropdown-menu-right">
                                            <a href="#" data-toggle="modal" data-target="#{{ $product->id }}" class="dropdown-item"><i class="ft-edit-2"></i> Edit</a>
                                            <a href="/admin/delete-product/{{ $product->id }}" class="dropdown-item"><i class="ft-x"></i> Delete</a> 
                                        </span>
                                    </span>
                                </td>
                                <div class="modal fade text-left" id="{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $product->id }}" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="{{ $product->id }}">Participant Name</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('admin.updateProduct') }}" enctype="multipart/form-data"> 
                                                    @csrf
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>Product Name</label> 
                                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required autocomplete="name" autofocus>

                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror 
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Product Price</label> 
                                                            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{  $product->price }}" required autocomplete="price" autofocus>

                                                            @error('price')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror 
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>Product Image <span class="text-danger">Select image only if you have to change. else leave it empty</span></label> 
                                                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="">

                                                            @error('image')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror 
                                                        </div> 

                                                        <div class="col-md-4">
                                                            @if($product['type'])
                                                                <label style="margin-right: 5px;">Veg</label>
                                                                <input type="radio" name="type" value="1" class="mr-2" checked>
                                                                <label style="margin-right: 5px;">Non Veg</label>
                                                                <input type="radio" name="type" value="0" class="">
                                                            @else
                                                                <label style="margin-right: 5px;">Veg</label>
                                                                <input type="radio" name="type" value="1" class="mr-2" >
                                                                <label style="margin-right: 5px;">Non Veg</label>
                                                                <input type="radio" name="type" value="0" class="" checked>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <label for="">Enter the Description</label>
                                                            <input name="desc" class="form-control @error('desc') is-invalid @enderror" name="desc" 
                                                                value="{{ $product->desc }}" />

                                                            @error('desc')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror 
                                                        </div>
                                                    </div> 
                                                    <input type="hidden" name="id" value="{{ $product->id }}" />
                                                    <hr />
                                                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-outline-primary">Save changes</button>
                                                </form>
                                            </div> 
                                        </div> 
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            
    </div>
</div>
@endsection