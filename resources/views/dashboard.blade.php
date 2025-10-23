@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Welcome, {{ auth()->user()->name }}!</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center">
            <h2 class="text-xl font-semibold mb-4">Upload Stocks</h2>
            <p class="text-gray-600 mb-4 text-center">Add your stock prices for analysis.</p>
            <a href="{{ route('upload') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded font-semibold transition">Upload</a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center">
            <h2 class="text-xl font-semibold mb-4">Top Performers</h2>
            <p class="text-gray-600 mb-4 text-center">View the top 5 performing stocks.</p>
            <a href="{{ route('top.performers') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded font-semibold transition">View</a>
        </div>
    </div>
</div>
@endsection
