<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Comment extends Model
{
    use Sortable;
    protected $primaryKey = 'id_comment';

    public $sortable = ['email', 'is_approved', 'created_at', 'updated_at', 'stars'];

    public function product()
    {
        return $this->belongsTo('App\Product', 'id_product', 'id_product');
    }
}
