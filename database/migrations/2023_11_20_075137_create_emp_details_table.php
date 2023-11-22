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
        Schema::create('emp_details', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id')->nullable()->default(null)->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('company_email')->unique();
            $table->string('company_name');
            $table->string('mobile_number')->unique();
            $table->string('alternate_mobile_number')->unique();
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->string('country');
            $table->date('hire_date');
            $table->enum('employee_type', ['full-time', 'part-time', 'contract']);
            $table->string('department');
            $table->string('job_title');
            $table->string('manager_id');
            $table->string('report_to');
            $table->enum('employee_status', ['active', 'on-leave', 'terminated']);
            $table->string('emergency_contact')->nullable();
            $table->string('password');
            $table->string('image');
            $table->string('blood_group');
            $table->string('nationality');
            $table->string('religion');
            $table->enum('marital_status', ['married', 'unmarried']);
            $table->string('spouse');
            $table->enum('physically_challenge', ['yes', 'no']);
            $table->enum('inter_emp', ['yes', 'no']);
            $table->string('job_location');
            $table->string('education');
            $table->string('experince')->nullable();
            $table->string('pan_no')->unique()->nullable();
            $table->string('adhar_no')->unique()->nullable();
            $table->string('pf_no')->unique()->nullable();
            $table->string('nick_name')->nullable();
            $table->string('time_zone')->nullable();
            $table->string('biography')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linked_in')->nullable();
            $table->string('is_starred')->nullable();
            $table->string('skill_set')->nullable();
            $table->string('company_id');
            $table->foreign('company_id')
                ->references('company_id') // Assuming the primary key of the companies table is 'id'
                ->on('company_details')
                ->onDelete('restrict')
                ->onUpdate('cascade');


            $table->timestamps();
        });

        $triggerSQL = <<<SQL
        CREATE TRIGGER generate_emp_id BEFORE INSERT ON emp_details FOR EACH ROW
        BEGIN
            -- Check if emp_id is NULL
            IF NEW.emp_id IS NULL THEN
                -- Find the maximum emp_id value in the emp_details table
                SET @max_id := IFNULL((SELECT MAX(CAST(SUBSTRING(emp_id, 3) AS UNSIGNED)) + 1 FROM emp_details), 100000);

                -- Increment the max_id and assign it to the new emp_id
                SET NEW.emp_id = CONCAT('44', LPAD(@max_id, 6, '0'));
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
        Schema::dropIfExists('emp_details');
    }
};
