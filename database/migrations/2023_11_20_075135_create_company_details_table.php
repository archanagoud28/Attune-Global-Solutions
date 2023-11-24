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
        Schema::create('company_details', function (Blueprint $table) {
            $table->id();
            $table->string('company_id')->nullable()->unique();
            $table->string('company_name');
            $table->string('company_address1');
            $table->string('company_address2');
            $table->date('company_registration_date');
            $table->string('company_logo');
            $table->string('contact_email')->unique();
            $table->string('contact_phone')->unique();
            $table->string('ceo_name');
            $table->string('status')->default(1);
            $table->timestamps();
        });



        $triggerSQL = <<<SQL
        CREATE TRIGGER generate_company_id BEFORE INSERT ON company_details FOR EACH ROW
        BEGIN
            -- Check if company_id is NULL
            IF NEW.company_id IS NULL THEN
                -- Find the maximum company_id value in the company_details table
                SET @max_id := (SELECT IFNULL(MAX(CAST(SUBSTRING(company_id, 5) AS UNSIGNED)) + 1, 1) FROM company_details);

                -- Increment the max_id and assign it to the new company_id
                SET NEW.company_id = CONCAT(DATE_FORMAT(NOW(), "%m%y"), LPAD(@max_id, 5, "0"));
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
        DB::unprepared('DROP TRIGGER IF EXISTS generate_company_id');
        Schema::dropIfExists('company_details');
    }
};
