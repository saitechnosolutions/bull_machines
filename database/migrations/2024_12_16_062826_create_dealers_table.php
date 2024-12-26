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
        Schema::create('dealers', function (Blueprint $table) {
            $table->id();
            $table->string('dealer_name', 255);
            $table->string('dealer_code', 255);
            $table->unsignedBigInteger('designation')->nullable();
            $table->foreign('designation')->references('id')->on('designations')->onDelete('cascade');
            $table->string('department', 255);
            $table->string('mobile_number', 20);
            $table->longText('dealer_address');
            $table->date('dealer_dob');
            $table->date('dealer_doj');
            $table->date('dealer_dol');
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->string('reports_to', 255);
            $table->unsignedBigInteger('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedBigInteger('state_id')->nullable();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->unsignedBigInteger('base_district_id')->nullable();
            $table->foreign('base_district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->unsignedBigInteger('home_district_id')->nullable();
            $table->foreign('home_district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->string('dealer_login_id', 255);
            $table->string('dealer_login_password', 255);
            $table->string('dealer_status', 255);
            $table->string('dealer_active', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dealers');
    }
};