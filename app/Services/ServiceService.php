<?php

namespace App\Services;

use App\Repositories\ServiceRepository;
use App\Services\Base\BaseService;

class ServiceService extends BaseService
{
    public function __construct(ServiceRepository $serviceRepository)
    {
        parent::__construct($serviceRepository);
    }
}
