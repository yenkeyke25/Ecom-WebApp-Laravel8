@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Our Products</a>
        <span class="breadcrumb-item active">Posts Section</span>
    </nav>

    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Post Update <a href="{{route('all.blogpost')}}"
                    class="btn btn-primary pull-right">All Posts</a>
            </h6>
            <p class="mg-b-20 mg-sm-b-30">Edit Post Form</p>
            <form action="{{url('update/posts/'.$post->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Post Title English: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="post_title_en"
                                    value="{{$post->post_title_en}}">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Post Title Hindi: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="post_title_in"
                                    value="{{$post->post_title_in}}">
                            </div>
                        </div><!-- col-4 -->


                        <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Post Category: <span
                                        class="tx-danger">*</span></label>
                                <select class="form-control select2" name="category_id">
                                    <option label="Choose Category"></option>
                                    @foreach($catPosts as $catPost)

                                    <option value="{{$catPost->id}}" <?php if ($catPost->id == $post->category_id) {
                                                                            echo "selected";
                                                                        } ?>>{{$catPost->category_name_en}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>





                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details English: <span
                                            class="tx-danger">*</span></label>
                                    <textarea class="form-control" id="summernote" name="detail_en">

                                    {{$post->details_en}}</textarea>
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
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details Hindi: <span
                                            class="tx-danger">*</span></label>
                                    <textarea class="form-control" id="summernote2" name="detail_in">
                                    {{$post->details_in}}</textarea>
                                </div>
                            </div><!-- col-4 -->



                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Post Image: <span
                                            class="tx-danger">*</span></label><br>
                                    <label class="custom-file">
                                        <input type="file" id="file" class="custom-file-input" name="post_image"
                                            onchange="readURL(this);">

                                        <span class="custom-file-control"></span>

                                    </label>
                                    <img id="one" src="" alt="" />
                                </div>
                                <input type="hidden" id="file" class="custom-file-input" name="old_image"
                                    value="{{$post->image}}">

                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Old Post Image: <span
                                            class="tx-danger">*</span></label>


                                    <img id="one" src="{{URL::to($post->image)}}" style="height: 50px; width: 90px;"
                                        alt="" />
                                </div>
                            </div><!-- col-4 -->
                            <br><br>


                        </div><!-- row -->
                        <hr>


                        <br><br>
                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5" type="submit">Submit Form</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </div><!-- card -->
            </form>
        </div><!-- row -->



    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <!-- script to prview all 3 images with js -->
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
    <script type="text/javascript">
    function readURL(input) {
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
    @endsection