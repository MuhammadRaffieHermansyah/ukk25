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
    <div x-data="main()"
        x-on:notify.window="addNotification({
        variant: $event.detail.variant,
        sender: $event.detail.sender,
        title: $event.detail.title,
        message: $event.detail.message,
    })"
        class="min-h-screen bg-gray-100">
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

        notifications: [],
        displayDuration: 8000,
        soundEffect: false,

        addNotification({ variant = 'info', sender = null, title = null, message = null}) {
            const id = Date.now()
            const notification = { id, variant, sender, title, message }

            if (this.notifications.length >= 20) {
                this.notifications.splice(0, this.notifications.length - 19)
            }

            this.notifications.push(notification)

            if (this.soundEffect) {
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
