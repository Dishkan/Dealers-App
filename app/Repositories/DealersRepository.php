<?php
namespace App\Repositories;

use App\Models\Dealer;
use Validator;
use Illuminate\Support\Facades\Auth;

class DealersRepository extends Repository {
   
   public function __construct(Dealer $dealer) {
   
      $this->model = $dealer;
	  
   }
   
   	public function addDealer($request) {
	
		$data = $request->all();
		
		$dealer = $this->model->create([
            'name' => $data['name'],
            'country' => $data['country'],
            'state' => $data['state'],
            'city' => $data['city'],
            'zip' => $data['zip'],
            'user_id' => Auth::id(),
        ]);
				
	}
	
	public function updateDealer($request, $dealer) {
	
		$data = $request->except('_token');
		
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'country' => 'required|max:255',
            'state' => 'required|max:2',
            'city' => 'required|max:255',
            'zip' => 'required|max:5',
          ]);
	
        if ($validator->fails()) {
        return back()->with($data)->withErrors($validator);
      }
		
	    $dealer->fill($data)->update();
	
	   return redirect('/main')->with($data);
	}
	
	public function deleteDealer($dealer) {
	
		 $dealer->delete();
		
	}	

}


?>