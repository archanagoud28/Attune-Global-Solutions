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
            $table->string('company_id')->unique();
            $table->string('company_name');
            $table->string('company_address1');
            $table->string('company_address2');
            $table->date('company_registration_date');
            $table->string('company_logo');
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->string('ceo_name');
            $table->timestamps();
        });

  DB::unprepared('
        CREATE TRIGGER generate_company_id
        BEFORE INSERT ON company_details
        FOR EACH ROW
        BEGIN
            IF NEW.company_id IS NULL THEN
                SET NEW.company_id = CONCAT(DATE_FORMAT(NOW(), "%m%Y"), LPAD(FLOOR(RAND() * 1000), 3, "0"));
            END IF;
        END;
    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_details');
    }
};
