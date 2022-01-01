<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerPickupItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_pickup_items', function (Blueprint $table) {
            $table->id();
            $table->string('InvoiceNumber');
            $table->string('ItemName');
            $table->string('ItemDesc');
            $table->Integer('Quantity');
            $table->Integer('Discount');
            $table->decimal('RetailPrice', 8, 2);
            $table->string('ItemCode');
            $table->string('ItemImage');
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
        Schema::dropIfExists('customer_pickup_items');
    }
}
