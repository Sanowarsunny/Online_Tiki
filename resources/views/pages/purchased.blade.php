<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Booked Trip') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-8xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Customer Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Phone
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Paribahan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Dep.Time
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Arr.Time
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        From
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        To
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Booked Seats
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Fare/Seat
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Cancellation
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Sayed Mahmud
                                    </td>
                                    <td class="px-6 py-4">
                                        +8801234567891
                                    </td>
                                    <td class="px-6 py-4">
                                        Hanif Paribahon
                                    </td>
                                    <td class="px-6 py-4">
                                        10:20 pm
                                    </td>
                                    <td class="px-6 py-4">
                                        03.00 am
                                    </td>
                                    <td class="px-6 py-4">
                                        Dhaka
                                    </td>
                                    <td class="px-6 py-4">
                                        Chittagong
                                    </td>
                                    <td class="px-6 py-4">
                                        12
                                    </td>
                                    <td class="px-6 py-4">
                                        999
                                    </td>
                                    
                                    <td class="px-6 py-4">
                                        <a href="#" type="submit"
                                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cancel</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
