<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Repositories\BlogComment\BlogCommentRepositoryInterface;
use App\Service\Blog\BlogServiceInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogService;
    private $blogCommentService;
    public function __construct(BlogServiceInterface $blogService,
                                BlogCommentRepositoryInterface $blogCommentService)
    {
        $this->blogService = $blogService;
        $this->blogCommentService = $blogCommentService;

    }
    public function index()
    {
        $blogs = $this->blogService->all();
        $latest_blog = $this->blogService->getLatestBlogs();
        return view('frontend.blog.index', compact('blogs','latest_blog'));
    }
    public function show($id)
    {
        $blog = $this->blogService->find($id);

        return view('frontend.blog.detail', compact('blog'));
    }

    public function postComment(Request $request)
    {
        $this->blogCommentService->create($request->all());
        return redirect()->back();
    }
}
