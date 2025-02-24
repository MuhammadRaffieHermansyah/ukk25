<x-app-layout>
    <x-slot name="header" id="home">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hotel Prima') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="my-14"></div>
        {{-- Home --}}
        <div class="flex items-center justify-between max-w-5xl mx-auto rounded-md">
            <div class="">
                <div class="text-3xl font-extrabold">Hotel Prima</div>
                <div class="my-4"></div>
                <p><b>Welcome To, Hotel Prima</b>,
                    Hotel Prima offers a comfortable and elegant stay experience, suitable for business trips
                    or vacations. With modern rooms, complete facilities such as restaurants, swimming pools, and
                    fitness centers, as well as the best service from professional staff, we ensure your comfort during
                    your stay.
                    Strategically located near tourist destinations and shopping centers, Hotel Prima is the ideal
                    choice
                    for a classy and memorable stay experience. Enjoy the best comfort with us!</p>
                <div class="my-4"></div>
                <a href="{{ route('order.index') }}"
                    class="bg-[#8f5e1f] text-white px-6 py-2 rounded-md transition hover:bg-[#664111] duration-500">Booking
                    Now</a>
            </div>
            <div class="mx-7"></div>
            <img src="{{ asset('assets/images/Celebrant Hotel.jpg') }}" alt="" class="w-96 h-96 rounded-lg">
        </div>
        {{-- About --}}
        <br><br><br>
        <div class="max-w-6xl flex flex-col items-center mx-auto my-20 px-10 mb-30">
            <h1 class="font-extrabold text-3xl">About Us</h1>
            <div class="my-3"></div>
            <p class="text-justify">Welcome To,<b> Hotel Prima </b>, a place where innovation, quality, and
                customer satisfaction are top priorities. We are here to provide the best solutions in Accommodation
                problems,
                with a commitment to always provide professional, fast, and
                reliable services.

                Since its establishment, we have helped many customers in meeting their needs, by providing
                rooms that are not only of high quality but also in accordance with the times. We
                believe that every customer deserves the best service, which is why we always
                strive to provide a satisfying experience in every interaction.

                Our team consists of dedicated and experienced professionals in their fields. With
                an innovative approach and the latest technology, we continue to adapt to provide better
                service every day. We are also always open to input and suggestions from customers because your
                satisfaction is our main motivation to continue to grow.

                Join us and feel the difference! <b> Hotel Prima </b> is ready to be your trusted partner
                in Accommodation.</p>
        </div>
        <br>
        {{-- contact us --}}
        <div class="max-w-7xl flex flex-col items-center mx-auto my-20">
            <h1 class="font-extrabold text-3xl">Contact Us</h1>
            <p class="text-lg">Any questions or remarks? just write us a message!</p>
            <div class="my-4"></div>
            <div class="flex items-center justify-between">
                <div class="w-full min-w-[400px]">
                    <input
                        class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-400 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-[#8f5e1f] hover:border-[#8f5e1f] ring-0 shadow-sm focus:shadow"
                        placeholder="Full Name " />
                </div>
                <div class="mx-2"></div>
                <div class="w-full min-w-[400px]">
                    <input
                        class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-400 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-[#8f5e1f] hover:border-[#8f5e1f] ring-0 shadow-sm focus:shadow"
                        placeholder="Email" />
                </div>
            </div>
            <div class="my-3"></div>
            <textarea rows="8"
                class="w-[816px] bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-400 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-[#8f5e1f] hover:border-[#8f5e1f] ring-0 shadow-sm focus:shadow"
                placeholder="Message..."></textarea>
        </div>
        <br>
        {{-- Footer --}}
        <div class="text-center bg-black/85 text-white py-10 px-20">
            <h1 class="text-2xl font-bold">Hotel Prima</h1>
            <div class="my-2"></div>
            <p class="max-w-5xl mx-auto text-gray-300">
                A comfortable resting place with the best service. Enjoy a luxurious stay and complete facilities in a
                strategic location.
            </p>
            <div class="my-4"></div>
            <p class="text-gray-400">📍 Jl. Raya Utama No. 123, Kota Indah, Indonesia</p>
            <p class="text-gray-400">📞 +62 812-3456-7890 | ✉ contact@hotelprima.com</p>
            <div class="flex justify-center gap-5 mt-4">
                <a href="https://facebook.com/hotelprima"
                    class="hover:text-blue-400 transition duration-300">Facebook</a>
                <a href="https://instagram.com/hotelprima"
                    class="hover:text-pink-400 transition duration-300">Instagram</a>
                <a href="https://twitter.com/hotelprima" class="hover:text-blue-300 transition duration-300">Twitter</a>
            </div>
        </div>

        <!-- Bottom Navigation Bar -->
        <div class="flex justify-between items-center bg-black/90 text-white py-5 px-5 border-t border-gray-700">
            <p>Copyright © 2025 <span class="text-blue-600 font-semibold">Hotel Prima</span>. All Rights Reserved.</p>
            <div class="flex justify-between items-center gap-5">
                <a href="{{ route('home') }}" class="hover:text-gray-400 transition duration-300">Home</a>
                <a href="{{ route('room.index') }}" class="hover:text-gray-400 transition duration-300">Room</a>
                <a href="{{ route('facilities.hotel.index') }}"
                    class="hover:text-gray-400 transition duration-300">Facilities</a>
                <a href="{{ route('order.index') }}" class="hover:text-gray-400 transition duration-300">Booking</a>
                <a href="{{ route('booked') }}" class="hover:text-gray-400 transition duration-300">Booked Room</a>
            </div>
        </div>

    </div>
</x-app-layout>
