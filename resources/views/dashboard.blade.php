<x-app-layout>
    <x-slot name="header" id="home">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hotel Prima') }}
        </h2>
    </x-slot>

    <div class="">
        {{-- <div class="max-w-8xl mx-auto rounded-md -mt-20">
            <img src="{{ asset('assets/images/5253899-removebg-preview.png') }}" alt="" class="w-full h-96 rounded-md">
        </div> --}}
        <div class="my-24"></div>
        {{-- Home --}}
        <div class="flex items-center justify-between max-w-5xl mx-auto rounded-md">
            <div class="">
                <div class="text-3xl font-extrabold">Hotel Prima</div>
                <div class="my-4"></div>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam minus eveniet velit, libero quae
                    voluptates in aliquid inventore, saepe, magni neque. Facilis error expedita unde?Lorem ipsum dolor
                    sit amet consectetur adipisicing elit. Deserunt, Lorem, ipsum dolor sit amet consectetur
                    adipisicing. Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, vero. Lorem ipsum
                    dolor sit amet consectetur, adipisicing elit. Esse, veniam. Lorem ipsum dolor sit amet consectetur,
                    adipisicing elit. Officiis, voluptatum. Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Quia necessitatibus illo architecto eaque pariatur repudiandae? Lorem ipsum dolor sit amet
                    consectetur adipisicing elit. Illo, saepe!</p>
                <div class="my-4"></div>
                <a href="{{ route('order.index') }}"
                    class="bg-[#8f5e1f] text-white px-6 py-2 rounded-md transition hover:bg-[#664111] duration-500">Booking
                    Now</a>
            </div>
            <div class="mx-7"></div>
            <img src="{{ asset('assets/images/Celebrant Hotel.jpg') }}" alt="" class="w-96 h-96 rounded-lg">
        </div>
        {{-- About --}}
        <br><br>
        <div class="max-w-6xl flex flex-col items-center mx-auto my-20 px-10">
            <h1 class="font-extrabold text-3xl">About Us</h1>
            <div class="my-3"></div>
            <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur adipisci
                reprehenderit ducimus dolor
                iusto id ea eius, accusantium molestias aperiam nobis ut hic quibusdam, porro placeat a nulla
                repudiandae quas nemo culpa? Ad mollitia ipsa tempore exercitationem nemo est, aspernatur quo facilis
                sed eveniet, voluptates unde perferendis, modi facere magnam neque reprehenderit? Dolore, quod. Aliquam
                deleniti voluptas non magni necessitatibus sequi quo dicta veritatis vel blanditiis nisi, nam fugit aut
                eveniet? Corrupti quas id ratione, suscipit consequuntur eligendi! Maxime facere harum accusamus
                nostrum. Quisquam et nostrum amet dolore? Quas vitae reprehenderit id excepturi architecto adipisci
                placeat ab eum! Doloribus, harum.</p>
        </div>
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
            <textarea rows="10"
                class="w-[816px] bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-400 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-[#8f5e1f] hover:border-[#8f5e1f] ring-0 shadow-sm focus:shadow"
                placeholder="Message..."></textarea>
        </div>
        {{-- Footer --}}
        <div class="text-center bg-black text-white py-10 px-20">
            <h1 class="text-2xl">Hotel Prima</h1>
            <div class="my-2"></div>
            <p class="max-w-5xl mx-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus eligendi
                pariatur, mollitia
                voluptas
                obcaecati doloribus laborum, odit facilis ducimus beatae distinctio provident fuga aliquam accusamus?
                Lorem ipsum dolor sit amet. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum, culpa?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio officia quod quaerat aspernatur labore
                officiis? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis, doloribus! Lorem ipsum dolor
                sit amet. Lorem, ipsum dolor.
            </p>
        </div>
        {{-- BottomNavBar --}}
        <div class="flex justify-between items-center bg-black text-white py-5 px-5 border-t">
            <p>Copyright @2025 <span class="text-blue-600">HotelPrima</span></p>
            <div class="flex justify-between items-center gap-5">
                <a href="#home">Home</a>
                <a href="#about">About</a>
                <a href="#contact">Contact</a>
                <a href="#mantap">Good</a>
            </div>
        </div>
    </div>
</x-app-layout>
