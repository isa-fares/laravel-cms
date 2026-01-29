<?php

namespace App\Services;

use App\Repositories\SliderRepository;
use App\Services\Base\BaseService;

class SliderService extends BaseService
{
    public function __construct(SliderRepository $sliderRepository)
    {
        parent::__construct($sliderRepository);
    }
}
