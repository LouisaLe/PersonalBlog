@extends('layout.dashboard_app')

@section('content')
<section id="s_category" class="section section__category">
    <div class="section__header">
        <label class="title">All Post</label>
    </div>
    
    <div>
        <form action="{{ URL::to('update/post/'.$post -> id) }}" method="POST">
            @csrf
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Title: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="title" value="{{ $post -> title }}">
                </div>
            </div><!-- col-4 -->
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Post URL: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="url" value="{{ $post -> url}}"></input>
                </div>
            </div><!-- col-4 -->
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Post Details: <span class="tx-danger">*</span></label>
                    <textarea id="summernote" class="form-control" name="detail">{{ $post -> detail }}</textarea>
                </div>
            </div><!-- col-4 -->

            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                    <select name="category_id">
                        @foreach($categories as $key => $cat)
                            <option <?php if($post -> category_id == $cat -> id) { echo 'selected';} ?> value="{{ $cat -> id}}">{{ $cat -> name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Tags: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="tags" value="{{$post -> tags}}" data-role="tagsinput">
                </div>
            </div><!-- col-4 -->

            <div class="form-layout-footer">
                <button type="submit" class="btn btn-info mg-r-5">Update Post</button>
                <!-- <button class="btn btn-secondary btn-toggle">Cancel</button> -->
            </div><!-- form-layout-footer -->
        </form>
    </div>
</section>
@endsection