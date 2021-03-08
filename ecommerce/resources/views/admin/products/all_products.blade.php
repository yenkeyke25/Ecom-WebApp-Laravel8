@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">

        <span class="breadcrumb-item active">
            <h5>All Products Data table</h5>
        </span>
    </nav>

    <div class="sl-pagebody">
        <!-- sl-page-title -->

        <div class="card pd-20 pd-sm-10">
            <h6 class="card-body-title">List Of Products
                <a href="{{route('add.products')}}" class="btn btn-primary" style="float:right;border-radius: 5px;">Add
                    Products</a>
            </h6>

            <!-- LARGE MODAL -->
            <div id="modaldemo3" class="modal fade">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content tx-size-sm">
                        <div class="modal-header pd-x-20">
                            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add brand</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- adding dorm -->
                        <form action="{{route('add.brand')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body pd-20">


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brand Name</label>
                                    <input type="text" name="brand_name" placeholder="brand Name" class="form-control" aria-describedby="emailHelp">
                                    <small id="emailHelp" class="form-text text-muted">Enter the brand name.</small>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brand Logo</label>
                                    <input type="file" name="brand_logo" class="form-control" aria-describedby="emailHelp">
                                    <small id="emailHelp" class="form-text text-muted">Enter the brand image.</small>
                                </div>



                            </div><!-- modal-body -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                            </div>
                        </form><!-- end of form -->
                    </div>
                </div><!-- modal-dialog -->
            </div><!-- modal -->

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">Product Code</th>
                            <th class="wd-15p">Product Name</th>
                            <th class="wd-15p">Image</th>
                            <th class="wd-15p">Category</th>
                            <th class="wd-15p">Brand</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-15p">Quantity</th>

                            <th class="wd-20p">Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->product_code}}</td>
                            <td>{{$product->product_name}}</td>
                            <td><img src="{{URL::to($product->image_one)}}" height="60px;" width="60px;"></td>
                            <td>{{$product->category_name}}</td>
                            <td>{{$product->brand_name}}</td>
                            <td>
                                @if($product->status == 1)
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>

                                @endif


                            </td>
                            <td>{{$product->product_quantity}}</td>



                            <td><a href="{{URL::to('edit/products/'.$product->id)}}" class="btn btn-sm btn-info" title="Edit" style="border-radius: 5px;"><i style='font-size:19px' class='fas'>&#xf044;</i></a>
                                <a href="{{URL::to('delete/products/'.$product->id)}}" class=" btn btn-sm btn-danger" title="Delete" style="border-radius: 5px;" id="delete"><i style='font-size:19px' class='fas'>&#xf2ed;</i></a>
                                <a href="{{URL::to('show/products/'.$product->id)}}" class="btn btn-sm btn-warning" title="Show" style="border-radius: 5px;"><i style='font-size:19px' class='fas'>&#xf06e;</i></a>


                                @if($product->status == 1)
                                <a href="{{URL::to('inactive/products/'.$product->id)}}" class=" btn btn-sm btn-danger" title="Inactive" style="border-radius: 5px;"><i style='font-size:19px' class='fa fa-thumbs-down '></i></a>
                                @else
                                <a href="{{URL::to('active/products/'.$product->id)}}" class=" btn btn-sm btn-info" title="Active" style="border-radius: 5px;"><i style='font-size:19px' class='fa fa-thumbs-up'></i></a>
                                @endif
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div>

    <!-- <p class="tx-11 tx-uppercase tx-spacing-2 mg-t-40 mg-b-10 tx-gray-600">Javascript Code</p>
        <pre><code class="javascript pd-20">$('#datatable1').DataTable({
responsive: true,
language: {
  searchPlaceholder: 'Search...',
  sSearch: '',
  lengthMenu: '_MENU_ items/page',
}
});</code></pre> -->



    @endsection