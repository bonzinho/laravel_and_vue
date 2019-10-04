<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Criteria\FindInstaFeedByWeekCriteria;
use App\Http\Requests\InstagramCreateRequest;
use App\Repositories\InstagramRepository;

use Vinkla\Instagram\Instagram;


class InstagramsController extends Controller
{

    /**
     * @var InstagramRepository
     */
    protected $repository;

    public function __construct(InstagramRepository $repository)
    {
        $this->repository = $repository;
        $this->repository->skipPresenter(true);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $url = 'https://api.instagram.com/v1/users/1738376960/media/recent?access_token=1738376960.1c80dd9.a16909818da948289d0ec6cb3ad23c31';
        $response = $client->get($url);
        $items = json_decode((string) $response->getBody(), true)['data'];
        $week = Carbon::createFromFormat('Y-m-d',date("Y-m-d"))->format('W');
        $feedSelecionado = $this->repository->pushCriteria(new FindInstaFeedByWeekCriteria($week))->first();
        return view('admin.instagram.index', compact('items', 'week', 'feedSelecionado'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  InstagramCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(InstagramCreateRequest $request){
        $today = date("Y-m-d");
        $week = Carbon::createFromFormat('Y-m-d', $today)->format('W');
        $data = $request->all();
        $data['week'] = (int)$week;
        $data['year'] = (int)date('Y');

        $arrayFindFotoOfWeek = [
          'week' => $data['week'], 'year' => $data['year'],
        ];
        $validation = $this->repository->findWhere($arrayFindFotoOfWeek);
        if(!$validation->count()){
            $this->repository->create($data);
            Toast()->green('Feed Selecionado da semana {{$data["week"]}} selecionado com sucesso', 'green' ,'Instagram feed');
        }else{
            Toast()->red('Feed istagram já selecionado para esta semana', 'red' ,'Instagram feed');
        }
        return redirect()->route('admin.instagram.index');
    }

    public function listFeeds(){
        $list = $this->repository->paginate(15);
        return view('admin.instagram.list', compact('list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $week = Carbon::createFromFormat('Y-m-d', date("Y-m-d"))->format('W');
        $delete = $this->repository->delete($id);
        if($delete){
            Toast()->green('Feed, da semana ' . $week . ', removido, por favor selecione um novo', 'green' ,'Instagram feed');
        }else{
            Toast()->red('Erro, por favor tente novamente', 'red' ,'Instagram feed');
        }
        return redirect()->route('admin.instagram.index');
    }


}
