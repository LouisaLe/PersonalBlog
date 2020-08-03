@extends('layout.dashboard_app')

@section('content')

    <div class="title">Edit Category</div>
        <form action="{{ URL::to('admin/update/category/'.$cat -> id) }}" method="POST">
            @csrf
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="name" value="{{$cat -> name}}">
                </div>
            </div><!-- col-4 -->

            <div class="form-layout-footer">
                <button type="submit" class="btn btn-info mg-r-5">Update Category</button>
            </div><!-- form-layout-footer -->
        </form>
    </div>
@endsection