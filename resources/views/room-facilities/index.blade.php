<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Room Facilities') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("This is room") }}
                </div>
            </div>
        </div>

        <div class="mx-auto overflow-hidden max-w-7xl overflow-x-auto rounded-md border border-neutral-300">
            <table class="w-full text-left text-sm text-neutral-600">
                <thead class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900">
                    <tr>
                        <th scope="col" class="p-4">CustomerID</th>
                        <th scope="col" class="p-4">Name</th>
                        <th scope="col" class="p-4">Email</th>
                        <th scope="col" class="p-4">Membership</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-300 dark:divide-neutral-700">
                        <tr class="even:bg-black/5 dark:even:bg-white/10">
                            <td class="p-4">2335</td>
                            <td class="p-4">Alice Brown</td>
                            <td class="p-4">alice.brown@penguinui.com</td>
                            <td class="p-4">Silver</td>
                        </tr>
                        <tr class="even:bg-black/5 dark:even:bg-white/10">
                            <td class="p-4">2338</td>
                            <td class="p-4">Bob Johnson</td>
                            <td class="p-4">johnson.bob@penguinui.com</td>
                            <td class="p-4">Gold</td>
                        </tr>
                        <tr class="even:bg-black/5 dark:even:bg-white/10">
                            <td class="p-4">2342</td>
                            <td class="p-4">Sarah Adams</td>
                            <td class="p-4">s.adams@penguinui.com</td>
                            <td class="p-4">Gold</td>
                        </tr>
                        <tr class="even:bg-black/5 dark:even:bg-white/10">
                            <td class="p-4">2345</td>
                            <td class="p-4">Alex Martinez</td>
                            <td class="p-4">alex.martinez@penguinui.com</td>
                            <td class="p-4">Gold</td>
                        </tr>
                        <tr class="even:bg-black/5 dark:even:bg-white/10">
                            <td class="p-4">2346</td>
                            <td class="p-4">Ryan Thompson</td>
                            <td class="p-4">ryan.thompson@penguinui.com</td>
                            <td class="p-4">Silver</td>
                        </tr>
                        <tr class="even:bg-black/5 dark:even:bg-white/10">
                            <td class="p-4">2349</td>
                            <td class="p-4">Emily Rodriguez</td>
                            <td class="p-4">emily.rodriguez@penguinui.com</td>
                            <td class="p-4">Gold</td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
