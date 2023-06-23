<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsOnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('名前', 'name');
            $table->renameColumn('メールアドレス', 'email');
            $table->renameColumn('メールアドレス確認', 'email_verified_at');
            $table->renameColumn('パスワード', 'password');
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
            $table->renameColumn('name', '名前');
            $table->renameColumn('email', 'メールアドレス');
            $table->renameColumn('email_verified_at', 'メールアドレス確認');
            $table->renameColumn('password', 'パスワード');
        });
    }
}
