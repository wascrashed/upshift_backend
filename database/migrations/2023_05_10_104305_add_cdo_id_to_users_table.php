<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCdoIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('cdo_id');
            $table->foreign('cdo_id')->references('id')->on('cdos')->onDelete('cascade');
            $table->foreignId('partner_id')->constrained();
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
            $table->dropForeign(['cdo_id']);
            $table->dropColumn('cdo_id');
            $table->dropForeign(['partner_id']);
            $table->dropColumn('cdo_id');
        });
    }
}
