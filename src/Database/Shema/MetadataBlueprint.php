<?php 
namespace ErwanTouba\LaravelModelMetadata\Database\Shema;

use Illuminate\Database\Schema\Blueprint;
/**
* 
*/
class MetadataBlueprint extends Blueprint
{
	public function metadata() {
		// add created,updated,deleted_by
		// morph_to_many (multiple models support)
	}
}