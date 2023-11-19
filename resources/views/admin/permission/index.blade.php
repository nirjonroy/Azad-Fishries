@extends('admin.layout.app')
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Create</a><br>
    </div>
    <div class="col-md-12">
        <h3 class="well"> Permission List</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Permission Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rows as $item)
                    <tr>
                        <td>
                            {{ $loop->index+1 }}
                        </td>

                        <td>
                            {{ $item->name }}
                        </td>
                        
                        <td>
        
                            <a class="btn btn-success btn-sm" href="{{ route('admin.permissions.edit',$item->id) }}"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
