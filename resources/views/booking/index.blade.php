<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg max-w-7xl mx-auto">
            <div class="flex items-center justify-between">
                <form action="{{ route('booking.index') }}" method="GET" class="flex gap-4 items-center justify-normal">
                    @csrf
                    <div class="flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                        <label for="textInputDefault" class="w-fit pl-0.5 text-sm text-black">Initial Date</label>
                        <input id="textInputDefault" type="date"
                            class="w-52 text-black rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
                            name="initial_date" value="{{ request('initial_date') }}" />
                    </div>
                    <div class="flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                        <label for="textInputDefault" class="w-fit pl-0.5 text-sm text-black">Date</label>
                        <input id="textInputDefault" type="date"
                            class="w-52 text-black rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
                            name="end_date" value="{{ request('end_date') }}" />
                    </div>
                    <button type="submit"
                        class="px-10 cursor-pointer py-2 rounded-lg text-sm font-semibold text-white bg-blue-500 mt-[21px]">Filter</button>
                </form>
                <form action="{{ route('booking.index') }}" method="GET" class="flex gap-4">
                    @csrf
                    <div class="relative flex w-full max-w-lg flex-col gap-1 text-neutral-600 mt-[21px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" aria-hidden="true"
                            class="absolute left-2.5 top-0 size-5 -translate-y-1/2 text-neutral-600/50 mt-[21px]">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                        <input type="search"
                            class="w-80 rounded-md border border-neutral-300 bg-neutral-50 py-2 pl-10 pr-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 text-black"
                            name="search" placeholder="Search" aria-label="search" value="{{ request('search') }}" />
                    </div>
                    <a href="{{ route('booking.index') }}"
                        class="px-10 cursor-pointer py-2 rounded-lg text-sm font-semibold text-white bg-slate-400 mt-[21px]">Refresh</a>
                </form>
            </div>
            <div class="my-6"></div>
            <div class="mx-auto overflow-hidden max-w-7xl overflow-x-auto rounded-md border border-neutral-300">
                <table class="w-full text-left text-sm text-neutral-600">
                    <thead class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900">
                        <tr class="text-center">
                            <th scope="col" class="p-4">#</th>
                            <th scope="col" class="p-4">Name</th>
                            <th scope="col" class="p-4">Email</th>
                            <th scope="col" class="p-4">Phone</th>
                            <th scope="col" class="p-4">Room</th>
                            <th scope="col" class="p-4">Number of room</th>
                            <th scope="col" class="p-4">Check-in</th>
                            <th scope="col" class="p-4">Check-out</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-300">
                        @if ($bookings->isEmpty())
                            <td class="text-center py-4 text-lg" colspan="8">Boking data is empty!</td>
                        @endif
                        @foreach ($bookings as $booking)
                            <tr class="even:bg-black/5 hover:bg-black/10 transition duration-500 text-center">
                                <td class="p-4">{{ $loop->iteration }}</td>
                                <td class="p-4">{{ $booking->visitor_name }}</td>
                                <td class="p-4">{{ $booking->user->email }}</td>
                                <td class="p-4">{{ $booking->phone }}</td>
                                <td class="p-4">{{ $booking->room->name }}</td>
                                <td class="p-4">{{ $booking->number_of_rooms }}</td>
                                <td class="p-4">{{ $booking->check_in }}</td>
                                <td class="p-4">{{ $booking->check_out }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $bookings->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
