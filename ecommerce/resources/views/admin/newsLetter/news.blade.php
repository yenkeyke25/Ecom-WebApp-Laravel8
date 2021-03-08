@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">

        <span class="breadcrumb-item active">
            <h5>Subcribers Data table</h5>
        </span>
    </nav>

    <div class="sl-pagebody">
        <!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">List Of Brands
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modaldemo3"
                    style="float:right;border-radius: 5px;">Delete All Subscribers</a>
            </h6>

            <!-- LARGE MODAL -->
            <div id="modaldemo3" class="modal fade">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content tx-size-sm">
                        <div class="modal-header pd-x-20">
                            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add category</h6>
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


                    </div>
                </div><!-- modal-dialog -->
            </div><!-- modal -->

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Email</th>
                            <th class="wd-15p">Subscription Date</th>
                            <th class="wd-20p">Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($news as $key=>$new)
                        <tr>
                            <td><input type="checkbox"> {{$key+1}}</td>
                            <td>{{$new->email}}</td>
                            <td>{{\Carbon\Carbon::parse($new->created_at)->diffForhumans()}}</td>
                            <td>
                                <a href="{{URL::to('delete/subcribers/'.$new->id)}}" class=" btn btn-danger"
                                    style="border-radius: 5px;" id="delete">Delete</a>

                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div>



    @endsection