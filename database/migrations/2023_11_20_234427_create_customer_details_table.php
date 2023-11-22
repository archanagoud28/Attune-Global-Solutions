<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customer_details', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->unique();
            $table->string('customer_name');
            $table->string('customer_company_name');
            $table->string('customer_profile');
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->text('address');
            $table->text('notes')->nullable();
            $table->string('company_id');
            $table->foreign('company_id')
                ->references('company_id')
                ->on('company_details')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->timestamps();
        });


        $triggerSQL = <<<SQL
    CREATE TRIGGER generate_customer_id BEFORE INSERT ON customer_details FOR EACH ROW
    BEGIN
        -- Check if customer_id is NULL
        IF NEW.customer_id IS NULL THEN
            -- Find the maximum customer_id value in the customer_details table
            SET @max_id := IFNULL((SELECT MAX(CAST(SUBSTRING(customer_id, 3) AS UNSIGNED)) + 1 FROM customer_details), 100000);

            -- Increment the max_id and assign it to the new customer_id
            SET NEW.customer_id = CONCAT('33', LPAD(@max_id, 6, '0'));
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
        Schema::dropIfExists('customer_details');
    }
};
