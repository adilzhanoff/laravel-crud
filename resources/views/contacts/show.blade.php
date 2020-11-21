@extends('layouts.app')

@section('title', 'Contact #'.$contact->id)

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label>Contact Name</label>
                <input type="text" name="name" value="{{ $contact->name }}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" value="{{ $contact->phone_number }}" class="form-control" readonly>
            </div>
        </div>
    </div>
@endsection