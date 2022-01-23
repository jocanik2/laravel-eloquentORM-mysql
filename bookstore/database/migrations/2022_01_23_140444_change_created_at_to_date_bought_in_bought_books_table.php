<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCreatedAtToDateBoughtInBoughtBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bought_books', function (Blueprint $table) {
            $table->renameColumn('created_at', 'date_bought');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bought_books', function (Blueprint $table) {
            //
        });
    }
}
