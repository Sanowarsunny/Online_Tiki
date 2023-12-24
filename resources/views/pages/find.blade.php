<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Find Trip') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <form class="max-w-sm mx-auto" action="{{ route('bus.show') }}" method="GET">
                        <div class="mb-5">
                                <label for="countries"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">From</label>
                                <select id="countries" name="from"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected >select city</option>
                                    <option>Dhaka</option>
                                    <option>Comilla</option>
                                    <option>Chittagong</option>
                                    <option>Cox's Bazaar</option>
                                 </select>
                        </div>
                        <div class="mb-5">
                                <label for="countries" name="to"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">To</label>
                                <select id="countries" name="to"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>select city</option>
                                    <option>Dhaka</option>
                                    <option>Comilla</option>
                                    <option>Chittagong</option>
                                    <option>Cox's Bazaar</option>
                                 </select>
                        </div>
                        <div class="mb-5">
                            <label for="date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Journey
                                </label>
                            <input type="date" id="date" name="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                        </div>

                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
