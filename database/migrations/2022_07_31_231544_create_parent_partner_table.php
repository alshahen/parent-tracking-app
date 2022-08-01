<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_partner', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id');
            $table->foreign('parent_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreignId('partner_id');
            $table->foreign('partner_id')->on('users')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parent_partner');
    }
};
