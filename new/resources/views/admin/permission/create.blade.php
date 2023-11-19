@extends('admin.layout.app')
@section('admin_content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h3 class="well"> Permission Create</h3>
        <form action="{{ route('admin.permissions.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Permission Name<span style="color:red">*</span></label>
                <input value="{{ old('name') }}" name="name" type="text" class="form-control" placeholder="Enter Name" required>
                @if($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                @endif
        
                <div class="clearfix"></div>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
</div>

@push('js')

@endpush
@endsection
