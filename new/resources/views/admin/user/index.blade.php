@extends('admin.layout.app')
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Create</a><br>
    </div>
    <div class="col-md-12">
        <h3 class="well"> User List</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>User Phone</th>
                        <th>User Email</th>
                        <th>User Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>
                            {{ $loop->index+1 }}
                        </td>

                        <td>{{ $item->name }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @foreach($item->roles as $role)
                            {{$role->name}}
                            @endforeach
                        </td>
                        
                        <td>
        
                            <a class="btn btn-success btn-sm" href="{{ route('admin.users.edit',$item->id) }}">Edit</a><br>

                            <form action="{{ route('admin.users.destroy' , $item->id)}}" method="POST">
                                <input name="_method" type="hidden" value="DELETE">
                                {{ csrf_field() }}

                                <input type="submit" value="delete" class="btn btn-sm btn-danger">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
