@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Our Products</a>
        <span class="breadcrumb-item active">Update Products Section</span>
    </nav>

    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update product <a href="{{route('all.products')}}"
                    class="btn btn-primary pull-right" style="border-radius: 5px;">All Products</a>
            </h6>
            <p class="mg-b-20 mg-sm-b-30">Update Products Form</p>
            <form action="{{url('update/products/withnophoto/'.$products->id)}}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Product Name: <span class="tx-danger"></span></label>
                                <input class="form-control" type="text" name="product_name"
                                    value="{{$products->product_name}}">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Product Code: <span class="tx-danger"></span></label>
                                <input class="form-control" type="text" name="product_code"
                                    value="{{$products->product_code}}">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Product Quantity: <span
                                        class="tx-danger"></span></label>
                                <input class="form-control" type="text" name="product_quantity"
                                    value="{{$products->product_quantity}}">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Discount Price: <span
                                        class="tx-danger"></span></label>
                                <input class="form-control" type="text" name="discount_price"
                                    value="{{$products->discount_price}}">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="category_id">
                                    <option label="Choose Category"></option>
                                    @foreach($categories as $category)

                                    <option value="{{$category->id}}" <?php if ($category->id == $products->category_id) {
                                                                            echo "selected";
                                                                        } ?>>{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Sub-Category: <span class="tx-danger"></span></label>
                                <select class="form-control select2" name="subcategory_id">
                                    @foreach($subcategories as $subcategory)

                                    <option value="{{$subcategory->id}}" <?php if ($subcategory->id == $products->subcategory_id) {
                                                                                echo "selected";
                                                                            } ?>>{{$subcategory->subcategory_name}}
                                    </option>
                                    @endforeach

                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="brand_id">
                                    <option label="Choose Brand"></option>
                                    @foreach($brands as $brand)

                                    <option value="{{$brand->id}}" <?php if ($brand->id == $products->brand_id) {
                                                                        echo "selected";
                                                                    } ?>>{{$brand->brand_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Size: <span class="tx-danger"></span></label>
                                <input class="form-control" type="text" name="product_size"
                                    value="{{$products->product_size}}" data-role="tagsinput" id='size'>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Color: <span class="tx-danger"></span></label>
                                <input class="form-control" type="text" name="product_color"
                                    value="{{$products->product_color}}" data-role="tagsinput" id='color'>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Price: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_price"
                                    value="{{$products->product_price}}" id='size'>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Product Details: <span
                                        class="tx-danger">*</span></label>
                                <textarea class="form-control" id="summernote"
                                    name="product_details">{{$products->product_details}}</textarea>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="video_link"
                                    value="{{$products->video_link}}">
                            </div>
                        </div><!-- col-4 -->



                    </div><!-- row -->
                    <hr>
                    <br><br>
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="main_slider" value="1" <?php if ($products->main_slider == 1) {
                                                                                        echo "checked";
                                                                                    } ?>>
                                <span>Main Slider</span>
                            </label>

                        </div>

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="hot_deal" value="1" <?php if ($products->hot_deal == 1) {
                                                                                        echo "checked";
                                                                                    } ?>>
                                <span>Hot Deal</span>
                            </label>

                        </div>

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="best_rated" value="1" <?php if ($products->best_rated == 1) {
                                                                                        echo "checked";
                                                                                    } ?>>
                                <span>Best rate</span>
                            </label>

                        </div>

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="trend" value="1" <?php if ($products->trend == 1) {
                                                                                    echo "checked";
                                                                                } ?>>
                                <span>Trend product</span>
                            </label>

                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="mid_slider" value="1" <?php if ($products->mid_slider == 1) {
                                                                                        echo "checked";
                                                                                    } ?>>
                                <span>Mid Slider</span>
                            </label>

                        </div>

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="hot_new" value="1" <?php if ($products->hot_new == 1) {
                                                                                    echo "checked";
                                                                                } ?>>
                                <span>Hot New</span>
                            </label>

                        </div>

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="byone_getone" value="1" <?php if ($products->byone_getone == 1) {
                                                                                            echo "checked";
                                                                                        } ?>>
                                <span>Buy One Get One</span>
                            </label>

                        </div>
                    </div>
                    <br><br>
                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5" type="submit" style="border-radius: 5px;">Update
                            Product</button>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
        </div><!-- card -->
        </form>
    </div><!-- row -->


    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update Images</h6>
            <span class="tx-danger" text="muted">Please update images one at the time.</span>
            <form action="{{url('update/products/photos/'.$products->id)}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-lg-6 col-sm-6">

                        <label class="form-control-label">Images One: <span class="tx-danger">*</span></label><br>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="image_one"
                                onchange="readURL1(this);">

                            <span class="custom-file-control"></span><br><br>
                            <input type="hidden" name="old_one" value="{{$products->image_one}}">
                            <img id="one" src="#" alt="" />
                        </label>

                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <img src="{{URL::to($products->image_one)}}" style="height:90px; width:90px;" alt="">
                    </div>
                </div><!-- col-4 -->

                <div class="row">
                    <div class="col-lg-6 col-sm-6">

                        <label class="form-control-label">Images Two: <span class="tx-danger">*</span></label><br>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="image_two"
                                onchange="readURL2(this);">
                            <span class="custom-file-control"></span><br><br>
                            <input type="hidden" name="old_two" value="{{$products->image_two}}">

                            <img id="two" src="#" alt="" />
                        </label>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <img src="{{URL::to($products->image_two)}}" style="height:90px; width:90px;" alt="">
                    </div>

                </div><!-- col-4 -->

                <div class="row">
                    <div class="col-lg-6 col-sm-6">

                        <label class="form-control-label">Images Three: <span class="tx-danger">*</span></label><br>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="image_three"
                                onchange="readURL3(this);">
                            <span class="custom-file-control"></span><br><br>
                            <input type="hidden" name="old_three" value="{{$products->image_three}}">

                            <img id="three" src="#" alt="" />
                        </label>

                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <img src="{{URL::to($products->image_three)}}" style="height:90px; width:90px;" alt="">
                    </div>
                </div><!-- col-4 -->
                <button type="submit" class="btn btn-primary" style="border-radius: 5px;">Update Photos</button>
            </form>
        </div>
    </div>

</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('select[name="category_id"]').on('change', function() {
        var category_id = $(this).val();
        if (category_id) {

            $.ajax({
                url: "{{ url('/get/subcategory/') }}/" + category_id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var d = $('select[name="subcategory_id"]').empty();
                    $.each(data, function(key, value) {

                        $('select[name="subcategory_id"]').append(
                            '<option value="' + value.id + '">' + value
                            .subcategory_name + '</option>');

                    });
                },
            });

        } else {
            alert('danger');
        }

    });
});
</script>
<!-- script to prview all 3 images with js -->
<script type="text/javascript">
function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#one')
                .attr('src', e.target.result)
                .width(80)
                .height(80);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<script type="text/javascript">
function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#two')
                .attr('src', e.target.result)
                .width(80)
                .height(80);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<script type="text/javascript">
function readURL3(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#three')
                .attr('src', e.target.result)
                .width(80)
                .height(80);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection