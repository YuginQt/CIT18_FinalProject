@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-5">
        <h1 class="text-2xl font-bold">Patients List</h1>
        <a href="{{ route('patients.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Add New Patient</a>
        <table class="table-auto mt-4 w-full">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Contact Info</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->age }}</td>
                        <td>{{ $patient->gender }}</td>
                        <td>{{ $patient->contact_info }}</td>
                        <td>
                            <a href="{{ route('patients.edit', $patient->id) }}" class="bg-yellow-500 text-white py-1 px-2 rounded">Edit</a>
                            <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
