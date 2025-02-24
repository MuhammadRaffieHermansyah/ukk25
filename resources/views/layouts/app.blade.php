<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div x-data="main()" class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    {{ $header }}
                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'receptionist')
                        @if (request()->routeIs('room.index'))
                            <button x-on:click="$dispatch('open-modal', 'modal-add-room')" type="button"
                                class="whitespace-nowrap rounded-md bg-green-600 px-4 py-2 text-center text-sm font-medium tracking-wide text-white ansition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-info active:opacity-100 active:outline-offset-0 disabled:cursor-not-allowed disabled:opacity-75">Add
                                Room</button>
                        @endif
                        @if (request()->routeIs('room-type.index'))
                            <button x-on:click="$dispatch('open-modal', 'modal-add-room-type')" type="button"
                                class="whitespace-nowrap rounded-md bg-green-600 px-4 py-2 text-center text-sm font-medium tracking-wide text-white ansition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-info active:opacity-100 active:outline-offset-0 disabled:cursor-not-allowed disabled:opacity-75">Add
                                Room Type</button>
                        @endif
                        @if (request()->routeIs('facilities.room.index'))
                            <button x-on:click="$dispatch('open-modal', 'modal-add-room-facilities')" type="button"
                                class="whitespace-nowrap rounded-md bg-green-600 px-4 py-2 text-center text-sm font-medium tracking-wide text-white ansition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-info active:opacity-100 active:outline-offset-0 disabled:cursor-not-allowed disabled:opacity-75">Add
                                Room Facilities</button>
                        @endif
                        @if (request()->routeIs('facilities.hotel.index'))
                            <button x-on:click="$dispatch('open-modal', 'modal-add-hotel-facilities')" type="button"
                                class="whitespace-nowrap rounded-md bg-green-600 px-4 py-2 text-center text-sm font-medium tracking-wide text-white ansition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-info active:opacity-100 active:outline-offset-0 disabled:cursor-not-allowed disabled:opacity-75">Add
                                Hotel Facilities</button>
                        @endif
                    @endif

                </div>
            </header>
        @endisset

        @if (session()->has('success'))
            <div x-init="$nextTick(() => {
                $dispatch('notify', { variant: 'success', title: 'Success!', message: '{{ session()->get('success') }}' })
            })">
            </div>
        @endif

        @if (session()->has('error'))
            <div x-init="$nextTick(() => {
                $dispatch('notify', { variant: 'danger', title: 'Oops!', message: '{{ session()->get('error') }}' })
            })">
            </div>
        @endif


        <!-- Notifications -->
        <div x-data="{
            notifications: [],
            displayDuration: 8000,
            soundEffect: false,

            addNotification({ variant = 'info', sender = null, title = null, message = null }) {
                const id = Date.now()
                const notification = { id, variant, sender, title, message }

                // Keep only the most recent 20 notifications
                if (this.notifications.length >= 20) {
                    this.notifications.splice(0, this.notifications.length - 19)
                }

                // Add the new notification to the notifications stack
                this.notifications.push(notification)

                if (this.soundEffect) {
                    // Play the notification sound
                    const notificationSound = new Audio('https://res.cloudinary.com/ds8pgw1pf/video/upload/v1728571480/penguinui/component-assets/sounds/ding.mp3')
                    notificationSound.play().catch((error) => {
                        console.error('Error playing the sound:', error)
                    })
                }
            },
            removeNotification(id) {
                setTimeout(() => {
                    this.notifications = this.notifications.filter(
                        (notification) => notification.id !== id,
                    )
                }, 400);
            },
        }"
            x-on:notify.window="addNotification({
            variant: $event.detail.variant,
            sender: $event.detail.sender,
            title: $event.detail.title,
            message: $event.detail.message,
        })">

            <div x-on:mouseenter="$dispatch('pause-auto-dismiss')" x-on:mouseleave="$dispatch('resume-auto-dismiss')"
                class="group pointer-events-none fixed inset-x-8 top-0 z-99 flex max-w-full flex-col gap-2 bg-transparent px-6 py-6 md:bottom-0 md:left-[unset] md:right-0 md:top-[unset] md:max-w-sm">
                <template x-for="(notification, index) in notifications" x-bind:key="notification.id">
                    <!-- root div holds all of the notifications  -->
                    <div>
                        <!-- Success Notification  -->
                        <template x-if="notification.variant === 'success'">
                            <div x-data="{ isVisible: false, timeout: null }" x-cloak x-show="isVisible"
                                class="pointer-events-auto relative rounded-md border border-green-500 bg-white text-neutral-600"
                                role="alert" x-on:pause-auto-dismiss.window="clearTimeout(timeout)"
                                x-on:resume-auto-dismiss.window=" timeout = setTimeout(() => {(isVisible = false), removeNotification(notification.id) }, displayDuration)"
                                x-init="$nextTick(() => { isVisible = true }), (timeout = setTimeout(() => { isVisible = false, removeNotification(notification.id) }, displayDuration))" x-transition:enter="transition duration-300 ease-out"
                                x-transition:enter-end="translate-y-0" x-transition:enter-start="translate-y-8"
                                x-transition:leave="transition duration-300 ease-in"
                                x-transition:leave-end="-translate-x-24 opacity-0 md:translate-x-24"
                                x-transition:leave-start="translate-x-0 opacity-100">
                                <div
                                    class="flex w-full items-center gap-2.5 bg-green-500/10 rounded-md p-4 transition-all duration-300">

                                    <!-- Icon -->
                                    <div class="rounded-full bg-green-500/15 p-0.5 text-green-500" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="size-5" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>

                                    <!-- Title & Message -->
                                    <div class="flex flex-col gap-2">
                                        <h3 x-cloak x-show="notification.title"
                                            class="text-sm font-semibold text-green-500" x-text="notification.title">
                                        </h3>
                                        <p x-cloak x-show="notification.message" class="text-pretty text-sm"
                                            x-text="notification.message"></p>
                                    </div>

                                    <!--Dismiss Button -->
                                    <button type="button" class="ml-auto" aria-label="dismiss notification"
                                        x-on:click="(isVisible = false), removeNotification(notification.id)">
                                        <svg xmlns="http://www.w3.org/2000/svg viewBox="0 0 24 24 stroke="currentColor"
                                            fill="none" stroke-width="2" class="size-5 shrink-0" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </template>
                        <!-- Danger Notification  -->
                        <template x-if="notification.variant === 'danger'">
                            <div x-data="{ isVisible: false, timeout: null }" x-cloak x-show="isVisible"
                                class="pointer-events-auto relative rounded-md border border-red-500 bg-white text-neutral-600"
                                role="alert" x-on:pause-auto-dismiss.window="clearTimeout(timeout)"
                                x-on:resume-auto-dismiss.window=" timeout = setTimeout(() => {(isVisible = false), removeNotification(notification.id) }, displayDuration)"
                                x-init="$nextTick(() => { isVisible = true }), (timeout = setTimeout(() => { isVisible = false, removeNotification(notification.id) }, displayDuration))" x-transition:enter="transition duration-300 ease-out"
                                x-transition:enter-end="translate-y-0" x-transition:enter-start="translate-y-8"
                                x-transition:leave="transition duration-300 ease-in"
                                x-transition:leave-end="-translate-x-24 opacity-0 md:translate-x-24"
                                x-transition:leave-start="translate-x-0 opacity-100">
                                <div
                                    class="flex w-full items-center gap-2.5 bg-red-500/10 rounded-md p-4 transition-all duration-300">

                                    <!-- Icon -->
                                    <div class="rounded-full bg-red-500/15 p-0.5 text-red-500" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="size-5" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5Zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>

                                    <!-- Title & Message -->
                                    <div class="flex flex-col gap-2">
                                        <h3 x-cloak x-show="notification.title"
                                            class="text-sm font-semibold text-red-500" x-text="notification.title">
                                        </h3>
                                        <p x-cloak x-show="notification.message" class="text-pretty text-sm"
                                            x-text="notification.message"></p>
                                    </div>

                                    <!--Dismiss Button -->
                                    <button type="button" class="ml-auto" aria-label="dismiss notification"
                                        x-on:click="(isVisible = false), removeNotification(notification.id)">
                                        <svg xmlns="http://www.w3.org/2000/svg viewBox="0 0 24 24
                                            stroke="currentColor" fill="none" stroke-width="2"
                                            class="size-5 shrink-0" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </template>

                    </div>
                </template>
            </div>
        </div>
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        function captureStruk(id) {
            let element = document.getElementById(`struk-${id}`);

            html2canvas(element).then(canvas => {
                let link = document.createElement("a");
                link.href = canvas.toDataURL("image/png");
                link.download = `struk_${id}.png`;
                link.click();
            });
        }

        function main() {
            return {
                roomId: 0,
                roomTypeId: 0,
                roomFacilityId: 0,
                hotelFacilityId: 0,
                deleteRoom(roomId) {
                    if (!roomId) return;

                    fetch(`room/${roomId}`, {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    "content"),
                                "Content-Type": "application/json"
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                location.reload();
                            } else {
                                alert("Failed to delete room.");
                            }
                        })
                        .catch(error => console.error("Error:", error));
                },
                deleteRoomType(roomTypeId) {
                    if (!roomTypeId) return;

                    fetch(`room-type/${roomTypeId}`, {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    "content"),
                                "Content-Type": "application/json"
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                location.reload();
                            } else {
                                alert("Failed to delete room.");
                            }
                        })
                        .catch(error => console.error("Error:", error));
                },
                deleteRoomFacilities(roomFacilityId) {
                    if (!roomFacilityId) return;

                    fetch(`room/${roomFacilityId}`, {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    "content"),
                                "Content-Type": "application/json"
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                location.reload();
                            } else {
                                alert("Failed to delete room.");
                            }
                        })
                        .catch(error => console.error("Error:", error));
                },
                deleteHotelFacilities(hotelFacilitydI) {
                    if (!hotelFacilitydI) return;

                    fetch(`hotel/${hotelFacilitydI}`, {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    "content"),
                                "Content-Type": "application/json"
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                location.reload();
                            } else {
                                alert("Failed to delete room.");
                            }
                        })
                        .catch(error => console.error("Error:", error));
                }
            }
        }
    </script>
</body>

</html>
