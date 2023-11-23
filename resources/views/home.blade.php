<x-app-layout>


    <div
        class="w-full p-4 flex justify-end bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="/create" class="text-black bg-white font-medium rounded-lg mr-20 p-2">Create Invoice</a>
    </div>



    <div class="relative overflow-x-auto">
        @unless (count($invoices) == 0)
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-center">
                            Customer Name
                        </th>
                        <th scope="col" class="px-6 py-4 text-center">
                            total amount
                        </th>
                        <th scope="col" class="px-6 py-4 text-center">
                            tax Amount
                        </th>
                        <th scope="col" class="px-6 py-4 text-center">
                            net amount
                        </th>
                        <th scope="col" class="px-6 py-4 text-center">
                            view more
                        </th>
                        <th scope="col" class="px-6 py-4 text-center">

                        </th>
                        <th scope="col" class="px-6 py-4 text-center">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 items-center">
                            <td scope="row"
                                class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->customer_name }}
                            </td>
                            <td scope="row" class="text-center px-6 py-4 ">
                                {{ $item->total_amount }}
                            </td>
                            <td class="text-center px-6 py-4">
                                {{ $item->tax_amount }}
                            </td>
                            <td class="text-center px-6 py-4">
                                {{ $item->net_amount }}
                            </td>
                            <td class="text-center px-6 py-4">
                                <a href="/details/{{ $item->id }}"
                                    class="font-medium text-blue-600 dark:text-white-500 underline decoration-2 hover:underline">view</a>
                            </td>
                            <td class="text-center px-3 py-2">
                                <a href="/edit/{{ $item->id }}"
                                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                                    EDIT</a>
                            </td>
                            <td class="text-center px-3 py-2">
                                <form method="POST" action="/delete/{{$item->id}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-white">no record found</p>
        @endunless
    </div>
    <div class="bg-slate-500"> {{ $invoices->links() }}</div>

</x-app-layout>
