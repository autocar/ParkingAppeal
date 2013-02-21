<?php

class Appeal_Controller extends Base_Controller {


	public $restful = true;

	public function __construct()
	{
    	$this->filter('before','isMaristUser');
	}


	//build our index page when requested
	public function get_index()
	{
		
		$view = View::make('appeal.index');
		$view->url = URL::to_action('appeal@new');
		$view->title = "Appeals Dashboard";
		return $view;

		// echo "Hello! Welcome to the user management page!";
		// $url = URL::to_action('appeal@new');
		// echo "\nIf you would like to submit a new parking ticket appeal, please go here: <a href='{$url}'>New Appeal</a>
	}

	//show the form to submit a new appeal
	public function get_new()
	{
		$view = View::make('appeal.new');
		$view->title = "New Appeal";
		return $view;

	}

	//review the data submitted for a new appeal and then insert into the database
	public function post_new()
	{
		$input = Input::all(); //grab our input

		$rules = array(
			'name'              => 'required|alpha',
			'lastName'          => 'required|alpha',
			'permit'            => 'required|min:2',
			'lot'               => 'required|integer',
			'msc'               => 'integer',
			'ticket'            => 'required|min:2|unique:tickets,ticketID',
			'licensePlate'      => 'required|alpha_num',
			'licensePlateState' => 'required|max:2',
			'dateIssued'        => 'required',
			'violations'        => 'required',
			'areaOfViolation'   => 'required|alpha_num',
			'appealLetter'      => 'required|max:600',
		); //validation rules

		
		$validation = Validator::make($input, $rules); //let's run the validator


		if ($validation->fails())
    	{
        	return Redirect::to('appeal/new')->with_errors($validation)->with_input();
    	}

    	//hashing the name of the file uploaded for security sake
    	//then we'll be dropping it into the public/uploads file

    	//get the file extension
    	$extension = File::extension($input['appealLetter']['name']);
    	//encrypt the file name
    	$file = Crypter::encrypt($input['appealLetter']['name'].time());
    	//for when the crypter likes to put slashes in our scrambled filname
    	$file = preg_replace('#/+#', '', $file);

    	//concatenate extension and filename
    	$filename = $file. "." .$extension;
    	Input::upload('appealLetter', path('public').'uploads/', $filename);


    	//inserts the form data into the database assuming we pass validation
		Appeal::create(array(
			'name'              => Input::get('name'),
			'lastName'          => Input::get('lastName'),
			'permitNumber'      => Input::get('permit'),
			'assignedLot'       => Input::get('lot'),
			'MSC'               => Input::get('msc'),
			'ticketID'          => Input::get('ticket'),
			'licensePlate'      => Input::get('licensePlate'),
			'licensePlateState' => Input::get('licensePlateState'),
			'dateIssued'        => Input::get('dateIssued'),
			'violations'        => Input::get('violations'),
			'areaOfViolation'   => Input::get('areaOfViolation'),
			'letterlocation'	=> URL::to('uploads/'.$filename),
			'CWID'              => Session::get('cwid')
			));
		

		return Redirect::to('appeal/')
			->with('alertMessage', 'Appeal submitted successfully.');
		
	}

	//list out all the appeals a specific CWID has
	//only lists the appeals that are associated with the logged-in CWID
	public function get_myappeals(){
		
		$cwid = Session::get('cwid');

		$appeals = Appeal::where('CWID', '=', $cwid)->get();

		$view = View::make('appeal.myappeals')
				->with('appeals', $appeals);
		$view->title = "My Appeals";
		return $view;
	}



	//list out details of a selected appeal. This is restricted to only appeals associated with a CWID. 
	//For example:
	//If an appeal had the CWID 1001 attached to it, a user with the CWID 1002 would be unable to view the appeal.
	public function get_review($ticketID){

		
		$appeals = Appeal::where('ticketID', '=', $ticketID)->first();
		$rulings = Ruling::where('ticketID', '=', $ticketID)->first();


		if(Session::get('cwid') == $appeals->cwid){
			// echo "You have access to this ticket! Hooray!<br>";
			// echo "The ticket id of this ticket is ".$appeals->ticketid;

			$denyReasonsArray = array('none' => '', 'incomplete' => 'Incomplete/Illegible', 'past' => 'Past Due', 'nobasis' => 'No Basis for Appeal', 'insufficient' => 'Insufficient Evidence', 'other' => 'Other (specify)');

			if(!empty($rulings)){
				$view = View::make('appeal.review')
					->with('appeals', $appeals)
					->with('rulings', $rulings)
					->with('denyReason', $denyReasonsArray[$rulings->denyreason]);
				$view->title = "Review Appeal";	
			}else{
				$view = View::make('appeal.review')
					->with('appeals', $appeals)
					->with('rulings', $rulings);
				$view->title = "Review Appeal";		
			}


		return $view;
			
		}else{
			return Redirect::to('appeal/')
				->with('alertMessage', 'You do not have access to that ticket.');

		}

	}

	public function get_help(){

		$view = View::make('appeal.help')
				->with('title', 'Help / FAQs');

		return $view;
	}


}