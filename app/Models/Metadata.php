<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    protected $table = 'metadata';
    protected $fillable = ['metadata_group_id', 'label', 'description', 'active'];

    public function parent()
    {
        return $this->belongsTo('App\Models\MetadataGroup', 'id', 'metatada_group_id');
    }
    public static function getLabel($id)
    {
        return ($metadata = Metadata::find($id)) ? $metadata->label : "no declarado";
    }
}
