<?php
namespace ErwanTouba\LaravelModelMetadata\Database\Shema;
use Illuminate\Database\Schema\Blueprint;

class MetaBlueprint extends Blueprint {

    public function metadata($column = null) {
        $this->addColumn('metadata', 'created_by')->nullable();
        $this->addColumn('metadata', 'updated_by')->nullable();        
    }
}