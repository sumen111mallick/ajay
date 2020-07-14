<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no')->unique();
            $table->string('invoice_date')->nullable();
            $table->string('vendor_code')->nullable();
            $table->string('cost_centre_no')->nullable();
            $table->string('po_no')->nullable();
            $table->string('po_date')->nullable();
            $table->string('job_no')->nullable();
            $table->string('billed_to_name')->nullable();
            $table->text('billed_to_address')->nullable();
            $table->string('billed_to_state')->nullable();
            $table->string('billed_to_state_code')->nullable();
            $table->string('billed_to_gstin')->nullable();
            $table->string('shipped_to_name')->nullable();
            $table->text('shipped_to_address')->nullable();
            $table->string('shipped_to_state')->nullable();
            $table->string('shipped_to_state_code')->nullable();
            $table->string('shipped_to_gstin')->nullable();
            $table->string('shipped_to_project_name')->nullable();
            $table->string('shipped_to_project_location')->nullable();
            $table->string('transportation_mode')->nullable();
            $table->string('transportation_vehicle_no')->nullable();
            $table->string('transportation_gr_no')->nullable();
            $table->string('transportation_date_of_supply')->nullable();
            $table->string('transportation_place_of_supply')->nullable();
            $table->string('money_before_tax')->nullable();
            $table->string('money_tax_mode')->nullable();
            $table->string('money_tax_cgst')->nullable();
            $table->string('money_tax_sgst')->nullable();
            $table->string('money_tax_igst')->nullable();
            $table->string('money_after_tax')->nullable();
            $table->integer('payment_status')->default(0);
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('invoices');
    }
}
