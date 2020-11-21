@extends('layouts.app')

@section('title', 'All contacts')

@section('content')

<a href="{{ route('contacts.create') }}" class="btn btn-primary">Add Contact</a>

@if (session()->get('success'))
    <div class="alert alert-success mt-3">
        {{ session()->get('success') }}
    </div>
@endif

<table class="table table-striped mt-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Contact Name</th>
        <th scope="col">Phone Number</th>
        <th>Operations</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
            
            <tr>
                <th scope="row">{{ $contact->id }}</th>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->phone_number }}</td>
                <td class="table-buttons">
                    <a href="{{ route('contacts.show', $contact) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    <form action="{{ route('contacts.destroy', $contact) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection