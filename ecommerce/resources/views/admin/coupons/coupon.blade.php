@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">

        <span class="breadcrumb-item active">
            <h5>Coupons table</h5>
        </span>
    </nav>

    <div class="sl-pagebody">
        <!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Coupons List
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modaldemo3"
                    style="float:right;border-radius: 5px;">Add Coupon</a>
            </h6>

            <!-- LARGE MODAL -->
            <div id="modaldemo3" class="modal fade">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content tx-size-sm">
                        <div class="modal-header pd-x-20">
                            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Coupon</h6>
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
                        <form action="{{route('add.coupon')}}" method="POST">
                            @csrf
                            <div class="modal-body pd-20">


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Coupon Code</label>
                                    <input type="text" name="coupon" placeholder="coupon Name" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <small id="emailHelp" class="form-text text-muted">Enter the coupon name.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Coupon Discount (%)</label>
                                    <input type="text" name="discount" placeholder="Coupon Discount"
                                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <small id="emailHelp" class="form-text text-muted">Enter the coupon name.</small>
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
                            <th class="wd-15p">Coupon Code</th>
                            <th class="wd-15p">Coupon Percentage</th>
                            <th class="wd-20p">Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($coupons as $key=>$coupon)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$coupon->coupon}}</td>
                            <td>{{$coupon->discount}} %</td>

                            <td><a href="{{URL::to('edit/coupon/'.$coupon->id)}}" class="btn btn-primary"
                                    style="border-radius: 5px;">Edit</a>
                                <a href="{{URL::to('delete/coupon/'.$coupon->id)}}" class=" btn btn-danger"
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