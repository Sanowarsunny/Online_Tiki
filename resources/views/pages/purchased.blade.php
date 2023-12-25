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
                                        Customer Phone
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Paribahan Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        From
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        To
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Dep.Time
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Arr.Time
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3">
                                        Seats Number
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                <tr class="border-b odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                                
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $customer->customer_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $customer->phone }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $customer->trip->paribahan_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $customer->trip->from }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $customer->trip->to}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{-- {{ $customer->trip->departure_time }} --}}
                                        {{ date('h:i A', strtotime($customer->trip->departure_time)) }}

                                    </td>
                                    <td class="px-6 py-4">
                                        {{-- {{ $customer->trip->arrival_time }} --}}
                                        {{ date('h:i A', strtotime($customer->trip->arrival_time)) }}
                                    </td>
                                    
                                    <td class="px-6 py-4">
                                        {{ implode(', ', $customer->seats->pluck('seat_number')->toArray()) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $customer->seats->sum('total_price') }}
                                       
                                    </td>
                                    
                                    <td class="px-6 py-4">
                                        <a href="#" type="submit"
                                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cancel</a>
                                    </td>
                                    @endforeach
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
