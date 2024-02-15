@extends('layouts.navbar')

@section('content')
    <section class="bg-white dark:bg-gray-900 "
        style="background-image: url('storage/images/dest.png'); background-size: cover; object-fit: cover; width: 100%;  ">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                We invest in the world’s potential</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Here at
                Flowbite we focus on markets where technology, innovation, and capital can unlock long-term value and drive
                economic growth.</p>
            <a href="{{ route('patient.urgent-appointment') }}"
                class="hover:bg-blue-700 bg-white text-amber-500 font-bold py-2 px-10 m-4 rounded-full  transition duration-200">Make
                an Appointment
            </a>
        </div>
    </section>
    <div class="flex gap-12 w-full  max-w-2xl mx-auto m-5">

        <div class="flex gap-12 w-full max-w-2xl mx-auto m-5">
            <form action="#" method="post"
                class="flex flex-auto justify-evenly border rounded-md w-full dark:border-gray-600/60 dark:text-white">
                @csrf
                <select name="destination" id="destination"
                    class="focus:bg-blue-600 border-none px-2 py-1 rounded-md w-full text-black">
                    <option value="all">select destination</option>
                </select>
                <button type="submit"
                    class="focus:bg-blue-600 border-none px-2 py-1 rounded-md w-full text-white bg-blue-500">Search</button>
            </form>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($doctors as $doctor)
            <div class="max-w-xs mx-auto bg-white shadow-md rounded-lg overflow-hidden">
                <a href="{{ route('patient.doctorProfile', ['id' => $doctor->id]) }}">
                    <img class="h-32 w-auto object-cover rounded-full" src="{{ $doctor->image }}" alt="Doctor Image">
                </a>
                <div class="px-4 py-3 text-center">
                    <a href="{{ route('patient.doctorProfile', ['id' => $doctor->id]) }}">
                        <h3 class="text-gray-900 font-semibold text-lg mb-1 tracking-tight">{{ $doctor->name }}</h3>
                    </a>
                    <p class="text-gray-600 text-sm mb-2">Specialty: {{ $doctor->speciality->specialtyName }}</p>
                    <div class="flex items-center mb-2">
                        <!-- Star Ratings -->
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <!-- Repeat the star rating SVGs for additional stars -->
                        <span class="text-yellow-400 text-xs font-semibold ml-1">5.0</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-lg font-bold text-gray-900">$599</span>
                        <button onclick="addToFavorites('doctor1')"
                            class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200 rounded-md text-xs px-3 py-1.5">Add
                            to Favorites</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
