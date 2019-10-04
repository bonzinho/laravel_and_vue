<?php

namespace App\Http\Controllers\Api\v1;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Repositories\InstagramRepository;

class InstagramController extends Controller
{
    /**
     * @var InstagramRepository
     */
    protected $repository;

    public function __construct(InstagramRepository $repository)
    {
        $this->repository = $repository;
        $this->repository->skipPresenter(false);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->skipPresenter(false);
        $week = (int)Carbon::createFromFormat('Y-m-d', date('Y-m-d'))->format('W');
        $totalInstagrams = count($this->repository->all());
        if($totalInstagrams > 2){
            $queryArray = [
                'week' => $week-1,
                'year' => (int)date('Y'),
            ];
            $instagram = $this->repository->findWhere($queryArray);
        }else{
            $queryArray = [
                'week' => $week,
                'year' => (int)date('Y'),
            ];
            $instagram = $this->repository->findWhere($queryArray);
        }

        return $instagram;
    }

    public function getInstagramFeedWeekYear($year, $week){
        $this->repository->skipPresenter(false);
        $queryArray = [
            'week' => $week,
            'year' => $year,
        ];
        $instagram = $this->repository->findWhere($queryArray);

        if(!$instagram['data']){
            $instagram = $this->index();
        }
        return $instagram;
    }
}
