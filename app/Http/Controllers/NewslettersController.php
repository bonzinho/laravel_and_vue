<?php

namespace App\Http\Controllers;

use App\Repositories\NoticiaRepository;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\NewsletterCreateRequest;
use App\Http\Requests\NewsletterUpdateRequest;
use App\Repositories\NewsletterRepository;


class NewslettersController extends Controller
{

    /**
     * @var NewsletterRepository
     */
    protected $repository;
    protected $noticiasRepository;



    public function __construct(NewsletterRepository $repository, NoticiaRepository $noticiasRepository)
    {
        $this->repository = $repository;
        $this->noticiasRepository = $noticiasRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $newsletters = $this->repository->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.newsletter.index', compact('newsletters'));
    }

    public function create(){
        $this->noticiasRepository->skipPresenter(true);
        $today = date("Y-m-d");
        $week = $this->getWeek($today);
        //dd($week);
        $noticias = $this->noticiasRepository->orderBy('order', 'asc')->findWhere([
            ['active_date','>=',date('Y').'-01-01'],
            ['week', '>=', $week-1]
        ]);
        return view('admin.newsletter.create', compact('noticias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NewsletterCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(NewsletterCreateRequest $request)
    {
        //$users_temp = explode(',', $request['email']);
        $users_temp = preg_split ('/[\s*,\s*]*,+[\s*,\s*]*/', $request['email']);
        $delete = [];
        $y = 0;
        for($x = 0; $x < count($users_temp); $x++){
            if(!filter_var($users_temp[$x], FILTER_VALIDATE_EMAIL)){
                $delete[$y] = $users_temp[$x];
                $y++;
            };
        }
        $users_temp = array_diff($users_temp, $delete);

        $request['emailArray'] = $users_temp;
        $this->repository->skipPresenter(true);
        $data = $request->all();
        $today = date("Y-m-d");
        $data['week'] = $this->getWeek($today);
        $newsletter = $this->repository->create($data);
        return redirect()->route('admin.newsletter.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newsletter = $this->repository->find($id);
        return view('admin.newsletter.show', compact('newsletter'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newsletter = $this->repository->find($id);
        return view('newsletters.edit', compact('newsletter'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  NewsletterUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(NewsletterUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $newsletter = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Newsletter updated.',
                'data'    => $newsletter->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
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
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Newsletter deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Newsletter deleted.');
    }


    private function getWeek($date){
        $dateFormat = new \DateTime($date);
        return $dateFormat->format("W");
    }

    private function verifyEmail($email){
        return filter_var( $email, FILTER_VALIDATE_EMAIL );
    }
}
