@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Our Products</a>
        <span class="breadcrumb-item active">Products Section</span>
    </nav>

    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Details Product <a href="{{route('all.products')}}"
                    class="btn btn-primary pull-right">All Products</a>
            </h6>

            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Name: <span
                                    class="tx-danger">&nbsp;</span></label>
                            <strong>{{$viewProducts->product_name}}</strong>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Code: <span
                                    class="tx-danger">&nbsp;</span></label>
                            <strong>{{$viewProducts->product_code}}</strong>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Quantity: <span
                                    class="tx-danger">&nbsp;</span></label>
                            <strong>{{$viewProducts->product_quantity}}</strong>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Category: <span class="tx-danger">&nbsp;</span></label>
                            <strong>{{$viewProducts->category_name}}</strong>

                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Sub-Category: <span
                                    class="tx-danger">&nbsp;</span></label>
                            <strong>{{$viewProducts->subcategory_name}}</strong>

                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Brand: <span class="tx-danger">&nbsp;</span></label>
                            <strong>{{$viewProducts->brand_name}}</strong>

                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Size: <span
                                    class="tx-danger">&nbsp;</span></label>
                            <strong>{{$viewProducts->product_size}}</strong>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Color: <span
                                    class="tx-danger">&nbsp;</span></label>
                            <strong>{{$viewProducts->product_color}}</strong>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Price: <span
                                    class="tx-danger">&nbsp;</span></label>
                            <strong>${{$viewProducts->product_price}}</strong>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Product Details: <span class="tx-danger"></span></label>
                            <p>{!!$viewProducts->product_details!!}</p>

                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Video Link: <span class="tx-danger">&nbsp;</span></label>
                            <strong>{{$viewProducts->video_link}}</strong>

                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Images One: <span class="tx-danger"></span></label><br>


                            <img id="one" src="{{url($viewProducts->image_one)}}" alt=""
                                style="height:90px; width: 90px;" />
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Images Two: <span class="tx-danger"></span></label><br>
                            <img id="one" src="{{url($viewProducts->image_two)}}" alt=""
                                style="height:90px; width: 90px;" />

                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Images Three: <span class="tx-danger"></span></label><br>
                            <img id="one" src="{{url($viewProducts->image_three)}}" alt=""
                                style="height:90px; width: 90px;" />



                        </div>
                    </div><!-- col-4 -->

                </div>
                <!--row -->
                <hr>

                <div class="row">
                    <div class="col-lg-4">
                        <label class="">
                            @if($viewProducts->main_slider == 1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>


                            @endif
                            <!-- <input type="checkbox" name="main_slider" value="1">-->
                            <span>Main Slider</span>
                        </label>

                    </div>

                    <div class="col-lg-4">
                        <label class="">
                            @if($viewProducts->hot_deal == 1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>


                            @endif <span>Hot Deal</span>
                        </label>

                    </div>

                    <div class="col-lg-4">
                        <label class="">
                            @if($viewProducts->best_rated == 1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>


                            @endif <span>Best rate</span>
                        </label>

                    </div>

                    <div class="col-lg-4">
                        <label class="">
                            @if($viewProducts->trend == 1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>


                            @endif <span>Trend product</span>
                        </label>

                    </div>
                    <div class="col-lg-4">
                        <label class="">
                            @if($viewProducts->mid_slider == 1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>


                            @endif <span>Mid Slider</span>
                        </label>

                    </div>

                    <div class="col-lg-4">
                        <label class="">
                            @if($viewProducts->hot_new == 1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>


                            @endif
                            <span>Hot New</span>
                        </label>

                    </div>
                </div>

            </div>
        </div><!-- card -->
    </div><!-- row -->



</div><!-- form-layout -->
</div><!-- sl-mainpanel -->
</div> <!-- ########## END: MAIN PANEL ########## -->


</div>
@endsection