<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hotel Facilities') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-3 gap-4 max-w-7xl mx-auto">
            @foreach ($hotelFacilities as $hotelFacility)
                <img src="{{ asset('assets/images/hotel-facility/' . $hotelFacility->image) }}" alt=""
                    class="h-[17rem] w-full bg-cover rounded-t-lg">
            @endforeach
        </div>
    </div>
</x-app-layout>
