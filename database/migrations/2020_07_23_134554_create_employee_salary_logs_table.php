<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeSalaryLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_salary_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('employee_id')->comment('employee_id=user_id');
            $table->double('previous_salary')->nullable();
            $table->double('present_salary')->nullable();
            $table->double('increment_salary')->nullable();
            $table->date('effected_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_salary_logs');
    }
}
