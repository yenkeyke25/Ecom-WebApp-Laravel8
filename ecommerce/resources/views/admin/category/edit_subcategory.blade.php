@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">

        <span class="breadcrumb-item active">
            <h5>Update SubCategory Data table</h5>
        </span>
    </nav>

    <div class="sl-pagebody">
        <!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update Sub-Categories
            </h6>



            <div class="table-wrapper">


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
                <form action="{{url('update/subcategory/'.$subcategories->id)}}" method="POST">
                    @csrf
                    <div class="modal-body pd-20">


                        <div class="form-group">
                            <label for="exampleInputEmail1">Sub-Category Name</label>
                            <input type="text" name="subcategory_name" value="{{$subcategories->subcategory_name}}"
                                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>

                            <select class="form-control" name="category_id" id="">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" <?php if ($category->id == $subcategories->category_id) {
                                                                        echo "selected";
                                                                    }  ?>>{{$category->category_name}}</option>

                                @endforeach
                            </select>
                        </div>


                    </div><!-- modal-body -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">Update</button>
                    </div>
                </form><!-- end of form -->
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