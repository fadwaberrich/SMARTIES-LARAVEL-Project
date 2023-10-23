<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReportDefaultValueToReports extends Migration
{
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->boolean('report')->default(0)->change();
        });
    }

    public function down()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->boolean('report')->default(NULL)->change();
        });
    }
}
;
