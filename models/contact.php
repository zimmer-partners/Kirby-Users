<?php 
  
/**
* Basic Contact page model
*/

class ContactPage extends Page {
  
  public function __construct($parent, $dirname) {
    
    parent::__construct($parent, $dirname);
    
    $result = array(
      'error' => false,
      'message' => false,
    );
  
    if(!$this->site->user()) {
      go($this->parent());
    } else {
      if (r::is('post')) {
        if (get('submit')) {
          if ($this->contact_data_file()->isEmpty()) {
            $result['error'] =  'No data file provided. Your submission was lost. Please contact the administrator.';
          } else {
            $data_file = $this->root . DS . $this->contact_data_file()->or('data.php');
            // Load existing data
            if (!(f::exists($data_file) && is_array($data = data::read($data_file)))) {
              // Create a new file
              $data = array();
            }
            $record = r::data();
            $record['date'] = strftime("%d.%m.%Y %H:%M:%S", time());
            $data[] = $record;
            data::write($data_file, $data);
            $result['message'] = 'Your submission was accepted. Thank you.';
          }
        } else {
          $result['error'] = 'Your submission was somehow screwed. Please try again or contact the administrator.';
        } 
      } else {
        $result['message'] = 'Please fill out the form below.';
      }
    }
    
    // Compile Pseudo-Fields
    
    foreach ($result as $key => $value) {
      $this->content()->data[$key] = new Field($this, $key, trim($value));
    }
    
  }
  
}