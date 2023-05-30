<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Brand\BrandRepositoryInterface;
use App\Repositories\ProductCategory\ProductCategoryRepositoryInterface;
use App\Repositories\ProductComment\ProductCommentRepositoryInterface;
use App\Service\Product\ProductServiceInterface;



class ShopController extends Controller
{

    private $productService;
    private $productCommentService;
    private $productCategoryService;
    private $brandService;

    public function __construct(ProductServiceInterface $productService,
                                ProductCommentRepositoryInterface $productCommentService,
                                ProductCategoryRepositoryInterface $productCategoryService,
                                BrandRepositoryInterface $brandService)
    {
        $this->productService = $productService;
        $this->productCategoryService = $productCategoryService;
        $this->productCommentService = $productCommentService;
        $this->brandService = $brandService;

    }
    public function show($id)
    {
        $categories = $this->productCategoryService->all();
        $brands = $this->brandService->all();
        $product = $this->productService->find($id);
        $relatedProducts = $this->productService->getRelatedProducts($product);

        return view('frontend.shop.show', compact('product','relatedProducts', 'categories', 'brands'));
    }

    public function postComment(Request $request)
    {
        $this->productCommentService->create($request->all());
        return redirect()->back();
    }


    public function index(Request $request)
    {
        $categories = $this->productCategoryService->all();
        $brands = $this->brandService->all();
        $products = $this->productService->getProductOnIndex($request);
        return view('frontend.shop.index', compact('products', 'categories', 'brands'));
    }

    public function category($categoryName, Request $request)
    {
        $categories = $this->productCategoryService->all();
        $brands = $this->brandService->all();
        $products = $this->productService->getProductByCategory($categoryName, $request);

        return view('frontend.shop.index', compact('products', 'categories', 'brands'));
    }
}
