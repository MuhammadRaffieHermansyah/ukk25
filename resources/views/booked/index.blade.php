<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booked Room') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @foreach ($bookedRooms as $bookedRoom)
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex justify-between items-center">
                    <div class="">
                        <p>{{ $bookedRoom->visitor_name }}</p>
                        <p>{{ $bookedRoom->user->email }}</p>
                        <p>{{ $bookedRoom->phone }}</p>
                    </div>
                    <div class="">
                        <p>{{ $bookedRoom->room->name }}</p>
                        <p>{{ $bookedRoom->room->roomType->name }}</p>
                        <p>{{ $bookedRoom->check_in }} - {{ $bookedRoom->check_out }}</p>
                    </div>
                    <div class="group">
                        <button onclick="captureStruk({{ $bookedRoom->id }})"
                            class="px-4 py-2 border border-green-500 text-gray-700 rounded-md transition duration-500">
                            Cetak Struk
                        </button>
                        <div class="hidden" id="struk-{{ $bookedRoom->id }}">
                            aaaaaaaaaa
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
