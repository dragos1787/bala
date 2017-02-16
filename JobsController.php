<?php
class JobsController extends AppController{
	public $name = 'Jobs';
	
	//Default Index Method
	public function index(){
		//Set Category Query options
	$options = array(
	   'order' => array('Category.name' => 'asc')
	);
	
	//Get categories
	$categories = $this->Job->Category->find('all', $options);
	
	//Set Categories
	$this->set('categories', $categories);
		//Set Query Options
		$options = array(
		    'order' => array('Job.created' => 'asc')
		);
		
		// Get Job Info
		$jobs = $this->Job->find('all',$options);
		
		//Set Title
	    $this->set('title_for_layout', 'JobFinds | Welcome');
		
		$this->set('jobs',$jobs);
	}
	//Browse Method
    public function browse($category = null){
		//Init Conditon Array
	    $conditions = array();
		
		// Check Keyord Filter
		if($this->request->is('post')){
			if(!empty($this->request->data('keywords'))){
				$conditions[] = array('OR' => array(
				'Job.title LIKE' => "%" .$this->request->data('keywords') . "%",
	             'Job.description LIKE' => "%" .$this->request->data('keywords') . "%"
	));
			}
		
		} 
		//State Filter
		if(!empty($this->request->data('state')) && $this->request->data('state') != 'Select State'){
			//Match State
			$contitions[] = array( 
			       'Job.state LIKE' => "%" . $this->request->data('state') . "%"
			);
		}
		
		//Category Filter
		if(!empty($this->request->data('category')) && $this->request->data('category') != 'Select Category'){
			//Match category
			$contitions[] = array( 
			       'Job.state LIKE' => "%" . $this->request->data('category') . "%"
			);
		}
		
		
	//Set Category Query options
	$options = array(
	   'order' => array('Category.name' => 'asc')
	);
	
	//Get categories
	$categories = $this->Job->Category->find('all', $options);
	
	//Set Categories
	$this->set('categories', $categories);
	
	
	
	
	 if(category != null){
	//Match Category
	$conditions[] = array(
				'Job.category_id LIKE' => "%" .$category . "%"
	 
	);
	 }
	 
	 //Set Query Options
	 $options = array(
	         'order' => array('Job.created' => 'desc'),
			 'conditions' => $conditions,
			 'limit' =>8
	 );
	 
	// Get Job Info
		$jobs = $this->Job->find('all',$options);
		
		//Set Title
	    $this->set('title_for_layout', 'JobFinds |Browse For A Job');
		
		$this->set('jobs',$jobs);
}

  

      //View single Job
	 public function view($id){
		  if(!$id){
			  throw new NotFoundExeption(__('Invalid job listing'));
			  
		  }
		  $job = $this->Job->findById($id);
		  
		  if(!$job){
		     throw new NotFoundExeption(__('Invalid job listing')); 
	  
		  }
		  
	  
	  
	  //Set Title
	  $this->set('title_for_layout',$job['Job'] ['title']);
	  
	  $this->set('job',$job);
	  }
	  
	  
	  
	 public function add(){
		 //get categories for a select list
		 $options = array(
		         'order' => array('Category.name' => 'asc')
		 );
		 //get categories
		 $categories = $this->Job->Category->find('list',$options);
		 //set categories
		 $this->set('categories',$categories);
		 
		 //get types for select list
		 $types = $this->Job->Type->find('list');
		  //set types
		 $this->set('types',$types);
		 
		  if($this->request->is('post')){
		      $this->Job->create();
			  
		 //save logget user id
		 $this->request->data['Job']['user_id'] = $this->Auth->user('id');
		 
		 
		if($this->Job->save($this->request->data)){
			$this->Session->setFlash(__('Your job has been listed'));
			return $this->redirect(array('action' => 'index'));
		}
		 
		 
		 $this->Session->setFlash(__('Unable to add your job'));
		 
			 
		 }
	 }
	 
	 public function edit($id){
		 //get categories for a select list
		 $options = array(
		         'order' => array('Category.name' => 'asc')
		 );
		 //get categories
		 $categories = $this->Job->Category->find('list',$options);
		 //set categories
		 $this->set('categories',$categories);
		 
		 //get types for select list
		 $types = $this->Job->Type->find('list');
		  //set types
		 $this->set('types',$types);
		 
		 if(!$id){
			 throw new NotFoundExeption(__('invalid job listing'));
			 
		 }
		 $job = $this->Job->findById($id);
          
		   if(!$job){
			 throw new NotFoundExeption(__('invalid job listing'));
			 
		 }
         		 
		  if($this->request->is(array('job', 'put'))){
		      $this->Job->id = $id;
			  
		
		 
		if($this->Job->save($this->request->data)){
			$this->Session->setFlash(__('Your job has been udate'));
			return $this->redirect(array('action' => 'index'));
		}
		 
		 
		 $this->Session->setFlash(__('Unable to update your job'));
		 
			 
		 }
		 
		 if(!$this->request->data){
			 $this->request->data = $job;
		 }
	 }
	 
	 //delete a job
	 
	 public function delete($id){
		 if($this->request->is('get')){
			 throw new MethodNotAllowedException();
		 }
		 if($this->Job->delete($id)){
			 $this->Session->setFlash(
					__('The job with id: %d has been deleted.',h($id))
			 );
			 return $this->redirect(array('action' => 'index'));
		 }
	 }
	 

	
	 }
	     