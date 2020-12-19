<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DealersRepository;
use App\Models\Dealer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Http\Requests\DealersRequest;
use App\Models\User;


class SiteController extends Controller
{

    protected $dealers_repos;
	
    protected $template;
	
	protected $content = FALSE;
	    
    protected $title;
    
    protected $vars;
	
	public function __construct(DealersRepository $dealers_repos) {
		
		$this->dealers_repos = $dealers_repos;
		
		$this->template = 'mydealers';
		
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	
        $this->title = 'My dealers';
		
        $user_id = Auth::id();
		
        $dealers = $this->getDealers();
        $this->content = view('mydealers_content')->with(['dealers' => $dealers, 'user_id' => $user_id])->render();
       
        
        return $this->renderOutput(); 
    }
	
	public function renderOutput() {
	
	$this->vars = Arr::add($this->vars,'title',$this->title);
	
	$this->vars = Arr::add($this->vars,'content',$this->content);
			
	return view($this->template)->with($this->vars);
	
	}
	
	public function getDealers()
	
    {
        return $this->dealers_repos->get('*');   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->title = "Add a new dealer";
					
		$this->content = view('mydealers_create_content')->render();
		
		return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DealersRequest $request)
    {
	
        $result = $this->dealers_repos->addDealer($request);
		
		if(is_array($result) && !empty($result['error'])) {
			return back()->with($result);
		}
		
		return redirect('/main');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dealer $dealer)
    {
				
		$this->title = 'Update dealers'. $dealer->title;
		
		$this->content = view('mydealers_create_content')->with(['dealer' => $dealer])->render();
		
		return $this->renderOutput();
		
		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dealer $dealer)
    {
        return $this->dealers_repos->updateDealer($request, $dealer);
		      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Dealer $dealer)
    {
        $result = $this->dealers_repos->deleteDealer($dealer);
		if(is_array($result) && !empty($result['error'])) {
			return back()->with($result);
		}
		
		return redirect('/main');
    }
}
