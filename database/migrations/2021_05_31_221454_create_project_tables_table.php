<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProjectTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create tables for Categories
        Schema::create('category', function (Blueprint $table) {
            $table->id('category_id');
            $table->string('name', 50);
            $table->string('description', 100)->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        //Create tables for Jobs
        Schema::create('jobs', function (Blueprint $table) {
            $table->id('job_id');
            $table->string('title', 50);
            $table->integer('salary');
        });

        //Create tables for Employees
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email', 100)->nullable();
            $table->string('phone_number')->nullable();
            $table->unsignedBigInteger('job_id')->nullable();
            $table->foreign('job_id')->references('job_id')->on('jobs')->onUpdate('cascade')->onDelete('set null');
            $table->date('hired_date')->default(DB::raw('CURRENT_DATE'));
        });

        //Create tables for Suppliers
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id('supplier_id');
            $table->string('company_name', 50);
            $table->string('phone_number')->nullable();
        });

        //Create tables for Products
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('name', 50);
            $table->string('description', 100)->nullable();
            $table->integer('stock_qty');
            $table->integer('critical_qty')->nullable();
            $table->float('price');
            $table->float('discounted_price')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('category_id')->on('category')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->foreign('supplier_id')->references('supplier_id')->on('suppliers')->onUpdate('cascade')->onDelete('set null');
            $table->timestamp('created_at')->useCurrent();
        });

        //Create tables for Transaction Details
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id('trans_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->float('payment');
            $table->float('change');
            $table->float('amount_paid');
            $table->timestamp('trans_date')->useCurrent();
        });

        //Create tables for Order Details
        Schema::create('order_details', function (Blueprint $table) {
            $table->id('order_id');
            $table->integer('advanceTransId');
            $table->unsignedBigInteger('trans_id')->nullable();
            $table->foreign('trans_id')->references('trans_id')->on('transaction_details')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('product_id')->on('products')->onUpdate('cascade')->onDelete('set null');
            $table->integer('order_qty');
            $table->float('price');
            $table->float('amount');
            $table->timestamp('order_date')->useCurrent();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('employees');
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('products');
        Schema::dropIfExists('transaction_details');
        Schema::dropIfExists('order_details');
    }
}
