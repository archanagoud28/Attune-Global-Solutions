<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->nullable()->default(null)->unique();
            $table->string('customer_id'); // Assuming a 'customers' table exists
            $table->decimal('amount', 10, 2);
            $table->string('due_date');
            $table->string('payment_terms');
            $table->text('description')->nullable();
            $table->string('status')->default('unpaid'); // e.g., unpaid, paid, pending
            $table->string('currency', 3)->default('USD'); // assuming USD, but you can customize
            $table->string('notes')->nullable();
            $table->string('company_id');
            $table->foreign('company_id')
                ->references('company_id')
                ->on('company_details')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('customer_id')
                ->references('customer_id')
                ->on('customer_details')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->timestamps();
        });

        $triggerSQL = <<<SQL
        CREATE TRIGGER generate_invoice_number BEFORE INSERT ON invoices FOR EACH ROW
        BEGIN
            -- Check if invoice_number is NULL
            IF NEW.invoice_number IS NULL THEN
                -- Find the maximum invoice_number value in the invoices table
                SET @max_id := IFNULL((SELECT MAX(CAST(SUBSTRING(invoice_number, 3) AS UNSIGNED)) + 1 FROM invoices), 100000);

                -- Increment the max_id and assign it to the new invoice_number
                SET NEW.invoice_number = CONCAT('44', LPAD(@max_id, 6, '0'));
            END IF;
        END;
    SQL;

        DB::unprepared($triggerSQL);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
