<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('startup_id');
            $table->text('key_resources')->nullable();
            $table->text('customer_target')->nullable();
            $table->text('value_proposition')->nullable();
            $table->text('sales_channels')->nullable();
            $table->text('revenue_streams')->nullable();
            $table->text('key_metrics')->nullable();
            $table->text('cost_structure')->nullable();
            $table->text('financial_file')->nullable();
            $table->text('optional_file')->nullable();
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
        Schema::dropIfExists('business_models');
    }
}
