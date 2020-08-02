@extends('layout.dashboard_app')

@section('content')
<section id="s_category" class="section section__category">
    <div class="section__header">
        <label class="title">Posts List</label>
        <a id="" href="#" class="btn btn-sm btn-info btn-toggle">Add New</a>
    </div>

    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="th-sm">#
                </th>
                <th class="th-sm">Title
                </th>
                <th class="th-sm">Category
                </th>
                <th class="th-sm">Date Published
                </th>
                <th class="th-sm">Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect System ArchitectSystem Architect System ArchitectSystem ArchitectSystem ArchitectSystem ArchitectSystem Architect</td>
                <td>System Architect</td>
                <td>System Architect</td>
                <td>
                    <a href="" class="btn btn-sm btn-info">Edit</a>
                    <a href="" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="add-new__wrapper" id="addNew">
        <div class="title">Add New Post</div>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Title: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="title" placeholder="Enter Post Title">
                </div>
            </div><!-- col-4 -->
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Excerpt: <span class="tx-danger">*</span></label>
                    <textarea class="form-control" type="text" name="excerpt" placeholder="Enter Excerpt"></textarea>
                </div>
            </div><!-- col-4 -->
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Post Details: <span class="tx-danger">*</span></label>
                    <textarea id="summernote" class="form-control" name="detail">Hello Summernote</textarea>
                </div>
            </div><!-- col-4 -->

            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                    <select name="" id="">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Tags: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="tags" value="" data-role="tagsinput">
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