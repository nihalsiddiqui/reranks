<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_updates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("group_id")->index();
            $table->integer("update_id")->index();

            $table->foreign("group_id")
                ->references("id")->on("groups")->cascadeOnDelete();
            $table->foreign("update_id")
                ->references("id")->on("updates")->cascadeOnDelete();

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
        Schema::dropIfExists('group_updates');
    }
}
