<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Issue extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('issues', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('title');
			$table->text('description')->nullable();;
			$table->timestamps();
			$table->foreignId('project_id')->references('id')->on('projects')->onDelete('cascade');
			$table->foreignId('created_by_user_id')->references('id')->on('users');
			$table->foreignId('closed_by_user_id')->nullable()->references('id')->on('users');
			$table->foreignId('priority_id')->references('id')->on('issue_priorities');
			$table->foreignId('status_id')->references('id')->on('issue_statuses');            
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
	Schema::drop('issues');
	}
}
