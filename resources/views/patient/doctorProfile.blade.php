@extends('layouts.navbar')

@section('content')
    <section class="container mx-auto mt-8 flex">
        <div class="w-1/3 pr-8">
            <!-- Doctor Image -->
            <img src="{{ $doctor->image }}" alt="Dr. John Doe" class="w-60 h-auto rounded-full border-2 border-blue-500">
        </div>
        <div class="w-2/3 items-center mt-12 ">
            <!-- Doctor Details -->
            <h2 class="text-3xl font-semibold mb-4">{{ $doctor->name }}</h2>
            <p class="text-gray-700">
                {{ $doctor->name }} is a dedicated and experienced professional in the field of
                {{ $doctor->speciality->specialtyName }}. With 5
                years of experience, Dr. Doe has been providing top-notch medical care to patients. Lorem ipsum dolor
                sit amet, consectetur adipiscing elit.
            </p>
        </div>
    </section>
    <section class="container mx-auto mt-8">
        <!-- Appointment Times Section -->
        <h2 class="text-3xl font-semibold mb-4">Appointment Times</h2>
        <div class="bg-white p-4 rounded-md shadow-md">
            <!-- Display available appointment times with booking status -->
            <div class="grid grid-cols-2 gap-4 ">
                <a href="#" class="border p-4 text-center bg-red-500">
                    <p class="text-xl font-semibold">9:00 - 10:00</p>
                    <p class="text-white">Booked</p>
                </a>

                <a href="#" class="border p-4 text-center bg-green-500">
                    <p class="text-xl font-semibold">10:00 - 12:00</p>
                    <p class="text-white">Available</p>
                </a>

                <a href="#" class="border p-4 text-center bg-green-500">
                    <p class="text-xl font-semibold">14:00 - 16:00</p>
                    <p class="text-white">Available</p>
                </a>

                <a href="#" class="border p-4 text-center bg-green-500">
                    <p class="text-xl font-semibold">16:00 - 18:00</p>
                    <p class="text-white">Available</p>
                </a>
            </div>
        </div>

    </section>

    <section class="container mx-auto m-8">
        <!-- Patient Comments Section -->
        <h2 class="text-3xl font-semibold mb-4">Patient Reviews</h2>
        <div class="bg-white p-4 rounded-md shadow-md">
            <!-- Add a form for patients to write comments -->
            <form action="{{ route('comment.store') }}" method="post">
                @csrf
                <input type="hidden" value="{{$doctor->id}}" name="doctor_id">
                <label for="comment" class="block text-sm font-medium text-gray-700">Share your experience:</label>
                <textarea id="comment" name="comment" rows="4" class="mt-1 p-2 block w-full border border-gray-300 rounded-md bg-white shadow-sm focus:outline-none focus:border-sky-500 focus:ring focus:ring-sky-200"></textarea>
        
                <div class="flex items-center mt-2">
                    <span class="mr-2 text-gray-700">Rate:</span>
                    <div id="starRating" class="flex">
                        <!-- Star rating component here -->
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="cursor-pointer text-yellow-400 text-2xl" onclick="setRating({{ $i }})">★</span>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="rating" value="1">
                </div>
        
                <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">Submit Review</button>
            </form>

            <!-- Display existing reviews -->
            <div>
                <h3 class="text-2xl font-semibold mb-2">What our patients are saying:</h3>
                <!-- Display reviews dynamically (replace with actual data) -->
                <div class="border-t border-gray-300 pt-2">
                    <p class="text-gray-700">"Great doctor! Highly recommended."</p>
                    <div class="flex items-center">
                        <p class="text-gray-500 text-sm mr-2">- Patient1</p>
                    </div>
                </div>
                <div class="border-t border-gray-300 pt-2">
                    <p class="text-gray-700">"Dr. Doe is very caring and knowledgeable."</p>
                    <div class="flex items-center">
                        <p class="text-gray-500 text-sm mr-2">- Patient2</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
