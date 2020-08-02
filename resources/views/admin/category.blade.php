@extends('layout.dashboard_app')

@section('content')
<section id="s_category" class="section section__category">
    <div class="section__header">
        <label class="title">Category List</label>
        <a href="" class="btn btn-sm btn-info btn-toggle">Add New</a>
    </div>

    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="th-sm">#
                </th>
                <th class="th-sm">Category Name
                </th>
                <th class="th-sm">Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>
                    <a href="" class="btn btn-sm btn-info">Edit</a>
                    <a href="" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="add-new__wrapper" id="addNew">
        <div class="title">Add Category</div>
        <form action="" method="POST">
            @csrf
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="category_name" placeholder="Enter Category">
                </div>
            </div><!-- col-4 -->

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Slug: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="slug" placeholder="Enter Slug">
                </div>
            </div><!-- col-4 -->

            <div class="form-layout-footer">
                <button class="btn btn-info mg-r-5">Add Post</button>
                <button class="btn btn-secondary btn-toggle">Cancel</button>
            </div><!-- form-layout-footer -->
        </form>
    </div>
</section>
@endsection