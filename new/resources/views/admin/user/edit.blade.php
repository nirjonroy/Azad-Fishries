@extends('admin.layout.app')
@section('admin_content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    <h3 class="well"> User Update</h3>
        <form action="{{ route('admin.users.update',$user->id) }}" method="POST">
            @csrf
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label>Name:</label>
                <input value="{{$user->name}}" type="text" class="form-control" name="name" placeholder="Enter Name..">
            </div>

             <div class="form-group">
                <label>Phone Number:</label>
                <input value="{{$user->phone}}" type="text" class="form-control" name="phone" placeholder="Enter Number..">
            </div>

            <div class="form-group">
                <label for="email">Email address:</label>
                <input value="{{$user->email}}" type="email" class="form-control" name="email" placeholder="Enter Email..">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" name="password" placeholder="Enter Password..">
            </div>

            <div class="form-group">
                <label for="pwd">Confirm Password:</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Conform Password..">
            </div>

            <div class="form-group">
                <label for="pwd">Role:</label>
                <select class="form-control" name="roles[]">
                <option value="">Select A Role</option>
                @foreach($roles as $role)
                <option value="{{$role->name}}" {{$user->hasRole($role->name)?'selected':''}}>{{$role->name}}</option>
                @endforeach
                </select>
            </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
