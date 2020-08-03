@extends('layout.dashboard_app')

@section('content')
<section id="s_category" class="section section__category">
    <div class="section__header">
        <label class="title">Category List</label>
        <a href="" class="btn btn-sm btn-info btn-toggle" data-target="new">Add New</a>
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
            @foreach($categories as $key => $cat)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $cat -> name }}</td>
                    <td>
                        <a href="{{ URL::to('admin/edit/category/'.$cat -> id ) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ URL::to('admin/delete/category/'.$cat -> id ) }}" class="btn btn-sm btn-danger delete">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="add-new__wrapper section_toggle" id="section_new">
        <div class="title">Add Category</div>
        <form action="{{ route('admin.store.category') }}" method="POST">
            @csrf
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="name" placeholder="Enter Category">
                </div>
            </div><!-- col-4 -->

            <div class="form-layout-footer">
                <button type="submit" class="btn btn-info mg-r-5">Add Category</button>
                <button class="btn btn-secondary btn-toggle btn-cancel">Cancel</button>
            </div><!-- form-layout-footer -->
        </form>
    </div>

    <div class="add-new__wrapper section_toggle" id="section_edit">
        
    </div>
</section>
@endsection