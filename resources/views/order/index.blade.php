<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order') }}
        </h2>
    </x-slot>

    <div class="-my-11"></div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-5">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <form class="p-6 max-w-4xl mx-auto" action="{{ route('order.store') }}" method="POST">
                    @csrf
                    <div class="py-5 flex flex-col gap-5">
                        <div class="grid grid-cols-2 gap-4">
                            <div
                                class="flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                                <label for="textInputDefault" class="w-fit pl-0.5 text-sm text-black">Visitor
                                    Name</label>
                                <input id="textInputDefault" type="text"
                                    class="w-full text-black rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
                                    name="visitor_name" placeholder="Enter visitor name" autocomplete="name" />
                            </div>
                            <div
                                class="flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                                <label for="textInputDefault" class="w-fit pl-0.5 text-sm text-black">Phone
                                    number</label>
                                <input id="textInputDefault" type="number"
                                    class="w-full text-black rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
                                    name="phone" placeholder="Enter your phone number" />
                            </div>
                        </div>
                        <div class="flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                            <label for="textInputDefault" class="w-fit pl-0.5 text-sm text-black">Number of room</label>
                            <input id="textInputDefault" type="number"
                                class="w-full text-black rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
                                name="number_of_rooms" placeholder="how many rooms do you want to book?" />
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div
                                class="flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                                <label for="textInputDefault" class="w-fit pl-0.5 text-sm text-black">Check-In</label>
                                <input id="textInputDefault" type="date" min="{{ date('Y-m-d') }}"
                                    class="w-full text-black rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
                                    name="check_in" />
                            </div>
                            <div
                                class="flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                                <label for="textInputDefault" class="w-fit pl-0.5 text-sm text-black">Check-Out</label>
                                <input id="textInputDefault" type="date" min="{{ date('Y-m-d') }}"
                                    class="w-full text-black rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
                                    name="check_out" />
                            </div>
                        </div>
                        <div
                            class="relative flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                            <label for="os" class="w-fit pl-0.5 text-sm text-black">Room Type</label>
                            <select id="os" name="room_type_id"
                                class="w-full text-black appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75">
                                <option selected>Select Type</option>
                                @foreach ($roomTypes as $roomType)
                                    <option value="{{ $roomType->id }}">
                                        {{ $roomType->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="mt-4 text-end">
                        <button href="{{ redirect()->back() }}" class="px-4 py-2 bg-gray-500 text-white rounded">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-green-400 text-white rounded">
                            Booking
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
