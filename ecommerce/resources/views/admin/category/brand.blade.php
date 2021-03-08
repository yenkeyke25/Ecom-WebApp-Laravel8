@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">

        <span class="breadcrumb-item active">
            <h5>Brands Data table</h5>
        </span>
    </nav>

    <div class="sl-pagebody">
        <!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">List Of Brands
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modaldemo3"
                    style="float:right;border-radius: 5px;">Add New</a>
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
                                    <input type="text" name="brand_name" placeholder="brand Name" class="form-control"
                                        aria-describedby="emailHelp">
                                    <small id="emailHelp" class="form-text text-muted">Enter the brand name.</small>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brand Logo</label>
                                    <input type="file" name="brand_logo" class="form-control"
                                        aria-describedby="emailHelp">
                                    <small id="emailHelp" class="form-text text-muted">Enter the brand image.</small>
                                </div>



                            </div><!-- modal-body -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                                <button type="button" class="btn btn-secondary pd-x-20"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </form><!-- end of form -->
                    </div>
                </div><!-- modal-dialog -->
            </div><!-- modal -->

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Brand Name</th>
                            <th class="wd-15p">Brand Logo</th>

                            <th class="wd-20p">Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($brands as $key=>$brand)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$brand->brand_name}}</td>
                            <td><img src="{{URL::to($brand->brand_logo)}}" height="80px;" width="80px;"></td>

                            <td><a href="{{URL::to('edit/brand/'.$brand->id)}}" class="btn btn-primary"
                                    style="border-radius: 5px;">Edit</a>
                                <a href="{{URL::to('delete/brand/'.$brand->id)}}" class=" btn btn-danger"
                                    style="border-radius: 5px;" id="delete">Delete</a>

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