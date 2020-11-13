<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddCatagoryIdToJobs extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('jobs', function (Blueprint $table) {
			//
			//$table->integer('catagory_id')->nullable()->after('title')->unsigned();

			// $table->foreign('catagory_id')->references('id')->on('categories')
			// ->onUpdate('cascade')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('jobs', function (Blueprint $table) {
			//
		});
	}
}
