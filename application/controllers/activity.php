<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends CI_Controller {
	
	public function index() {
		$this->activityList(16, true);
		
	}
	
	//I'm thinking most likely the activity list won't be used in a single page. 
	//So let me know I'll update so that it sets a marker to show that the list exist then leaves the data in the $data array
	public function activityList($id, $friendsActivity = false) 
	{
		$this->load->model('activity_model');
		
		if($friendsActivity)
			$activityList = $this->activity_model->fetchFriendsActivity($id);
		else
			$activityList = $this->activity_model->fetchActivity($id);
		$data['listExist'] = false;
		
		if($activityList) {
			$processedList = array();
			foreach ($activityList->result() as $row ) {
				
				/*
				ADD_FRIEND
				REMOVE_FRIEND
				
				ADD_DESIGN
				COMMENT_DESIGN
				PURCHASE_DESIGN
				RATE_DESIGN
				*/
				
				//switch between cases. 
				//fetch related design name/username.
				//prepare message to display includes html link tags
				$currentRow = $row->type;
				if($friendsActivity) 
					$friendsName = $this->activity_model->fetchName($row->customer_id);
				if($currentRow == 'ADD_FRIEND' || $currentRow == 'REMOVE_FRIEND' ) {
					$name = $this->activity_model->fetchName($row->affected_id);
					$message;
					
					if($name != false) {
						if ($currentRow == 'ADD_FRIEND')
							$message = "Added";
						else 
							$message = "Removed";
						if($friendsActivity) 
							$message = $friendsName ." ". strtolower($message);
						$message = $message." <a href='".site_url('user/'.$row->affected_id)."'>$name</a> as friend.";
						array_push($processedList, $message);
					}
					
				} else {
					$title = $this->activity_model->fetchDesignTitle($row->affected_id);
					$message;
					
					if($title != false) {
						if($currentRow == 'ADD_DESIGN')
							$message = 'Uploaded';
						else if ($currentRow == 'COMMENT_DESIGN')
							$message = 'Commented on';
						else if ($currentRow == 'PURCHASE_DESIGN')
							$message = 'Purchased';
						else
							$message = 'Rated';

						if($friendsActivity) 
							$message = $friendsName ." ". strtolower($message);
						$message = $message." the design <a href='".site_url('design/'.$row->affected_id)."'>$title</a>.";
						array_push($processedList, $message);
					}
				}
			}
			$data['activity'] = $processedList;
			$data['listExist'] = true;
			$data['main_content'] = 'activity_demo';
			
		} else {
			$data['message_title'] = "Can't get list of activity";
			$data['message'] = "READ THE TITLE";
			$data['main_content'] = "message";
		}
		
		$this->load->view('includes/template', $data);
	}	
}

?>