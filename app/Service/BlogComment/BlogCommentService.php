<?php

namespace App\Service\BlogComment;

use App\Repositories\BlogComment\BlogCommentRepository;
use App\Repositories\BlogComment\BlogCommentRepositoryInterface;
use App\Service\BaseService;

class BlogCommentService extends BaseService implements BlogCommentServiceInterface
{
    public $repository;

    public function __construct(BlogCommentRepositoryInterface $BlogCommentRepository)
    {
        $this->repository = $BlogCommentRepository;
    }
}
