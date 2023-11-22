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
            DECLARE max_id INT;

            -- Find the maximum customer_id value in the customer_details table
            SELECT IFNULL(MAX(CAST(SUBSTRING(customer_id, 5) AS UNSIGNED)) + 1, 1) INTO max_id FROM customer_details;

            -- Increment the max_id and assign it to the new customer_id
            SET NEW.customer_id = CONCAT("CUST", LPAD(max_id, 4, "0"));
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
