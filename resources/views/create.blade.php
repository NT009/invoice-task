<style>
    #ui-datepicker-div {
        background-color: white !important;
        padding: 0.5rem;
    }

    .ui-datepicker-next {
        margin-left: 5rem;
        cursor: pointer;
        background-color: rgb(66, 66, 66);
        color: white;
        padding: 3px;
        border-radius: 6px;
    }

    .ui-datepicker-prev {
        cursor: pointer;
        background-color: rgb(66, 66, 66);
        color: white;
        padding: 3px;
        border-radius: 6px;
    }

    .ui-datepicker-title {
        text-align: center;
    }

    tr,
    th,
    td {
        border: 1px black solid;
    }

    .table.ui-datepicker-calendar {
        border: 1px black solid;
    }
</style>
<x-app-layout>
    <div class="w-full flex justify-around">
        <div
            class="w-1/3 p-6 m-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <form method="post" action="/invoices" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="quantity"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                    <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('quantity')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="amount"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                    <input type="number" id="amount" name="amount" value="{{ old('amount') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('amount')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- <div class="mb-6">
                    <label for="total_amount" 
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Amount</label>
                    <input type="number" id="total_amount" name="total_amount"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div> --}}
                <div class="mb-6"><label for="tax_percentage"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tax Percentage</label>
                    <select id="tax_percentage" name="tax_percentage" value="{{ old('tax_percentage') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="0">0</option>
                        <option value="5">5</option>
                        <option value="12">12</option>
                        <option value="18">18</option>
                        <option value="28">18</option>
                    </select>
                    @error('tax_percentage')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- <div class="mb-6">
                    <label for="tax_amount"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tax Amount</label>
                    <input type="number" id="tax_amount" name="tax_amount"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div> --}}
                {{-- <div class="mb-6">
                    <label for="net_amount" 
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Net Amount</label>
                    <input type="number" id="net_amount" name="net_amount"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div> --}}
                <div class="mb-6">
                    <label for="customer_name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer Name</label>
                    <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('customer_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer
                        Email
                        address</label>
                    <input type="email" id="email" name="customer_email" value="{{ old('customer_email') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('customer_email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="datepicker" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Invoice
                        date</label>
                    <input type="text" id="datepicker" name="invoice_date" value="{{ old('invoice_date') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('invoice_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Upload
                        file</label>
                    <input type="file" id="file" name="file" value="{{ old('file') }}"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_help">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_help">PNG, JPG or PDF
                        (MAX. 3mb).</p>
                    @error('file')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <h2 class="mb-2 text-md font-semibold text-gray-900 dark:text-white">Note:</h2>
                <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                    <li>
                        don't worry about Total Amount,Tax Amount and Net Amount
                    </li>
                    <li>
                        it will be calculated according to Quantity,Amount and Tax percentage
                    </li>
                    <li>
                        you can view it in table
                    </li>
                </ul>
                <button type="submit"
                    class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
<script>
    $(function() {
        $("#datepicker").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>
