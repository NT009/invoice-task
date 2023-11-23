{{-- /storage/invoiceFiles/AzOrHVKbHjKGTy8EAeJ6g9IlbGPHcxBka5crz8gG.pdf --}}
<x-app-layout>
    <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="/" class="text-black bg-white font-medium rounded-lg ml-12 p-2">go back</a>
    </div>
    <div class="w-full flex justify-around">
        <div
            class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

            <h2 class="mb-2 text-lg text-center font-semibold text-gray-900 dark:text-white">Invoice details:</h2>
            <ul class="w-full space-y-1 text-gray-500 list-disc list-inside dark:text-white">
                <li class="text-center">
                    Customer Name : {{ $invoice->customer_name }}
                </li>
                <li class="text-center">
                    Quantity : {{ $invoice->quantity }}
                </li>
                <li class="text-center">
                    Amount : {{ $invoice->amount }}
                </li>
                <li class="text-center">
                    Total Amount : {{ $invoice->total_amount }}
                </li>
                <li class="text-center">
                    Tax Percentage : {{ $invoice->tax_percentage }}
                </li>
                <li class="text-center">
                    Tax Amount : {{ $invoice->tax_amount }}
                </li>
                <li class="text-center">
                    Net Amount : {{ $invoice->net_amount }}
                </li>
                <li class="text-center">
                    Invoice Date : {{ $invoice->invoice_date }}
                </li>
                <li class="text-center">
                    Invoice File :<a href="/storage/{{ $invoice->file }}" target="_blank"
                        class="ml-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-1 py-1 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">view</a>
                </li>
                <li class="text-center">
                    Customer Email : {{ $invoice->customer_email }}
                </li>

            </ul>
        </div>
    </div>
</x-app-layout>
