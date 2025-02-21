<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hotel Facilities') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'receptionist')
            <div class="mx-auto overflow-hidden max-w-7xl overflow-x-auto rounded-md border border-neutral-300">
                <table class="w-full text-left text-sm text-neutral-600">
                    <thead class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900">
                        <tr class="text-center">
                            <th scope="col" class="p-4">#</th>
                            <th scope="col" class="p-4">Facility</th>
                            <th scope="col" class="p-4">Description</th>
                            <th scope="col" class="p-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-300">
                        @foreach ($hotelFacilities as $hotelFacility)
                            <tr class="even:bg-black/5 hover:bg-black/10 transition duration-500 text-center">
                                <td class="p-4">{{ $loop->iteration }}</td>
                                <td class="p-4 w-[25%]">{{ $hotelFacility->name }}</td>
                                <td class="p-4 text-start">{{ $hotelFacility->description }}</td>
                                <td class="p-4 flex flex-row justify-center items-center gap-3">
                                    {{-- <button type="button"
                                        class="whitespace-nowrap rounded-md bg-blue-600 px-4 py-2 text-center text-sm font-medium tracking-wide text-white ansition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-info active:opacity-100 active:outline-offset-0 disabled:cursor-not-allowed disabled:opacity-75">Detail</button> --}}
                                    <a href="{{ route('facilities.hotel.edit', $hotelFacility->id) }}"
                                        class="whitespace-nowrap rounded-md bg-yellow-400 px-4 py-2 text-center text-sm font-medium tracking-wide text-white transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-success active:opacity-100 active:outline-offset-0 disabled:cursor-not-allowed disabled:opacity-75">Edit</a>
                                    <button type="button"
                                        @click="hotelFacilityId = {{ $hotelFacility->id }}; $dispatch('open-modal', 'modal-delete-hotel-facility')"
                                        class="whitespace-nowrap rounded-md bg-red-600 px-4 py-2 text-center text-sm font-medium tracking-wide text-white transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-danger active:opacity-100 active:outline-offset-0 disabled:cursor-not-allowed disabled:opacity-75">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="grid grid-cols-3 gap-4 max-w-7xl mx-auto">
                @foreach ($hotelFacilities as $hotelFacility)
                    <img src="{{ asset('assets/images/hotel-facility/' . $hotelFacility->image) }}" alt=""
                        class="h-[17rem] w-full bg-cover rounded-t-lg">
                @endforeach
            </div>
        @endif
    </div>

    {{-- MODAL --}}
    <x-modal name="modal-add-hotel-facilities">
        <form class="p-6 w-full" action="{{ route('facilities.hotel.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <h2 class="text-xl font-semibold py-2">Add Hotel Facility</h2>
            <hr>
            <div class="py-5 flex flex-col gap-5">
                <div class="flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                    <label for="textInputDefault" class="w-fit pl-0.5 text-sm text-black">Facility</label>
                    <input id="textInputDefault" type="text"
                        class="w-full text-black rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
                        name="name" placeholder="Enter facility name" autocomplete="name" />
                </div>
                <div class="relative flex w-full flex-col gap-1">
                    <label class="w-fit pl-0.5 text-sm text-black " for="fileInput">Upload
                        image</label>
                    <input id="fileInput" type="file" name="image"
                        class="w-full overflow-clip rounded-md border border-neutral-300 bg-neutral-50/50 text-sm text-neutral-600 file:mr-4 file:border-none file:bg-neutral-50 file:px-4 file:py-2 file:font-medium file:text-neutral-900 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75" />
                </div>
                <div class="flex w-full flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                    <label for="textArea" class="w-fit pl-0.5 text-sm text-black">Description</label>
                    <textarea id="textArea" name="description"
                        class="w-full rounded-md border text-black border-neutral-300 bg-neutral-50 px-2.5 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
                        rows="3" placeholder="Write description here..."></textarea>
                </div>
            </div>
            <hr>
            <div class="mt-4 text-end">
                <button @click="$dispatch('close-modal', 'modal-add-hotel-facilities')"
                    class="px-4 py-2 bg-gray-500 text-white rounded">eb
                    Close
                </button>
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">
                    Send
                </button>
            </div>
        </form>
    </x-modal>
    <x-modal name="modal-delete-hotel-facility">
        <div class="p-6 text-center">
            <h2 class="text-xl font-semibold py-2">Are you sure?</h2>
            <h4>You're going to delete the Hotel Facility.</h4>
            <div class="mt-4 flex items-center justify-center">
                <button x-on:click="$dispatch('close-modal', 'modal-delete-hotel-facility')"
                    class="px-10 py-2 bg-gray-400 text-white rounded">
                    Close
                </button>
                <div class="mx-3"></div>
                <button x-on:click="deleteHotelFacilities(hotelFacilityId)"
                    class="px-10 py-2 bg-red-500 text-white rounded">
                    Yes
                </button>
            </div>
        </div>
    </x-modal>
</x-app-layout>
