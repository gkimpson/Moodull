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
            $table->renameColumn('name', 'nickname');
            $table->uuid('uuid')->after('id');
            $table->string('firstname', 255)->after('uuid');
            $table->string('lastname', 255)->after('firstname');
            $table->timestamp('start_date')->default(now())->after('remember_token');
            $table->after('email_verified_at', function ($table) {
                $table->enum('gender', ['M', 'F']);
                $table->unsignedTinyInteger('is_active')->default(1);
            });
            $table->softDeletes();
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
            $table->renameColumn('name', 'nickname');
            $table->dropColumn('uuid');
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('start_date');
            $table->dropColumn('gender');
            $table->dropColumn('is_active');
            $table->dropSoftDeletes();
        });
    }
};
