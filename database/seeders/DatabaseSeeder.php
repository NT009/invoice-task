<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\invoices;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        invoices::create([
            'quantity'=>10,
            'amount'=>10,
            'total_amount'=>100,
            'tax_percentage'=>5,
            'tax_amount'=>5,
            'net_amount'=>105,
            'customer_name'=>'arfrin',
            'invoice_date'=>'2023-10-23',
            'file'=>'sacscasc',
            'customer_email'=>'afrin@gmail.com'
        ]);
        invoices::create([
            'quantity'=>10,
            'amount'=>100,
            'total_amount'=>1000,
            'tax_percentage'=>5,
            'tax_amount'=>50,
            'net_amount'=>1050,
            'customer_name'=>'nihal',
            'invoice_date'=>'2023-10-23',
            'file'=>'sacscasc',
            'customer_email'=>'nihal@gmail.com'
        ]);
        invoices::create([
            'quantity'=>5,
            'amount'=>10,
            'total_amount'=>50,
            'tax_percentage'=>5,
            'tax_amount'=>2.5,
            'net_amount'=>52.5,
            'customer_name'=>'nuzaim',
            'invoice_date'=>'2023-10-23',
            'file'=>'sacscasc',
            'customer_email'=>'nz@gmail.com'
        ]);
        invoices::create([
            'quantity'=>10,
            'amount'=>100,
            'total_amount'=>1000,
            'tax_percentage'=>5,
            'tax_amount'=>50,
            'net_amount'=>1050,
            'customer_name'=>'akhil',
            'invoice_date'=>'2023-10-23',
            'file'=>'sacscasc',
            'customer_email'=>'ak@gmail.com'
        ]);
        invoices::create([
            'quantity'=>5,
            'amount'=>10,
            'total_amount'=>50,
            'tax_percentage'=>5,
            'tax_amount'=>2.5,
            'net_amount'=>52.5,
            'customer_name'=>'akhil',
            'invoice_date'=>'2023-10-23',
            'file'=>'sacscasc',
            'customer_email'=>'ak@gmail.com'
        ]);
    }
    
}
