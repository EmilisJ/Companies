@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Customer</div>
                <div class="card-body">
                    <form method="POST" action="{{route('customer.store',[$customer])}}">
                        <div class="form-group border-bottom">
                            <label>Name</label>
                            <input type="text" class="form-control" name="customer_name" value="{{old('name', $customer->name)}}">
                            <small class="form-text text-muted">Name of customer.</small>
                        </div>
                        <div class="form-group border-bottom">
                            <label>Surname</label>
                            <input type="text" class="form-control" name="customer_surname" value="{{old('surname', $customer->surname)}}">
                            <small class="form-text text-muted">Surname of customer.</small>
                        </div>
                        <div class="form-group border-bottom">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="customer_phone" value="{{old('phone', $customer->phone)}}">
                            <small class="form-text text-muted">Phone of customer.</small>
                        </div>
                        <div class="form-group border-bottom">
                            <label>Email</label>
                            <input type="text" class="form-control" name="customer_email" value="{{old('email', $customer->email)}}">
                            <small class="form-text text-muted">Email of customer.</small>
                        </div>
                        <div class="border-bottom">
                            <select name="company_id" id="exampleFormControlSelect1" class="form-control">
                                @foreach ($companies as $company)
                                    <option value="{{$company->id}}" {{ old('company_id',$customer->company_id) == $company->id ? 'selected' : '' }}>{{$company->name}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Customers Company.</small>
                        </div>
                        <div class="form-group">
                            <label>Comment</label>
                            <textarea name="customer_comment" id="summernote">{{old('comment', $customer->comment)}}</textarea>
                            <small class="form-text text-muted">Important notes about customer.</small>
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-primary">EDIT CUSTOMER</button>
                    </form>
                </div>
           </div>
       </div>
   </div>
</div>
<script>
    $(document).ready(function(){
        $('#summernote').summernote();
    });
</script>
@endsection
