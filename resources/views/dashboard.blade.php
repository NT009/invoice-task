<x-app-layout>
<div class="relative overflow-x-auto">
    @unless (count($invoices)==0)
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-4">
                    Customer Name
                </th>
                <th scope="col" class="px-6 py-4">
                    total amount
                </th>
                <th scope="col" class="px-6 py-4">
                    net amount
                </th>
                <th scope="col" class="px-6 py-4">
                    invoice date
                </th>
                <th scope="col" class="px-6 py-4">
                    view more
                </th>
            </tr>
        </thead>
        <tbody >
            @foreach ($invoices as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 items-center">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item->customer_name}}
                </th >
                <th scope="row" class="px-6 py-4 " >
                    {{$item->total_amount}}
                </th>
                <th class="px-6 py-4">
                    {{$item->net_amount}}
                </th>
                <th class="px-6 py-4">
                    {{$item->invoice_date}}
                </th>
                <th class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-white-500 underline decoration-2 hover:underline">view</a>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p class="text-white">no record found</p>
    @endunless
</div>


</x-app-layout>
