@extends('admin.layout.app')
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="well"> Roll List</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Rol Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $item)
                    <tr>
                        <td>
                            {{ $loop->index+1 }}
                        </td>

                        <td>
                            {{ $item->name }}
                        </td>
                        
                        <td style="display: flex;">
        
                            <a style="margin-right: 3px;" class="btn btn-success btn-sm" href="{{ route('admin.roles.edit',$item->id) }}">Edit</a><br>

                            <form {{$item->id == 1 ? 'hidden':''}} onclick="return confirm('Are you sure?');" action="{{ route('admin.roles.destroy' , $item->id)}}" method="POST">
                                <input name="_method" type="hidden" value="DELETE" >
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
