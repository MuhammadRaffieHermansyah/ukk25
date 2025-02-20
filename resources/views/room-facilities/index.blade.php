<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Room Facilities') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto overflow-hidden max-w-7xl overflow-x-auto rounded-md border border-neutral-300">
            <table class="w-full text-left text-sm text-neutral-600">
                <thead class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900">
                    <tr class="text-center">
                        <th scope="col" class="p-4">#</th>
                        <th scope="col" class="p-4">Type</th>
                        <th scope="col" class="p-4">Facilities</th>
                        <th scope="col" class="p-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-300">
                    @foreach ($roomFacilities as $roomFacility)
                        <tr class="even:bg-black/5 hover:bg-black/10 transition duration-500 text-center">
                            <td class="p-4">{{ $loop->iteration }}</td>
                            <td class="p-4 w-[25%]">{{ $roomFacility->room_type }}</td>
                            <td class="p-4 text-start mx-auto">
                                <ul class="">
                                    @foreach (json_decode($roomFacility->facilities) as $facility)
                                        <li class="">✔ {{ $facility }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="p-4 flex flex-row justify-center items-center gap-3">
                                <button type="button"
                                    class="whitespace-nowrap rounded-md bg-blue-600 px-4 py-2 text-center text-sm font-medium tracking-wide text-white ansition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-info active:opacity-100 active:outline-offset-0 disabled:cursor-not-allowed disabled:opacity-75">Detail</button>
                                <button type="button"
                                    class="whitespace-nowrap rounded-md bg-yellow-600 px-4 py-2 text-center text-sm font-medium tracking-wide text-white transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-success active:opacity-100 active:outline-offset-0 disabled:cursor-not-allowed disabled:opacity-75">Edit</button>
                                <button type="button"
                                    class="whitespace-nowrap rounded-md bg-red-600 px-4 py-2 text-center text-sm font-medium tracking-wide text-white transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-danger active:opacity-100 active:outline-offset-0 disabled:cursor-not-allowed disabled:opacity-75">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- MODAL --}}
    <x-modal name="modal-add-room-facilities">
        <div class="p-6">
            <h2 class="text-lg font-semibold">Add Room Facilities</h2>
            <p class="mt-2 text-gray-600">Isi dari modal ini...</p>
            <div class="mt-4">
                <button x-on:click="$dispatch('close-modal', 'modal-add-room-facilities')"
                    class="px-4 py-2 bg-red-500 text-white rounded">
                    Close
                </button>
            </div>
        </div>
    </x-modal>
</x-app-layout>
