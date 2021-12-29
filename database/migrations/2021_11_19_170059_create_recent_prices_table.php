<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecentPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recent_prices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('dhakaKg');
            $table->float('dhakaQuintal');
            $table->float('chittagongKg');
            $table->float('chittagongQuintal');
            $table->float('khulnaKg');
            $table->float('khulnaQuintal');
            $table->float('rajshahiKg');
            $table->float('rajshahiQuintal');
            $table->float('rangpurKg');
            $table->float('rangpurQuintal');
            $table->float('sylhetKg');
            $table->float('sylhetQuintal');
            $table->float('barishalKg');
            $table->float('barishalQuintal');
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
        Schema::dropIfExists('recent_prices');
    }
}
