<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->nullable();
            $table->string('phone')->nullable();
            $table->date('birthday')->nullable();
            $table->string('field_of_activity')->nullable();
            $table->string('occupation')->nullable();
            $table->string('salary')->nullable();
            $table->string('address')->nullable();
            $table->string('street')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country')->nullable();
            $table->string('civility')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_number')->nullable();
            $table->string('website')->nullable();
            $table->boolean('is_pro_user')->default(false);
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_super_admin')->default(false);
            $table->unsignedBigInteger('credhits')->default(0);
            $table->unsignedBigInteger('balance')->default(0);
            $table->string('official_registration_document_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
