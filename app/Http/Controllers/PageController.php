<?php

namespace App\Http\Controllers;

use App\Helper\TranslateUrl;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Products;
use App\Models\ProductType;
//use App\Cart;
use Session;
use App\Models\Customer;//sử dụng để lưu TT khách hàng
use App\Models\Bill; 
use App\Models\BillDetail;

class PageController extends Controller
{

    protected $category;

    public function __construct( ProductRepository $product, 
            ProductCategoryRepository $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function getIndex()
    {
        $slide = Slide::all(); 
        $new_sanpham = Products::paginate(4);
        $sp_khuyenmai = Products::where('promotion_price','<>',0)->paginate(8);
    	return view('frontend.page.trangchu',compact('slide','new_sanpham','sp_khuyenmai','loaisp'));
    }
    public function getLoaisp($type) 
    {
        $sp_theoloai = Products::where('id_type',$type)->get();

        $sp_khac = Products::where('id_type','<>',$type)->paginate(6);

        $loaisp = ProductType::all();

        //$category = $this->category->getCategoryBySlug($slug, ['children'], 0);

        $loaisp_ten = ProductType::where('id',$type)->first();

        // translation url
       // $locales = \LaravelLocalization::getSupportedLanguagesKeys();

    	return view('frontend.page.loai_sanpham',compact('sp_theoloai','sp_khac','loaisp','loaisp_ten'));
    }

    public function category($slug)
    {
        Banner::getBanner('products');

        $categories = $this->category->getCategories(0);

        $category = $this->category->getCategoryBySlug($slug, ['children', 'catalogues'], 0);

        // translation url
        $locales = \LaravelLocalization::getSupportedLanguagesKeys();

        foreach ($locales as $key) {
            TranslateUrl::add($key, 'routes.product_category', ['category_slug' => $category->{"slug:{$key}"}]);
        }

        Banner::getBanner($category->{"slug:en"});

        if ($category->style) {
            return view(
                "frontend.product.category.{$category->style}", compact(
                    'categories',
                    'category',
                    'slug'
                )
            );
        }
        abort(404);
    }


     public function getChiTiet($id)
    {
        $sanpham = Products::where('id',$id)->first();
        $sp_khac = Products::where('id_type','<>',$sanpham->id_type)->paginate(3);
    	return view('frontend.page.chitiet_sanpham',compact('sanpham','sp_khac'));
    }
    public function getLienHe()
    {
        return view('frontend.page.lienhe');
    }
    public function getGioiThieu()
    {
        return view('frontend.page.gioithieu');
    }
    
    //chức năng tìm kiếm trong tin
    public function getSearch(Request $req)
    {
        //lấy từ mà khách hàng tìm kiếm
        $tukhoa = $req->tukhoa;
        $product = Products::where('name','like',"%$tukhoa%")->orWhere('id_type','like',"%$tukhoa%")->orWhere('unit_price','like',"%$tukhoa%")->orWhere('promotion_price','like',"%$tukhoa%")->take(30)->paginate(8);
        return view('frontend.page.timkiem',compact('product'));
    }
    
    public function About_us()
    {
        echo 've chung toi';
    }
    
}
