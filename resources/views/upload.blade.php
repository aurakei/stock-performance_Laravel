@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Upload Stock Prices</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('upload.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700 font-medium mb-2" for="file">CSV File</label>
            <input type="file" name="csv" id="csv" accept=".csv" class="block w-full text-gray-700 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div class="flex justify-center">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded font-semibold hover:bg-blue-600 transition duration-300">
                Upload
            </button>
        </div>
    </form>

    <div class="text-center mt-6">
        <a href="{{ route('top.performers') }}" class="text-blue-500 hover:underline">View Top Performers</a>
    </div>
</div>
@endsection
