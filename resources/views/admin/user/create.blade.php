@extends('admin.layout.app')
@section('admin_content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    <h3 class="well"> User Update</h3>
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Name:</label>
                        <input value="{{old('name')}}" type="text" class="form-control" name="name" placeholder="Enter Name..">
                        @if($errors->has('name'))
                            <div class="error">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-md-8">
                <div class="form-group">
                    <label>Phone Number:</label>
                    <input value="{{old('phone')}}" type="text" class="form-control" name="phone" placeholder="Enter Number..">
                    @if($errors->has('phone'))
                        <div class="error">{{ $errors->first('phone') }}</div>
                    @endif
                </div>
                </div>

                <div class="col-md-8">
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input value="{{old('email')}}" type="email" class="form-control" name="email" placeholder="Enter Email..">
                    @if($errors->has('email'))
                        <div class="error">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                </div>

                <div class="col-md-8">
                <div class="form-group">
                    <label for="email">Present Address:</label>
                    <textarea placeholder="address" name="address" class="form-control">{{old('email')}}</textarea>
                    @if($errors->has('address'))
                        <div class="error">{{ $errors->first('address') }}</div>
                    @endif
                </div>
                </div>


                <div class="col-md-8">
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password..">
                    @if($errors->has('password'))
                        <div class="error">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                </div>

                <div class="col-md-8">
                <div class="form-group">
                    <label for="pwd">Confirm Password:</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Conform Password..">
                </div>
                </div>

                <div class="col-md-8">
                <div class="form-group">
                    <label for="pwd">Role:</label>
                    <select class="form-control" name="roles[]">
                    <option value="">Select A Role</option>
                    @foreach($roles as $role)
                    <option value="{{$role->name}}">{{$role->name}}</option>
                    @endforeach
                    </select>
                </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('js')

@endpush
@endsection
