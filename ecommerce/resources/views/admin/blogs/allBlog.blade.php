@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">

        <span class="breadcrumb-item active">
            <h5>All Blogs table</h5>
        </span>
    </nav>

    <div class="sl-pagebody">
        <!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">List Of Blog
                <a href="{{route('add.blogpost')}}" class="btn btn-primary" style="float:right;border-radius: 5px;">Add
                    New Post</a>
            </h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">Post Title</th>
                            <th class="wd-15p">Post Category</th>
                            <th class="wd-15p">Image</th>

                            <th class="wd-20p">Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->post_title_en}}</td>

                            <td>{{$post->category_name_en}}</td>
                            <td><img src="{{URL::to($post->image)}}" style="height: 50px; width: 60px;" alt="">
                            </td>
                            <td><a href="{{URL::to('edit/post/'.$post->id)}}" class="btn btn-primary"
                                    style="border-radius: 5px;">Edit</a>
                                <a href="{{URL::to('delete/post/'.$post->id)}}" class=" btn btn-danger"
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