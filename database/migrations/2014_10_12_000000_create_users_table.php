<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullName');
            $table->string('phoneNumber');
            $table->string('role');
            $table->string('password');
            $table->string('address');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('users', function ($table) {
    $table->string('api_token', 80)->after('password')
                        ->unique()
                        ->nullable()
                        ->default(null);
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
