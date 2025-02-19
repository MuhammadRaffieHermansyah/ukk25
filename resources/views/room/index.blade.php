<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Room') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-3 gap-4 max-w-7xl mx-auto">
            @foreach ($rooms as $room)
                <div class="bg-[#E0A75E] rounded-lg">
                    <img src="{{ asset('assets/images/room-type/' . $room->roomFacilities->image) }}" alt=""
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
    </div>
</x-app-layout>
