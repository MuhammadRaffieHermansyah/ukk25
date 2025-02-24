<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Room') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <form class="p-6 max-w-3xl mx-auto" action="{{ route('room.update', $room->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="py-5 flex flex-col gap-5">
                        <div class="flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                            <label for="textInputDefault" class="w-fit pl-0.5 text-sm text-black">Name</label>
                            <input id="textInputDefault" type="text"
                                class="w-full text-black rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
                                name="name" placeholder="Enter room name" autocomplete="name"
                                value="{{ $room->name }}" />
                        </div>
                        <div
                            class="relative flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                            <label for="os" class="w-fit pl-0.5 text-sm text-black">Room Type</label>
                            <select id="os" name="room_type_id"
                                class="w-full text-black appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75">
                                @foreach ($roomTypes as $type)
                                    <option {{ $room->room_type_id == $type->id ? 'selected' : '' }}
                                        value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div
                            class="relative flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                            <label for="os" class="w-fit pl-0.5 text-sm text-black">Room Facility</label>
                            <select id="os" name="room_facilities_id"
                                class="w-full text-black appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75">
                                @foreach ($roomFacilities as $facility)
                                    <option {{ $room->room_facilities_id == $facility->id ? 'selected' : '' }}
                                        value="{{ $facility->id }}">{{ $facility->room_type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="mt-4 text-end">
                        <button href="{{ redirect()->back() }}" class="px-4 py-2 bg-gray-500 text-white rounded">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">
                            Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
