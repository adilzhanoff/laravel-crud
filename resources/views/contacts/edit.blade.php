@extends('layouts.app')

@section('title', 'Edit Contact #'.$contact->id)

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
            <form method="POST" action="{{ route('contacts.update', $contact) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label>Contact Name</label>
                    <input type="text" name="name" value="{{ $contact->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number" value="{{ $contact->phone_number }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Edit Contact</button>
            </form>
        </div>
    </div>
@endsection