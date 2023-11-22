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
        Schema::create('hr_details', function (Blueprint $table) {
            $table->id();
            $table->string('company_id'); // Use constrained to reference the correct table
            $table->string('hr_id')->nullable()->default(null)->unique(); // Use constrained to reference the correct table
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->text('address');
            $table->string('password');
            $table->foreign('company_id')
                ->references('company_id')
                ->on('company_details')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->timestamps();
        });


        $triggerSQL = <<<SQL
        CREATE TRIGGER generate_hr_id BEFORE INSERT ON hr_details FOR EACH ROW
        BEGIN
            -- Check if hr_id is NULL
            IF NEW.hr_id IS NULL THEN
                -- Find the maximum hr_id value in the hr_details table
                SET @max_id := IFNULL((SELECT MAX(CAST(SUBSTRING(hr_id, 3) AS UNSIGNED)) + 1 FROM hr_details), 100000);

                -- Increment the max_id and assign it to the new hr_id
                SET NEW.hr_id = CONCAT('88', LPAD(@max_id, 6, '0'));
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
        Schema::dropIfExists('hr_details');
    }
};
