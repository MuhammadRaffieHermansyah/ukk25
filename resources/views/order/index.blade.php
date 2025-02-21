<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order') }}
        </h2>
    </x-slot>

    @if (session()->has('success'))
        <div x-init="$nextTick(() => {
            $dispatch('notify', { variant: 'success', title: 'Success!', message: '{{ session()->get('success') }}' })
        })">
        </div>
    @endif
    <div x-on:mouseenter="$dispatch('pause-auto-dismiss')" x-on:mouseleave="$dispatch('resume-auto-dismiss')"
        class="group pointer-events-none fixed inset-x-8 top-0 z-[99] flex max-w-full flex-col gap-2 bg-transparent px-6 py-6 md:bottom-0 md:left-[unset] md:right-0 md:top-[unset] md:max-w-sm">
        <template x-for="(notification, index) in notifications" x-bind:key="notification.id">
            <div>
                <template x-if="notification.variant === 'success'">
                    <div x-data="{ isVisible: false, timeout: null }" x-cloak x-show="isVisible"
                        class="pointer-events-auto relative rounded-md border border-green-500 bg-white text-neutral-600 dark:bg-neutral-950 dark:text-neutral-300"
                        role="alert" x-on:pause-auto-dismiss.window="clearTimeout(timeout)"
                        x-on:resume-auto-dismiss.window=" timeout = setTimeout(() => {(isVisible = false), removeNotification(notification.id) }, displayDuration)"
                        x-init="$nextTick(() => { isVisible = true }), (timeout = setTimeout(() => { isVisible = false, removeNotification(notification.id) }, displayDuration))" x-transition:enter="transition duration-300 ease-out"
                        x-transition:enter-end="translate-y-0" x-transition:enter-start="translate-y-8"
                        x-transition:leave="transition duration-300 ease-in"
                        x-transition:leave-end="-translate-x-24 opacity-0 md:translate-x-24"
                        x-transition:leave-start="translate-x-0 opacity-100">
                        <div
                            class="flex w-full items-center gap-2.5 bg-green-500/10 rounded-md p-4 transition-all duration-300">

                            <div class="flex flex-col gap-2">
                                <h3 x-cloak x-show="notification.title" class="text-sm font-semibold text-green-500"
                                    x-text="notification.title"></h3>
                                <p x-cloak x-show="notification.message" class="text-pretty text-sm"
                                    x-text="notification.message"></p>
                            </div>

                            <button type="button" class="ml-auto" aria-label="dismiss notification"
                                x-on:click="(isVisible = false), removeNotification(notification.id)">
                                <svg xmlns="http://www.w3.org/2000/svg viewBox="0 0 24 24 stroke="currentColor"
                                    fill="none" stroke-width="2" class="size-5 shrink-0" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </template>
            </div>
        </template>
    </div>
    <div class="-my-11"></div>
    <div class="py-12">
        <form class="p-6 max-w-4xl mx-auto" action="{{ route('order.store') }}" method="POST">
            @csrf
            <div class="py-5 flex flex-col gap-5">
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                        <label for="textInputDefault" class="w-fit pl-0.5 text-sm text-black">Visitor Name</label>
                        <input id="textInputDefault" type="text"
                            class="w-full text-black rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
                            name="visitor_name" placeholder="Enter visitor name" autocomplete="name" />
                    </div>
                    <div class="flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                        <label for="textInputDefault" class="w-fit pl-0.5 text-sm text-black">Phone number</label>
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
                    <div class="flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                        <label for="textInputDefault" class="w-fit pl-0.5 text-sm text-black">Check-In</label>
                        <input id="textInputDefault" type="date"
                            class="w-full text-black rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
                            name="check_in" />
                    </div>
                    <div class="flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                        <label for="textInputDefault" class="w-fit pl-0.5 text-sm text-black">Check-Out</label>
                        <input id="textInputDefault" type="date"
                            class="w-full text-black rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
                            name="check_out" />
                    </div>
                </div>
                <div class="relative flex w-full flex-col justify-stretch gap-1 text-neutral-600 dark:text-neutral-300">
                    <label for="os" class="w-fit pl-0.5 text-sm text-black">Room Type</label>
                    <select id="os" name="room_id"
                        class="w-full text-black appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75">
                        <option selected>Select Room</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name }} - Type : {{ $room->roomType->name }}
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
</x-app-layout>
