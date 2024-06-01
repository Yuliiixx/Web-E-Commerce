// database/migrations/xxxx_xx_xx_create_user_table.php
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nohp');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }
}
