<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\Blog\BlogServiceInterface;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;

class HomeController extends Controller
{
    private $productService;
    private $blogService;
    private $productCategoryService;


    public function __construct(ProductServiceInterface $productService,
                                BlogServiceInterface $blogService,
                                ProductCategoryServiceInterface $productCategoryService)
    {
        $this->productService = $productService ;
        $this->blogService = $blogService ;
        $this->productCategoryService = $productCategoryService;
    }

    public function index()
    {
        $categories = $this->productCategoryService->all();
        $featuredProducts = $this->productService->getFeaturedProducts();
        $blogs = $this->blogService->getLatestBlogs();

        return view('frontend.index', compact('categories','featuredProducts', 'blogs'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
