<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Constant;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Constant::TBL_USER, function (Blueprint $table) {
            $table->increments(Constant::CL_ID);
            $table->string(Constant::CL_USERNAME)->nullable();
            @$table->string(Constant::CL_REMEMBER_TOKEN)->nullable();
            $table->integer(Constant::CL_MAKHACHHANG)->unsigned();
            $table->foreign(Constant::CL_MAKHACHHANG)->references(Constant::CL_ID)->on(App\Constant::TBL_KHACHHANG)->onDelete('cascade');
            $table->string(Constant::CL_PASSWORD)->nullable();
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
        Schema::dropIfExists(Constant::TBL_USER);
    }
}
