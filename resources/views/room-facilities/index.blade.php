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
                                {{-- <button type="button"
                                    class="whitespace-nowrap rounded-md bg-blue-600 px-4 py-2 text-center text-sm font-medium tracking-wide text-white ansition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-info active:opacity-100 active:outline-offset-0 disabled:cursor-not-allowed disabled:opacity-75">Detail</button> --}}
                                <a href="{{ route('facilities.room.edit', $roomFacility->id) }}"
                                    class="whitespace-nowrap rounded-md bg-yellow-400 px-4 py-2 text-center text-sm font-medium tracking-wide text-white transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-success active:opacity-100 active:outline-offset-0 disabled:cursor-not-allowed disabled:opacity-75">Edit</a>
                                <button type="button"
                                    @click="roomFacilityId = {{ $roomFacility->id }}; $dispatch('open-modal', 'modal-delete-room-facilities')"
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
        <form class="p-6 w-full" action="{{ route('facilities.room.store') }}" method="POST">
            @csrf
            <h2 class="text-xl font-semibold py-2">Add Room Facilities</h2>
            <hr>
            <div class="py-5 flex flex-col gap-5">
                <div class="flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                    <label for="textInputDefault" class="w-fit pl-0.5 text-sm text-black">Room Type</label>
                    <input id="textInputDefault" type="text"
                        class="w-full text-black rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
                        name="room_Type" placeholder="Enter type name" autocomplete="name" />
                </div>
                <div class="flex w-full flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                    <label for="textArea" class="w-fit pl-0.5 text-sm text-black">Description</label>
                    <textarea id="textArea" name="fasilities"
                        class="w-full rounded-md border text-black border-neutral-300 bg-neutral-50 px-2.5 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
                        rows="3" placeholder="Write description here..."></textarea>
                </div>
            </div>
            <hr>
            <div class="mt-4 text-end">
                <button @click="$dispatch('close-modal', 'modal-add-room-facilities')"
                    class="px-4 py-2 bg-gray-500 text-white rounded">
                    Close
                </button>
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">
                    Send
                </button>
            </div>
        </form>
    </x-modal>
    <x-modal name="modal-delete-room-facilities">
        <div class="p-6 text-center">
            <h2 class="text-xl font-semibold py-2">Are you sure?</h2>
            <h4>You're going to delete the Room Type.</h4>
            <div class="mt-4 flex items-center justify-center">
                <button x-on:click="$dispatch('close-modal', 'modal-delete-room-facilities')"
                    class="px-10 py-2 bg-gray-400 text-white rounded">
                    Close
                </button>
                <div class="mx-3"></div>
                <button x-on:click="deleteRoomFacilities(roomFacilityId)"
                    class="px-10 py-2 bg-red-500 text-white rounded">
                    Yes
                </button>
            </div>
        </div>
    </x-modal>
</x-app-layout>
