<?php

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
        Schema::table('users', function (Blueprint $table) {
            $table->string("PPuser")->default("user.png");
            $table->string("BgPPuser")->default('bguser.jpg');
            $table->string("facebook")->default("#");
            $table->string("discord")->default("#");
            $table->string("instagram")->default("#");
            $table->string("tiktok")->default("#");
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
            $table->dropColumn("PPuser");
            $table->dropColumn("BgPPuser");
            $table->dropColumn("facebook");
            $table->dropColumn("discord");
            $table->dropColumn("instagram");
            $table->dropColumn("tiktok");
        });
    }
};
