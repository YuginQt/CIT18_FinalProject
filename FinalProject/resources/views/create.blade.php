@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-5">
        <h1 class="text-2xl font-bold">Add New Patient</h1>

        <form action="{{ route('patients.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block">Name:</label>
                <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="age" class="block">Age:</label>
                <input type="number" name="age" id="age" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="gender" class="block">Gender:</label>
                <select name="gender" id="gender" class="w-full px-3 py-2 border rounded" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="contact_info" class="block">Contact Info:</label>
                <input type="text" name="contact_info" id="contact_info" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="medical_history" class="block">Medical History:</label>
                <textarea name="medical_history" id="medical_history" class="w-full px-3 py-2 border rounded" required></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Save Patient</button>
        </form>
    </div>
@endsection
