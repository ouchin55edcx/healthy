<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>
    <form action="#" method="post">
        @csrf
    
        <div class="bg-white border rounded-lg shadow-lg p-8 max-w-md mx-auto mt-8">
            <h1 class="font-bold text-3xl mb-4 text-center text-blue-600">Medical Certificate</h1>
            <hr class="mb-4 border-t-2 border-blue-600">
            <div class="mb-6">
                <h2 class="text-lg font-bold mb-2">Certificate Details</h2>
                <div class="flex justify-between text-gray-700">
                    <div>Date: {{ now()->format('m/d/Y') }}</div>
                    <div>Certificate #: CERT12345</div>
                </div>
            </div>
            <div class="mb-8">
                <h2 class="text-lg font-bold mb-2">Doctor Information:</h2>
                <div class="text-gray-700 mb-2">Doctor: #</div>
                <div class="text-gray-700 mb-2">Specialty: #</div>
            </div>
            <div class="mb-8">
                <h2 class="text-lg font-bold mb-2">Patient Information:</h2>
                <div class="text-gray-700 mb-2">Patient: #</div>
            </div>
            <div class="table w-full mb-8">
                <thead>
                    <tr>
                        <th class="text-left font-bold text-gray-700">Description</th>
                        <th class="text-right font-bold text-gray-700">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Number of Days Input -->
                    <tr>
                        <td class="text-left text-gray-700">Number of Days</td>
                        <td class="text-right">
                            <input type="number" name="number_of_days" class="border rounded-md px-3 py-2 w-full"
                                placeholder="Enter number of days" />
                        </td>
                    </tr>
                </tbody>
            </div>
            <div class="text-gray-700 mb-4">This certificate is issued to acknowledge the medical services provided.</div>
            <div class="text-gray-700 text-sm">Thank you for choosing our medical services.</div>
    
            <!-- Print Certificate Button -->
            <div class="flex justify-end mt-4">
                <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Send Certificate
                </button>
            </div>
        </div>
    </form>


</x-app-layout>
