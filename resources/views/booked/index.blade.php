<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booked Room') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if ($bookedRooms->isEmpty())
                <div
                    class="p-6 bg-white shadow-lg rounded-xl border border-gray-200 text-center flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-16 h-16 text-gray-400 mb-3">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12h6m-3 3V9m12 3c0 6.627-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0s12 5.373 12 12z" />
                    </svg>
                    <p class="text-gray-700 text-lg font-medium">No bookings available</p>
                    <p class="text-gray-500 text-sm">Please booking first back later.</p>
                </div>
            @else
                @foreach ($bookedRooms as $bookedRoom)
                    <div
                        class="p-6 bg-white shadow-lg rounded-xl grid grid-cols-3 sm:flex-row justify-between items-start sm:items-center gap-4 border border-gray-200">
                        <!-- Visitor Info -->
                        <div>
                            <p class="text-lg font-semibold text-gray-800">{{ $bookedRoom->visitor_name }}</p>
                            <p class="text-sm text-gray-600">{{ $bookedRoom->user->email }}</p>
                            <p class="text-sm text-gray-600">{{ $bookedRoom->phone }}</p>
                        </div>

                        <!-- Room Info -->
                        <div class="text-gray-700">
                            <p class="font-medium">Room : {{ $bookedRoom->room->name }}</p>
                            <p class="text-sm text-gray-500">Type Room : {{ $bookedRoom->room->roomType->name }}</p>
                            <p class="text-sm text-gray-500">{{ $bookedRoom->check_in }} - {{ $bookedRoom->check_out }}
                            </p>
                        </div>

                        <!-- Action Button -->
                        <div class="text-end">
                            <a href="{{ route('cetak.struk', $bookedRoom->id) }}"
                                class="px-5 py-2 text-white bg-green-500 rounded-lg shadow-md transition duration-300 hover:bg-green-600 hover:shadow-lg">
                                Cetak Struk
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
