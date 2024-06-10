<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('recipe', function (Blueprint $table) {
            // Cek apakah kolom user_id sudah ada
            if (!Schema::hasColumn('recipe', 'user_id')) {
                // Tambahkan kolom user_id jika belum ada
                $table->unsignedBigInteger('user_id')->nullable();
            }
        });

        // Ambil id user pertama sebagai default
        $firstUserId = DB::table('users')->first()->id;

        // Isi user_id di semua baris di tabel recipe dengan id user pertama
        DB::table('recipe')->update(['user_id' => $firstUserId]);

        Schema::table('recipe', function (Blueprint $table) {
            // Ubah kolom user_id menjadi not null
            $table->unsignedBigInteger('user_id')->nullable(false)->change();

            // Tambahkan foreign key
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recipe', function (Blueprint $table) {
            //
        });
    }
};
