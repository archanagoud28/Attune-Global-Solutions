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
        Schema::create('contractors_details', function (Blueprint $table) {
            $table->id();
            $table->string('contractor_id')->nullable()->default(null)->unique();
            $table->string('contractor_image');
            $table->string('contractor_name');
            $table->string('contractor_email')->unique();
            $table->string('contractor_phone')->unique();
            $table->text('contractor_address')->nullable();
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
            $table->string('password')->nullable();
            $table->string('status')->default(1);
            $table->string('company_id');
            $table->foreign('company_id')
                ->references('company_id') // Assuming the primary key of the companies table is 'id'
                ->on('company_details')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->timestamps();
        });


$triggerSQL = <<<SQL
    CREATE TRIGGER generate_contractor_id BEFORE INSERT ON contractors_details FOR EACH ROW
    BEGIN
        -- Check if contractor_id is NULL
        IF NEW.contractor_id IS NULL THEN
            -- Find the maximum contractor_id value in the contractors_details table
            SET @max_id := IFNULL((SELECT MAX(CAST(SUBSTRING(contractor_id, 3) AS UNSIGNED)) + 1 FROM contractors_details), 100000);

            -- Increment the max_id and assign it to the new contractor_id
            SET NEW.contractor_id = CONCAT('33', LPAD(@max_id, 6, '0'));
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
        Schema::dropIfExists('contractors_details');
    }
};
