@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Company</div>
                <div class="card-body">
                    <form method="POST" action="{{route('company.store')}}">
                        <div class="form-group border-bottom">
                            <label>Name</label>
                            <input type="text" class="form-control" name="company_name" value="{{old('company_name')}}">
                            <small class="form-text text-muted">Name of company.</small>
                        </div>
                        <div class="form-group border-bottom">
                            <label>Address</label>
                            <input type="text" class="form-control" name="company_address" value="{{old('company_address')}}">
                            <small class="form-text text-muted">Address of company.</small>
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-primary">ADD COMPANY</button>
                    </form>
                </div>
            </div>
       </div>
   </div>
</div>
@endsection
