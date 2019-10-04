<?php

namespace App\Http\Controllers\Api\v1;

use App\Criteria\FindByTagCriteria;
use App\Criteria\FindByWeekCriteria;
use App\Criteria\FindByYearCriteria;
use App\Criteria\FindMinWeekFromCurrentYearCriteria;
use App\Criteria\OrderByCreateCriteria;
use App\Criteria\OrderByOrderCriteria;
use App\Criteria\ShowByActiveDateCriteriaCriteria;
use App\Http\Controllers\Controller;
use App\Models\Noticia;
use App\Repositories\NoticiaRepository;
use Illuminate\Support\Facades\DB;

class NoticiasController extends Controller
{

    /**
     * @var NoticiaRepository
     */
    protected $repository;



    public function __construct(NoticiaRepository $repository)
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
        $week = $this->getWeek(date("Y-m-d"));
        $year = date('Y');
        $date= date('Y-01-01');

        $this->repository->pushCriteria(new FindByWeekCriteria($week))
        ->pushCriteria(new FindByYearCriteria($year))
            ->pushCriteria(new OrderByOrderCriteria())
                ->pushCriteria(new ShowByActiveDateCriteriaCriteria());
        $return['noticias'] =  $this->repository->all();
        $return['week'] = $week;
        $return['first_week'] = Noticia::distinct()->select('week')->where('active_date', '>', $date)->orderBy('week', 'asc')->pluck('week')->first();
        return $return;
    }

    public function weekNoticias($week, $year){

        if($year == date('Y') && $week > $this->getWeek(date("Y-m-d"))) {
            $year = date('Y');
            $week = $this->getWeek(date("Y-m-d"));
        }

        $this->repository->pushCriteria(new FindByWeekCriteria($week))
            ->pushCriteria(new FindByYearCriteria($year))
            ->pushCriteria(new OrderByOrderCriteria());
        $return['noticias'] =  $this->repository->all();
        $return['week'] = $week;

        if(!$return['noticias']['data']){
            $return['message'] = "Não existem notícias disponíveis nesta semana";
        }

        return $return;
    }

    public function searchByTag($tag){
        $this->repository->pushCriteria(new FindByTagCriteria($tag))
            ->pushCriteria(new OrderByCreateCriteria());
        return $this->repository->paginate();
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id){
        return $this->repository->find($id);
    }

    public function imageSlider(){
        $today = date("Y-m-d");
        $week = $this->getWeek($today);
        $this->repository->pushCriteria(new OrderByOrderCriteria());
       return $this->repository->findWhere([
           ['state', '=', '1'],
           ['week', '=', $week],
           ['active_date', '<=', date('Y-m-d')],
           ['created_at', '>=', date('Y-01-01')]
        ]);
    }

    /**
     * @param $week
     * @param $year
     */
    public function getimageSliderWeekYear($year, $week){
        $this->repository->pushCriteria(new FindByWeekCriteria($week))
            ->pushCriteria(new FindByYearCriteria($year))
            ->pushCriteria(new OrderByOrderCriteria());
        $return =  $this->repository->all();
        if($return == null){
            $this->imageSlider();
        }else{
            return $return;
        }
    }


    private function getWeek($date){
        $dateFormat = new \DateTime($date);
        return $dateFormat->format("W");
    }

}
