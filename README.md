# laravel-model-medatada
package to add feature to laravel models like 'created_by','updated_by',...

Model Creation
Lorsqu'on cree un model dont l'acces au donne est restreint par "proprietaire" --> seulement l'equipe qui a "insert" le model peux le retrouver

 1. definir la nouvelle grammaire (qui etend celle de base) DB::connection()->setSchemaGrammar(new ExtendedMySqlGrammar());

 2. recuperer l'instance du Schema builder $schema = DB::connection()->getSchemaBuilder();

 3. bind de la nnouvelle classe "MetaBlueprint" $schema->blueprintResolver(function($table, $callback) { return new ExtendedBlueprint($table, $callback); });

 4. add observantTrait to the model you want to add metadatas

use ObservantTrait;

5. add the 'metadata' property to the model to enable the observer

public $metadata = true;
create_model_table.php

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Src\Database\Schema\MetaBlueprint;
use App\Src\Database\Schema\Grammars\ExtendedMySqlGrammar;

class CreateModelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->setSchemaGrammar(new ExtendedMySqlGrammar());
        $schema = DB::connection()->getSchemaBuilder();
        $schema->blueprintResolver(function($table, $callback) {
            return new MetaBlueprint($table, $callback);
        });
        $schema->create('model', function(MetaBlueprint $table) {            
            $table->increments('id');
            $table->metadata();
            $table->string('name');            
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professional');
    }
}