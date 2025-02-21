<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Room Type') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <form class="p-6 max-w-3xl mx-auto" action="{{ route('room-type.update', $roomType->id) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="py-5 flex flex-col gap-5">
                <div class="flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                    <label for="textInputDefault" class="w-fit pl-0.5 text-sm text-black">Name</label>
                    <input id="textInputDefault" type="text"
                        class="w-full text-black rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
                        name="name" placeholder="Enter room type name" autocomplete="name"
                        value="{{ $roomType->name }}" />
                </div>
                <img src="{{ asset('storage/' . $roomType->image) }}" alt="{{ $roomType->name }}" class="h-52 w-52">
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
                        rows="3" placeholder="Write description here...">{{ $roomType->description }}</textarea>
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
</x-app-layout>
