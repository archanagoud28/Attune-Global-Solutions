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
        Schema::create('contractors_details', function (Blueprint $table) {
            $table->id();
            $table->string('contractor_id')->unique();
            $table->string('client_name');
            $table->text('client_address')->nullable();
            $table->string('it_company_name');
            $table->text('it_company_address');
            $table->date('effective_date');
            $table->text('scope_of_work');
            $table->text('project_timeline');
            $table->decimal('total_amount', 10, 2);
            $table->text('payment_schedule')->nullable();
            $table->text('intellectual_property')->nullable();
            $table->text('confidentiality_terms')->nullable();
            $table->text('communication_plan')->nullable();
            $table->text('quality_assurance_process')->nullable();
            $table->text('warranty_details')->nullable();
            $table->text('support_terms')->nullable();
            $table->text('termination_conditions')->nullable();
            $table->text('dispute_resolution')->nullable();
            $table->text('insurance_requirements')->nullable();
            $table->string('governing_law')->nullable();
            $table->string('company_id');
            $table->foreign('company_id')
                ->references('company_id') // Assuming the primary key of the companies table is 'id'
                ->on('company_details')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contractors_details');
    }
};
