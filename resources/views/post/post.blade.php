@extends('layout.dashboard_app')

@section('content')
<section id="s_category" class="section section__category">
    <div class="section__header">
        <label class="title">Posts List</label>
        <a href="{{ route('add.post') }}" class="btn btn-sm btn-info">Add New</a>
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
                <!-- <th class="th-sm">Date Published
                </th> -->
                <th class="th-sm">Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $key => $post)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $post -> title }}</td>
                <td>{{ $post -> name}}</td>
                <td>
                    <a href="{{ URL::to('show/post/'.$post -> id) }}" class="btn btn-sm btn-info">Show</a>
                    <a href="{{ URL::to('edit/post/'.$post -> id) }}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{ URL::to('delete/post/'.$post -> id) }}" class="btn btn-sm btn-danger delete">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection