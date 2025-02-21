<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Room') }}
        </h2>
    </x-slot>
    <div class="py-12">
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'receptionist')
            <div class="mx-auto overflow-hidden max-w-7xl overflow-x-auto rounded-md border border-neutral-300">
                <table class="w-full text-left text-sm text-neutral-600">
                    <thead class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900">
                        <tr class="text-center">
                            <th scope="col" class="p-4">#</th>
                            <th scope="col" class="p-4">Name</th>
                            <th scope="col" class="p-4">Type</th>
                            <th scope="col" class="p-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-300">
                        @foreach ($rooms as $room)
                            <tr class="even:bg-black/5 hover:bg-black/10 transition duration-500 text-center">
                                <td class="p-4">{{ $loop->iteration }}</td>
                                <td class="p-4">{{ $room->name }}</td>
                                <td class="p-4">{{ $room->roomType->name }}</td>
                                <td class="p-4 flex flex-row justify-center items-center gap-3">
                                    {{-- <button type="button"
                                        class="whitespace-nowrap rounded-md bg-blue-600 px-4 py-2 text-center text-sm font-medium tracking-wide text-white ansition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-info active:opacity-100 active:outline-offset-0 disabled:cursor-not-allowed disabled:opacity-75">Detail</button> --}}
                                    <a href="{{ route('room.edit', $room->id) }}"
                                        class="whitespace-nowrap rounded-md bg-yellow-400 px-4 py-2 text-center text-sm font-medium tracking-wide text-white transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-success active:opacity-100 active:outline-offset-0 disabled:cursor-not-allowed disabled:opacity-75">Edit</a>
                                    <button type="button"
                                        @click="roomId = {{ $room->id }}; $dispatch('open-modal', 'modal-delete-room')"
                                        class="whitespace-nowrap rounded-md bg-red-600 px-4 py-2 text-center text-sm font-medium tracking-wide text-white transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-danger active:opacity-100 active:outline-offset-0 disabled:cursor-not-allowed disabled:opacity-75">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="grid grid-cols-3 gap-4 max-w-7xl mx-auto">
                @foreach ($rooms as $room)
                    <div class="bg-[#E0A75E] rounded-lg">
                        <img src="{{ asset('assets/images/room-type/' . $room->roomType->image) }}" alt=""
                            class="h-[17rem] w-full bg-cover rounded-t-lg">
                        <div class="p-5">
                            <div class="">
                                <p class="font-bold text-xl">{{ $room->roomType->name }}</p>
                                <p>{{ $room->roomType->description }}</p>
                                <br>
                            </div>
                            <div class="">
                                <h1 class="font-semibold">Facilities:</h1>
                                <ul>
                                    @foreach (json_decode($room->roomFacilities->facilities) as $facility)
                                        <li>✔ {{ $facility }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    {{-- MODAL --}}
    <x-modal name="modal-add-room">
        <form class="p-6 w-full" action="{{ route('room.store') }}" method="POST">
            @csrf
            <h2 class="text-xl font-semibold py-2">Add Room</h2>
            <hr>
            <div class="py-5 flex flex-col gap-5">
                <div class="flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                    <label for="textInputDefault" class="w-fit pl-0.5 text-sm text-black">Name</label>
                    <input id="textInputDefault" type="text"
                        class="w-full text-black rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
                        name="name" placeholder="Enter room name" autocomplete="name" />
                </div>
                <div class="relative flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                    <label for="os" class="w-fit pl-0.5 text-sm text-black">Room Type</label>
                    <select id="os" name="room_type_id"
                        class="w-full text-black appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75">
                        <option selected>Select Room Type</option>
                        @foreach ($roomTypes as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="relative flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                    <label for="os" class="w-fit pl-0.5 text-sm text-black">Room Facility</label>
                    <select id="os" name="room_facilities_id"
                        class="w-full text-black appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75">
                        <option selected>Select Room Facility</option>
                        @foreach ($roomFacilities as $facility)
                            <option value="{{ $facility->id }}">{{ $facility->room_type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr>
            <div class="mt-4 text-end">
                <button x-on:click="$dispatch('close-modal', 'modal-add-room')"
                    class="px-4 py-2 bg-gray-500 text-white rounded">
                    Close
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-green-500 text-white rounded">
                    Send
                </button>
            </div>
        </form>
    </x-modal>
    <x-modal name="modal-delete-room">
        <div class="p-6 text-center">
            <h2 class="text-xl font-semibold py-2">Are you sure?</h2>
            <h4>You're going to delete the Room.</h4>
            <div class="mt-4 flex items-center justify-center">
                <button x-on:click="$dispatch('close-modal', 'modal-delete-room')"
                    class="px-10 py-2 bg-gray-400 text-white rounded">
                    Close
                </button>
                <div class="mx-3"></div>
                <button x-on:click="deleteRoom(roomId)" class="px-10 py-2 bg-red-500 text-white rounded">
                    Yes
                </button>
            </div>
        </div>
    </x-modal>
</x-app-layout>
