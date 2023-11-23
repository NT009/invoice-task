<style>
    #ui-datepicker-div {
        background-color: white !important;
        padding: 0.5rem;

    }

    .ui-datepicker-prev:hover {
        background-color: blue;
    }

    .ui-datepicker-next:hover {
        background-color: blue;
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

    td:hover {
        background-color: skyblue;
    }

    .table.ui-datepicker-calendar {
        border: 1px black solid;
    }

    .error {
        color: #FF0000;
    }

    label.error {
        color: red;
        font-size: 1rem;
        display: block;
        margin-top: 5px;
    }

    input.error {
        border: 1px dashed red;
        font-weight: 300;
        color: red;
    }
</style>
<x-app-layout>
    <div class="w-full flex justify-around">
        <div
            class="w-1/3 p-6 m-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <form id="createForm" method="post" action="/invoices" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="quantity"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                    <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('quantity')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="amount"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                    <input type="number" id="amount" name="amount" value="{{ old('amount') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('amount')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6"><label for="tax_percentage"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tax Percentage</label>
                    <select id="tax_percentage" name="tax_percentage" value="{{ old('tax_percentage') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="0">0</option>
                        <option value="5">5</option>
                        <option value="12">12</option>
                        <option value="18">18</option>
                        <option value="28">28</option>
                    </select>
                    @error('tax_percentage')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="customer_name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer Name</label>
                    <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('customer_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="customer_email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer
                        Email
                        address</label>
                    <input type="email" id="customer_email" name="customer_email" value="{{ old('customer_email') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('customer_email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="datepicker" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Invoice
                        date</label>
                    <input type="text" id="datepicker" name="invoice_date" value="{{ old('invoice_date') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_help">png, jpg or pdf
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
    jQuery.validator.addMethod("accept", function(value, element) {
        return this.optional(element) || value.match(new RegExp(".[a-zA-Z]+$"));
    }, "Please enter a valid name");
    $(document).ready(function() {

        if ($("#createForm").length > 0) {
            $('#createForm').validate({
                rules: {
                    quantity: {
                        required: true,
                        number: true,
                        min: 1
                    },
                    amount: {
                        required: true,
                        number: true,
                        min: 0
                    },
                    tax_percentage: {
                        required: true,
                        number: true
                    },
                    invoice_date: {
                        required: true,
                        dateISO: true
                    },
                    file: {
                        required: true,
                        extension: "jpg|png|pdf"
                    },
                    customer_name: {
                        required: true,
                        maxlength: 50,
                        accept: true
                    },
                    customer_email: {
                        required: true,
                        maxlength: 50,
                        email: true
                    }
                },
                messages: {
                    customer_name: {
                        required: 'Enter Name Detail',
                        maxlength: 'Name should not be more than 50 character',
                        accept: 'enter a vaild name & no space after  name'
                    },
                    customer_email: {
                        required: 'Enter Email Detail',
                        email: 'Enter Valid Email Detail',
                        maxlength: 'Email should not be more than 50 character',
                    },
                    quantity: {
                        required: "Enter Quatity number",
                        number: "should be number",
                        min: "should be greater than 0",
                    },
                    amount: {
                        required: "Enter amount number",
                        number: 'Should be a number',
                        min: "should be greate than 0",
                    },
                    tax_percentage: {
                        required: "select a percentage from options",
                        number: "should be a number",
                    },
                    invoice_date: {
                        required: "Invoice date is required",
                        dateISO: "date should be iso format",
                    },
                    file: {
                        required: "should upload a file",
                        extension: "extension should be jpg,png or pdf",
                    }
                }
            });
        }

    });
</script>
