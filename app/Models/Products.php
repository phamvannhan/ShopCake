<?php

namespace App\Models;

use App\Traits\MetadataTrait;
use App\Traits\ModelEventTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Products extends Model implements Transformable //dung de da ngon ngu
{	
	//\Dimsav\Translatable\Translatable,
    use  TransformableTrait, MetadataTrait, ModelEventTrait;

    protected $table = "products";

    protected static $caches = [
        'all'
    ];

    protected $fillable = [
        "name",
        "id_type",
        "description",
        "unit_price",
        "promotion_price",
        "image",
        "unit",
        "new"
    ];

    public $translatedAttributes = [
        "slug",
        "name",
        'remark'
    ];

    public function product_type()
    {
    	return $this->belongsToMany(ProductType::class,'id_type','id');
    }
    public function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_product','id');
    }

    //phien ban moi
    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, "product_category", "product_id", "category_id");
    }
}
