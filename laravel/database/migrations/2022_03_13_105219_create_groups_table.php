<?php

use App\Models\Group;
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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("unique_id")->nullable();
            $table->string("private_link")->nullable();
            $table->text("desc")->nullable();
            $table->enum("chat_history",["hidden","visible"])->default("hidden");
            $table->string("profile")->nullable();
            $table->foreignIdFor(User::class)->constrained("users","id")
                ->onDelete("cascade");
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('group_user', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class)->constrained("users","id")
                ->onDelete("cascade");

            $table->foreignIdFor(Group::class)->constrained("groups","id")
                ->onDelete("cascade");

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
        Schema::dropIfExists('group_user');
        Schema::dropIfExists('groups');
    }
};
