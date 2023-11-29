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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('bill_number')->nullable()->default(null)->unique();
            $table->string('vendor_id'); // Assuming a 'vendors' table exists
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
            $table->foreign('vendor_id')
                ->references('vendor_id')
                ->on('vendor_details')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->timestamps();
        });

        $triggerSQL = <<<SQL
        CREATE TRIGGER generate_bill_number BEFORE INSERT ON bills FOR EACH ROW
        BEGIN
            -- Check if bill_number is NULL
            IF NEW.bill_number IS NULL THEN
                -- Find the maximum bill_number value in the bills table
                SET @max_id := IFNULL((SELECT MAX(CAST(SUBSTRING(bill_number, 3) AS UNSIGNED)) + 1 FROM bills), 100000);

                -- Increment the max_id and assign it to the new bill_number
                SET NEW.bill_number = CONCAT('33', LPAD(@max_id, 6, '0'));
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
        Schema::dropIfExists('bills');
    }
};
