<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Repositories\SecondNotificacaoRepository;

class SecondDestaquesController extends Controller
{
    /**
     * @var SecondNotificacaoRepository
     */
    private $repository;


    /**
     * DestaquesController constructor.
     */
    public function __construct(SecondNotificacaoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(){
        $this->repository->skipPresenter(true);
        $destaque = $this->repository->orderBy('id', 'desc')->first();

        if($destaque['state']){
            return $destaque;
        }else{
            $destaque = null;
            return $destaque;
        }

    }

    /**
     * @param $year
     * @param $week
     * @return mixed
     */
    public function getDestaquesByWeekYear($year, $week){
        $this->repository->skipPresenter(false);
        $queryArray = [
            'week' => $week,
            'year' => $year,
        ];
        $destaques = $this->repository->orderBy('id', 'desc')->findWhere($queryArray)->first();

        if(!$destaques['data']){
            $this->index();
        }
        return $destaques;
    }
}
