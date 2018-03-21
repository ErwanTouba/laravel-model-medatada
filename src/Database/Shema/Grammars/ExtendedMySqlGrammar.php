<?php
namespace ErwanTouba\LaravelModelMetadata\Database\Shema\Grammars;

use Illuminate\Support\Fluent;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Grammars\MySqlGrammar;

/**
 * Extended version of MySqlGrammar with
 * support of 'metadata' data type
 */
class ExtendedMySqlGrammar extends MySqlGrammar {

    /**
     * Create the column definition for an 'metadata' type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeMetadata(Fluent $column)
    {
        // changer par morphOne --> checker les sources laravel
        return 'INT(11)';
    }    

}