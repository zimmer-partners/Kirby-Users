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
          if ($this->content()->get('contact_data_file')->isEmpty()) {
            $result['error'] =  (String) $this->content()->get('contact_message_no_file')->or('No data file provided. Your submission was lost. Please contact the administrator.');
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
            $result['message'] = (String) $this->content()->get('contact_message_success')->or('Your submission was accepted. Thank you.');
          }
        } else {
          $result['error'] = (String) $this->content()->get('contact_message_failed')->or('Your submission was somehow screwed. Please try again or contact the administrator.');
        } 
      } else {
        $result['message'] = $this->content()->get('contact_message_fillout')->or('Please fill out the form below.');
      }
    }
    
    // Compile Pseudo-Fields
    
    foreach ($result as $key => $value) {
      $this->content()->data[$key] = new Field($this, $key, trim($value));
    }
    
  }
  
}