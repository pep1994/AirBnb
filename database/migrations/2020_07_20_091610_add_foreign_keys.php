<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apartments',function(Blueprint $table){
          $table  -> foreign('user_id', 'user_apartments')
                  -> references('id')
                  -> on('users')
                  -> onDelete('cascade');
        });

        Schema::table('messages',function(Blueprint $table){
          $table  -> foreign('apartment_id', 'apartment_messages')
                  -> references('id')
                  -> on('apartments')
                  -> onDelete('cascade');
        });

        Schema::table('views',function(Blueprint $table){
          $table  -> foreign('apartment_id', 'apartment_views')
                  -> references('id')
                  -> on('apartments')
                  -> onDelete('cascade');
        });

        Schema::table('photos',function(Blueprint $table){
          $table -> foreign('apartment_id', 'photos_apartment')
                    -> references('id')
                    -> on('apartments')
                    -> onDelete('cascade');
        });

        Schema::table('apartment_sponsor',function(Blueprint $table){
          $table  -> foreign('apartment_id', 'apartment_sponsors')
                  -> references('id')
                  -> on('apartments')
                  -> onDelete('cascade');
          $table  -> foreign('sponsor_id', 'sponsor_apartments')
                  -> references('id')
                  -> on('sponsors')
                  -> onDelete('cascade');
        });

        Schema::table('apartment_optional',function(Blueprint $table){
          $table -> foreign('apartment_id', 'apartment_optionals')
                    -> references('id')
                    -> on('apartments')
                    -> onDelete('cascade');

          $table -> foreign('optional_id', 'optional_apartments')
                    -> references('id')
                    -> on('optionals')
                    -> onDelete('cascade');
        });

        Schema::table('preferences',function(Blueprint $table){
          $table  -> foreign('apartment_id', 'apartment_preferences')
                  -> references('id')
                  -> on('apartments')
                  -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users',function(Blueprint $table){

        $table -> dropForeign('user_apartments');

      });

      Schema::table('messages',function(Blueprint $table){

        $table -> dropForeign('apartment_messages');

      });

      Schema::table('preferences',function(Blueprint $table){

        $table -> dropForeign('apartment_preferences');

      });

      Schema::table('views',function(Blueprint $table){

        $table -> dropForeign('apartment_views');

      });

      Schema::table('photos',function(Blueprint $table){

        $table -> dropForeign('photos_apartment');

      });

      Schema::table('apartment_sponsor',function(Blueprint $table){

        $table -> dropForeign('apartment_sponsors');
        $table -> dropForeign('sponsor_apartments');

      });

      Schema::table('apartment_optional',function(Blueprint $table){

        $table -> dropForeign('apartment_optionals');
        $table -> dropForeign('optional_apartments');

      });


    }
}
