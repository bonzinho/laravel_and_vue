<?php

namespace App\Http\Controllers\Api\v1;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Repositories\EventoRepository;


class EventosController extends Controller
{

    /**
     * @var EventoRepository
     */
    protected $repository;



    public function __construct(EventoRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->skipPresenter(false);
        $currentWeek = Carbon::now()->weekOfYear;
        $currentYear = Carbon::now()->format('Y');
        $eventos = $this->repository->with('week_events')->orderBy('order', 'asc')->findWhere(['week' => $currentWeek, 'year' => $currentYear]);
        return $eventos;
    }


    /**
     * @param $year
     * @param $week
     * @return mixed
     */
    public function getEventsByWeekYear($year, $week){
        $this->repository->skipPresenter(false);
        $queryArray = [
            'week' => $week,
            'year' => $year,
        ];
        $eventos = $this->repository->with('week_events')->orderBy('order', 'asc')->findWhere($queryArray);

        if(!$eventos['data']){
            $this->index();
        }
        return $eventos;
    }
}
