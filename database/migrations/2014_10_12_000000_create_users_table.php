<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('id_card')->nullable();
            $table->string('nib')->nullable();
            $table->string('nik')->nullable();
            $table->string('nama_umkm')->nullable();
            $table->string('alamat')->nullable();
            $table->string('alamat_produksi')->nullable();
            $table->string('no_wa')->nullable();
            $table->string('kategori')->nullable();
            $table->string('gender')->nullable();
            $table->string('foto')->nullable()->default("profile.png");
            $table->string('role');
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('123'),
            'role'=>'admin',
        ]);
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
