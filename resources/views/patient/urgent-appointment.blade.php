@extends('layouts.navbar')

@section('content')
    <div class="flex gap-12 w-full  max-w-2xl mx-auto m-5">

        <div class="flex gap-12 w-full max-w-2xl mx-auto m-5">
            <p>Current Server Time: {{ date('Y-m-d H:i') }}</p>

            <form action="#" method="post"
                class="flex flex-auto justify-evenly border rounded-md w-full dark:border-gray-600/60 dark:text-white">
                @csrf
                <select name="destination" id="destination"
                    class="focus:bg-blue-600 border-none px-2 py-1 rounded-md w-full text-black">
                    @foreach ($specialties as $specialty)
                        <option>select destination</option>
                        <option value="{{ $specialty->id }}">{{ $specialty->specialtyName }}</option>
                    @endforeach
                </select>
                <button type="submit"
                    class="focus:bg-blue-600 border-none px-2 py-1 rounded-md w-full text-white bg-blue-500">Search</button>
            </form>
        </div>
    </div>
@endsection
