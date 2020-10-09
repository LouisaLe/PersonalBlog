@extends('layout.dashboard_app')

@section('content')
<section id="s_category" class="section section__category">
    <div class="section__header">
        <label class="title">Add New Post</label>
        <a href="" class="btn btn-sm btn-info btn-toggle" data-target="new">Add New</a>
    </div>
    
    <div>
        <form action="{{ route('store.post') }}" method="POST">
            @csrf
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Title: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="title" placeholder="Enter Post Title">
                </div>
            </div><!-- col-4 -->
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Post URL: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="url" placeholder="Enter URL"></input>
                </div>
            </div><!-- col-4 -->
            <div class="col-lg-12">
                <div class="form-group">
                    <!-- <label class="form-control-label">Post Details: <span class="tx-danger">*</span></label> -->
                    <!-- <textarea id="summernote" class="form-control" name="detail">Hello Summernote</textarea> -->
                    <label class="form-control-label">Post Description: <span class="tx-danger">*</span></label>
                    <textarea class="form-control" type="text" name="detail" placeholder="Enter Post Description"></textarea>
                </div>
            </div><!-- col-4 -->

            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                    <select name="category_id">
                        @foreach($categories as $key => $cat)
                            <option value="{{ $cat -> id}}">{{ $cat -> name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Tags: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="tags" value="" data-role="tagsinput" placeholder="Enter tags">
                </div>
            </div><!-- col-4 -->

            <div class="form-layout-footer">
                <button type="submit" class="btn btn-info mg-r-5">Add Post</button>
                <button class="btn btn-secondary btn-toggle">Cancel</button>
            </div><!-- form-layout-footer -->
        </form>
    </div>
</section>
@endsection