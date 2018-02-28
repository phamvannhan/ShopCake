<?php

namespace App\Repositories;

use App\Models\Products;
use App\Models\ProductType;
use App\Traits\UploadPhotoTrait;
use App\Validators\ProductValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Breadcrumb;
/**
 * Class ProductRepositoryEloquent
 *
 * @package namespace App\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
    use UploadPhotoTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Products::class;
    }

    /**
     *
     * Specify Validator class name
     *
     *
     * @return mixed
     */
    public function validator()
    {

        return ProductValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getModel()
    {
        return $this->model;
    }

    public function datatable()
    {
        //$model = $this->model->all();
        $model = $this->model->select('*');//->with(['product_type']);
        return $model;
         
        /*if (!empty($input['code'])) {
            $code = trim($input['code']);
            $model->where('product.code', 'LIKE', '%' . $code . '%');
        }

        return $model->with(['categories' => function ($q) {
            $q->orderBy('product_categories.level', 'asc');
        }])->withTranslation();*/
    }

    public function store(array $input)
    {

        /*$a = Products::translatedIn('vi')->get();

        dd($a);*/

       /* $input['is_new'] = empty($input['is_new']) ? 0 : 1;
        $input['active'] = empty($input['active']) ? 0 : 1;

        //de luu en/ vi
        $locales = config('laravellocalization.supportedLocales');

        foreach ($locales as $key => $value) {
            if (empty($input[$key]['name_trans'])) {
                $input[$key]['name_trans'] = $input['name'];
            }
        }
        
        dd($input);*/
        //$product = $this->model->create($input);

        //loi khai bao phai la 1 mang
        /*if (!empty($input['id_type'])) {
            $product->product_type()->attach($input['id_type']);
        }*/

        //return $product;

    }

    public function update(array $input, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }

   

    /**
     * @param array $input
     * return 2 chars code producer + . + 4  chars code size + . + 2 chars code brand + 3 product code
     * 03.800800.01010
     */

}
