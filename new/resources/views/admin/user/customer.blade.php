@extends('admin.layout.app')
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="well"> Customer List</h3>
        <form>
            <input type="submit" name="button" value="excel" class="btn btn-sm btn-primary">
        </form>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>User Phone</th>
                        <th>User Email</th>
                        <th>Address</th>
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
                        <td>{{ $item->address }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p>{!! urldecode(str_replace("/?","?",$users->appends(Request::all())->render())) !!}</p>
    </div>
</div>
@endsection
