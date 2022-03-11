<?php

namespace App\Services;

use App\Repositories\SubCategoryRepository;

Class SubCategoryService
{
    /**
     * @var SubCategoryRepository
     */
    private SubCategoryRepository $repo;

    /**
     * @param SubCategoryRepository $repo
     */

    public function __construct(SubCategoryRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getAllWithCategories()
    {
        return $this->repo->getAllWithCategories();
    }



}

