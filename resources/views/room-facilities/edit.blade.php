<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Room Facility') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <form class="p-6 max-w-3xl mx-auto" action="{{ route('facilities.room.update', $roomFacility->id) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="py-5 flex flex-col gap-5">
                        <div class="flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                            <label for="textInputDefault" class="w-fit pl-0.5 text-sm text-black">Type Name</label>
                            <input id="textInputDefault" type="text"
                                class="w-full text-black rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
                                name="room_Type" placeholder="Enter room type name" autocomplete="room_type"
                                value="{{ $roomFacility->room_type }}" />
                        </div>
                        <div class="flex w-full flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                            <label for="textArea" class="w-fit pl-0.5 text-sm text-black">Description</label>
                            <textarea id="textArea" name="facilities"
                                class="w-full rounded-md border text-black border-neutral-300 bg-neutral-50 px-2.5 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
                                rows="3" placeholder="Write description here...">{{ implode("\n", json_decode($roomFacility->facilities, true)) }}</textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="mt-4 text-end">
                        <button href="{{ redirect(route('facilities.room.index')) }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded">
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
