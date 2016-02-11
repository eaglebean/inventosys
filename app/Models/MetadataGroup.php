<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetadataGroup extends Model
{
    protected $table = 'metadata_group';
    protected $fillable = ['label', 'description', 'active'];

    /**
     * Get the items for the order.
     */
    public function childs()
    {
        return $this->hasMany('App\Models\Metadata', 'metadata_group_id');
    }
}
