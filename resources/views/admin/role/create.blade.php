@extends('admin.layout.app')
@section('admin_content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h3 class="well"> Roll Create</h3>
        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf
            <div class="form-group col-md-12">
                <label class="form-label">Role Name<span style="color:red">*</span></label>
                <input value="{{ old('name') }}" name="name" type="text" class="form-control" placeholder="Enter Name" required>
                <div class="clearfix"></div>
            </div><hr>

            <div class="col-md-12">
                <h5 class="font-weight-bold py-3 mb-0">Assign Permission</h5>

                <div class="form-group col-md-12">
                    <div class="checkbox">
                      <label><input type="checkbox" value="1" id="all_select">  All</label>
                    </div>
                </div>

                <table class="table table-striped table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>

                    @foreach($permissions as $item)
                    <tr>
                        <td><input type="checkbox" name="permission[]" value="{{$item->name}}"></td>
                        <td>{{$item->name}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>

            <div class="form-group col-md-12">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>

        </form>
    </div>
</div>
@push('js')
<script type="text/javascript">
    
    $('#all_select').click(function(){

        if($(this).is(':checked')){
            $('input[type=checkbox]').prop('checked',true);
        }else{
            $('input[type=checkbox]').prop('checked',false);
        }
    })
</script>
@endpush
@endsection
