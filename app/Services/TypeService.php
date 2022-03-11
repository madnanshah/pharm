<?php

namespace App\Services;

use App\Repositories\TypeRepository;

Class TypeService
{
    /**
     * @var TypeRepository
     */
    private TypeRepository $repo;

    /**
     * @param TypeRepository $repo
     */

    public function __construct(TypeRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getAll()
    {
        return $this->repo->getAll();
    }
}

