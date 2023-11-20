<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
<<<<<<< HEAD:database/migrations/2023_11_20_075917_create_company_details_table.php
=======
            $table->string('contact_phone');
>>>>>>> 4c8120c558cdb34f471931314f074c89da814ee7:database/migrations/2023_11_20_075135_create_company_details_table.php
            $table->string('ceo_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_details');
    }
};