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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('studentName');
            $table->string('studentRegistration');
            $table->string('studentFatherName');
            $table->string('studentMotherName');
            $table->string('studentPhone');
            $table->string('studentAddress');
            $table->text('studentImage');
            $table->unsignedBigInteger('course_id')->nullable();
            $table->string('course_name');
            $table->decimal('course_fee', 8, 2);
            $table->string('payment_method');
            $table->unsignedInteger('batch')->nullable();
            $table->unsignedBigInteger( 'approve_by')->nullable();
            $table->enum( 'status',['pending','approved'])->default('pending');
            $table->dateTime( 'approve_date')->nullable();
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign( 'approve_by')->on('admins')->references( 'id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
