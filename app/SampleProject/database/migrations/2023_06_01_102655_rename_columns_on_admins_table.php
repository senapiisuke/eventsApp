<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsOnAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->renameColumn('団体名', 'name');
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
        Schema::table('admins', function (Blueprint $table) {
            $table->renameColumn('name', '団体名');
            $table->renameColumn('email', 'メールアドレス');
            $table->renameColumn('email_verified_at', 'メールアドレス確認');
            $table->renameColumn('password', 'パスワード');
        });
    }
}
