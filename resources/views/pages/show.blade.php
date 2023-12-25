<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Available Trips') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Serial No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Paribohan Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        From
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        To
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Journey Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Dep.Time
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Arr.Time
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3">
                                        Seats Available
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Fare
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trips as $item => $trip)
                                <tr class="border-b odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{-- {{ ($trips->currentPage() - 1) * $trips->perPage() + $item + 1 }} --}}
                                        {{ $item + 1 }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $trip->paribahan_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $trip->from }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $trip->to }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $trip->journey_date }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{-- {{ $trip->arrival_time }} --}}
                                        {{ date('h:i A', strtotime($trip->arrival_time)) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{-- {{ $trip->departure_time }} --}}
                                        {{ date('h:i A', strtotime($trip->departure_time)) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $trip->total_seats }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $trip->ticket_price }}
                                    </td>
                                    
                                    <td class="px-6 py-4">
                                        <a href="{{ route('bus.buy-ticket',['paribahan_name' => $trip->paribahan_name, 'bus_code' => $trip->id,'available_seats' => $trip->total_seats]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">book</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            {{-- {{ $trips->links() }} --}}
                        </table>
                    </div>
                    
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
