<?php

namespace App\Services;

use App\Repositories\ManufacturerRepository;

Class ManufacturerService
{
    /**
     * @var ManufacturerRepository
     */
    private ManufacturerRepository $repo;

    /**
     * @param ManufacturerRepository $repo
     */

    public function __construct(ManufacturerRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getAll()
    {
        return $this->repo->getAll();
    }



}