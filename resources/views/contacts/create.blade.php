@extends('layouts.app')

@section('title', 'Add a Contact')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('contacts.store') }}">
                @csrf
                <div class="form-group">
                    <label>Contact Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number" value="{{ old('phone_number') }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Add Contact</button>
            </form>
        </div>
    </div>
@endsection