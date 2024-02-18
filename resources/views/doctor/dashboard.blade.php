<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="h-full w-full flex overflow-hidden antialiased text-gray-800 bg-white">

        <main class="flex-grow flex min-h-0 border-t">
            <!-- Medication and Appointments Section -->
            <div class="container mx-auto p-4">
                <!-- Appointments Section -->
                <div class="bg-white rounded-lg shadow p-4 mb-4">
                    <h2 class="text-2xl font-semibold mb-4">Appointments</h2>
                    <!-- Display user-selected appointment times -->
                    <ul class="list-disc pl-4">
                        <li class="text-gray-800">10:00 AM - John Doe</li>
                        <li class="text-gray-800">02:30 PM - Jane Smith</li>
                        <!-- Add more appointments dynamically based on user choices -->
                    </ul>
                </div>
                <!-- Medication List -->
                <div class="bg-white rounded-lg shadow p-4 mb-4">
                    <h2 class="text-2xl font-semibold mb-4">Medication List</h2>
                    <!-- Add new medication form -->
                    <form action="#" method="post" class="mt-4">
                        @csrf
                        <input type="text" name="newMedicament" placeholder="Medication name"
                            class="w-full p-2 border rounded">
                        <button type="submit" class="my-2 text-white px-4 py-2 rounded bg-red-500">Add
                            Medication</button>
                    </form>

                    <!-- Medication Table -->
                    <table class="min-w-full border rounded">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="py-2 px-4 border-b">Medication Name</th>
                                <th class="py-2 px-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($medicaments as $medicament)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $medicament->medicamentName }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('medicaments.edit', ['id' => $medicament->id]) }}"
                                            class="text-blue-500 hover:underline mr-2">Edit</a>
                                        <form action="{{ route('medicaments.destroy', ['id' => $medicament->id]) }}"
                                            method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="py-2 px-4 border-b text-center">No medications available
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>


            <section class="flex flex-col p-4 w-full max-w-sm flex-none bg-gray-100 min-h-0 overflow-auto">
                <h1 class="font-semibold mb-3">
                    Patient History
                </h1>
                <ul>
                    @foreach ($appointments as $appointment)
                        <li>
                            <article tabindex="0"
                                class="cursor-pointer border rounded-md p-3 bg-white flex text-gray-700 mb-2 hover:border-green-500 focus:outline-none focus:border-green-500">
                                <span class="flex-none pt-1 pr-2">
                                    <img class="h-8 w-8 rounded-md"
                                        src="https://raw.githubusercontent.com/bluebrown/tailwind-zendesk-clone/master/public/assets/avatar.png" />
                                </span>
                                <div class="flex-1">
                                    <header class="mb-1">
                                        {{ $appointment->patient->name }}
                                        <span class="font-semibold">booked an appointment</span>
                                        <h1 class="inline">with you.</h1>
                                    </header>
                                    <p class="text-gray-600">
                                        Date: {{ $appointment->appointment_date }}<br>
                                        Hour: {{ $appointment->start_time }} - {{ $appointment->end_time }}
                                    </p>
                                    <footer class="text-gray-500 mt-2 text-sm">
                                        Created at: {{ $appointment->created_at->format('l H:i') }}
                                    </footer>

                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2"
                                        onclick="showCertificatePopup()">
                                        Generate Certificate
                                    </button>

                                </div>
                                <!-- Popup HTML -->
                                <div id="certificatePopup" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 hidden">
                                    <form
                                    action="{{ route('generate-certificate', ['patientId' => $appointment->patient_id, 'doctorId' => $appointment->doctor_id]) }}"
                                        method="post">
                                        @csrf
                                        <div class="bg-white border rounded-lg shadow-lg p-8 max-w-md mx-auto mt-8">
                                            <h1 class="font-bold text-3xl mb-4 text-center text-blue-600">Medical
                                                Certificate</h1>
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
                                                            <input type="number" name="number_of_days"
                                                                class="border rounded-md px-3 py-2 w-full"
                                                                placeholder="Enter number of days" />
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </div>
                                            <div class="text-gray-700 mb-4">This certificate is issued to acknowledge
                                                the medical services provided.</div>
                                            <div class="text-gray-700 text-sm">Thank you for choosing our medical
                                                services.</div>

                                            <!-- Print Certificate Button -->
                                            <div class="flex justify-end mt-4">
                                                <button type="submit"
                                                    class="bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                                    Send Certificate
                                                </button>
                                                <!-- Cancel button -->
                                                <button onclick="hideCertificatePopup()"
                                                    class="text-blue-500 hover:underline mt-4">Cancel</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
    </div>
    </div>
    </article>
    </li>
    @endforeach
    </ul>
    </section>
    </main>
    </div>

</x-app-layout>

<script>
    function showCertificatePopup() {
        // Show the certificate popup
        const popup = document.getElementById('certificatePopup');
        popup.classList.remove('hidden');
    }

    function hideCertificatePopup() {
        // Hide the certificate popup
        const popup = document.getElementById('certificatePopup');
        popup.classList.add('hidden');
    }
</script>
