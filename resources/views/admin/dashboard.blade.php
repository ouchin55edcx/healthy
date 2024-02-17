<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- statistic --}}
    <div class="p-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Medicament Statistics -->
            <div class="bg-white rounded-2xl shadow p-6">
                <div class="text-sm font-medium text-gray-700">
                    Medicament
                </div>
                <div class="text-3xl">
                    <!-- Display Total Medicament dynamically -->
                    Total Medicament
                </div>
            </div>

            <!-- Specialty Statistics -->
            <div class="bg-white rounded-2xl shadow p-6">
                <div class="text-sm font-medium text-gray-700">
                    Specialty
                </div>
                <div class="text-3xl">
                    <!-- Display Total Specialties dynamically -->
                    {{ $totlaSpeciality }}
                </div>
            </div>

            <!-- Users Statistics -->
            <div class="bg-white rounded-2xl shadow p-6">
                <div class="text-sm font-medium text-gray-700">
                    Users
                </div>
                <div class="text-3xl">
                    <!-- Display Total Users dynamically -->
                    Total Users
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col gap-10 m-8">
        {{-- {{ dd($specialties) }} --}}
        {{-- specialty  --}}
        <div class="card bg-white rounded shadow-lg p-8 w-full text-center rounded-2xl">
            <h2 class="text-2xl font-bold mb-4">Specialties</h2>

            <!-- Add New Specialty Section -->
            <form id="addSpecialtyForm" action="{{ route('addSpecialty') }}" method="POST" class="mb-4">
                @csrf
                <input type="text" name="newSpecialty" placeholder="New Specialty"
                    class="input px-4 py-2 border border-gray-300 rounded mr-2">
                <button class="button bg-blue-500 text-white hover:bg-blue-700 px-4 py-2 rounded">
                    Add New Specialty
                </button>
            </form>

            <!-- Displayed Specialties -->
            @foreach ($specialities as $specialty)
                <div x-data="{ showModal: false, editedSpecialty: '{{ $specialty->specialtyName }}' }">
                    <!-- Displayed Specialties -->
                    <div class="specialty mt-4 border-t border-gray-300 pt-4">
                        <div class="flex justify-between items-center">
                            <p class="text-lg font-semibold">{{ $specialty->specialtyName }}</p>
                            <div class="flex space-x-2">
                                <button @click="showModal = true"
                                    class="button bg-yellow-500 text-white hover:bg-yellow-700 px-3 py-1 rounded">
                                    Edit
                                </button>
                                <form action="{{ route('specialties.destroy', $specialty) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="button bg-red-500 text-white hover:bg-red-700 px-3 py-1 rounded">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div x-show="showModal" class="fixed inset-0 z-50 overflow-auto bg-smoke">
                        <div x-show="showModal" class="fixed inset-0 transition-opacity"
                            x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            @click="showModal = false"></div>

                        <div x-show="showModal" class="fixed inset-0 flex items-center justify-center">
                            <div x-show="showModal" class="fixed inset-0 flex items-center justify-center">
                                <div class="bg-white p-8 mx-4 rounded-lg max-w-md w-full">
                                    <h2 class="text-2xl font-bold mb-4">Edit Specialty</h2>
                                    <form action="{{ route('specialities.update', $specialty) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <input type="text" name="specialtyName" x-model="editedSpecialty"
                                            class="input border border-gray-300 rounded mb-4 w-full px-3 py-2">

                                        <div class="flex justify-end">
                                            <button @click="showModal = false"
                                                class="button bg-gray-500 text-white hover:bg-gray-700 px-3 py-1 rounded mr-2">
                                                Cancel
                                            </button>
                                            <button type="submit"
                                                class="button bg-blue-500 text-white hover:bg-blue-700 px-3 py-1 rounded">
                                                Update
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        {{-- medicaments --}}
        <div class="card bg-white rounded shadow-lg p-8 w-full text-center rounded-2xl">
            <h2 class="text-2xl font-bold mb-4">Medicament</h2>
            <!-- Add New Specialty Button -->
            <form action="{{ route('medicaments.store') }}" method="post">
                @csrf
                <label for="medicamentName">Medicament Name:</label>
                <input type="text" name="medicamentName" id="medicamentName" required>

                <label for="speciality_id">Speciality:</label>
                <select name="speciality_id" id="speciality_id" required>
                    @foreach ($specialities as $speciality)
                        <option value="{{ $speciality->id }}">{{ $speciality->specialtyName }}</option>
                    @endforeach
                </select>

                <button type="submit">Add Medicament</button>
            </form>
            <!-- Displayed Medicaments -->
            <div x-data="{ showModal: false, editedMedicament: 'MedicamentName', editedSpecialtyId: 1 }">
                <div class="medicament mt-4 border-t border-gray-300 pt-4">
                    <div class="flex justify-between items-center">
                        <p class="text-lg font-semibold" x-text="editedMedicament"></p>
                        <div class="flex space-x-2">
                            <button @click="showModal = true"
                                class="button bg-yellow-500 text-white hover:bg-yellow-700 px-3 py-1 rounded">
                                Edit
                            </button>
                            <form action="#" method="POST">
                                <!-- CSRF token goes here -->
                                <button type="submit"
                                    class="button bg-red-500 text-white hover:bg-red-700 px-3 py-1 rounded">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div x-show="showModal" class="fixed inset-0 z-50 overflow-auto bg-smoke">
                    <div x-show="showModal" class="fixed inset-0 transition-opacity"
                        x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                        @click="showModal = false">
                    </div>

                    <div x-show="showModal" class="fixed inset-0 flex items-center justify-center">
                        <div class="bg-white p-8 mx-4 rounded-lg max-w-md w-full">
                            <h2 class="text-2xl font-bold mb-4">Edit Medicament</h2>
                            <form action="#" method="POST">
                                <!-- CSRF token goes here -->
                                <input type="text" name="medicamentName" x-model="editedMedicament"
                                    class="input border border-gray-300 rounded mb-4 w-full px-3 py-2">

                                <div class="flex flex-col">
                                    <label for="editSpecialty"
                                        class="text-sm font-medium text-gray-700 mb-1">Specialty:</label>
                                    <select id="editSpecialty" name="editSpecialty" x-model="editedSpecialtyId"
                                        class="input border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                                        <!-- Dynamically populate options based on available specialties -->
                                        @foreach ($specialities as $specialty)
                                            <option value="{{ $specialty->id }}">{{ $specialty->specialtyName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex justify-end">
                                    <button @click="showModal = false"
                                        class="button bg-gray-500 text-white hover:bg-gray-700 px-3 py-1 rounded mr-2">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="button bg-blue-500 text-white hover:bg-blue-700 px-3 py-1 rounded">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</x-app-layout>

<script>
    function updateSpecialty() {
        console.log("Updating specialty:", this.editedSpecialty);
        this.showModal = false;
    }
</script>
