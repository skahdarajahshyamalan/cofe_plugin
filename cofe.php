<?php
/**
 * @package coffee
 * @version 1.7.2
 */
/*
Plugin Name: coffe
Plugin URI: hhttps://www.linkedin.com/in/skandarajhshyamalan/
Description: This is  plugin,cofe booking 
Name: Skandarajah shyamalan
Version: 1.7.2
Name URI: https://www.linkedin.com/in/skandarajhshyamalan/
*/
require_once plugin_dir_path(__FILE__) . 'activate-plugin.php';
require_once plugin_dir_path(__FILE__) . 'deactivate-plugin.php';
register_deactivation_hook(__FILE__, 'my_custom_plugin_uninstall');
register_activation_hook(__FILE__, 'my_custom_plugin_install');





function example_form_plugin(){
  $form_action    = get_permalink();
  if ( ($_SESSION['contact_form_success']) ) {
     //print_r($_SESSION['message']);
    $contact_form_success = '<p style="color: green">Thank you for Your Messages.</p>';
    unset($_SESSION['contact_form_success']);
    //unset($_SESSION['message']);
    }
  
    $markup = <<<EOT

    <div id="cform">
    
      {$contact_form_success}
         
       <form onsubmit="return validateForm(this);" action="{$form_action}" method="post" enctype="multipart/form-data" style="text-align: left"><div class="mb-3 row">
       <label for="your_name" class="col-sm-2 col-form-label fs-5">Name</label>
       <div class="col-sm-10">
         <input type="text" require class="form-control" id="Name" name="name" placeholder="Your Name">
       </div>
     </div>
     <div class="mb-3 row">
       <label for="Email" class="col-sm-2 col-form-label fs-5">Email</label>
       <div class="col-sm-10">
         <input type="text" require class="form-control" placeholder="Your Email" name="Email" id="Email">
       </div>
     </div>
     <div class="mb-3 row">
       <label for="Phone" class="col-sm-2 col-form-label fs-5">Phone</label>
       <div class="col-sm-10">
         <input type="text" class="form-control" name="Phone" placeholder="Your Phone" id="Phone">
       </div>
     </div>
     <div class="mb-3 row">
       <label for="inputPassword" class="col-sm-2 col-form-label fs-5">From when? </label>
       <div class="col-sm-10 fs-5">
         <input type="datetime-local" class="form-control" name="date_time" placeholder="Your Date" id="date_time">
       </div>
     </div>
     <div class="mb-3 row">
     <label for="inputPassword" class="col-sm-2 col-form-label fs-5 placeholder="Guests">Guests</label>
     <div class="col-sm-10">
     <select class="form-control" aria-label="Default select example" name="Guests" id="Guests">
     <option value="1">1</option>
     <option value="2">2</option>
     <option value="3">3</option>
     <option value="4">4</option>
     <option value="5">5</option>
     <option value="6">6</option>
     <option value="7">7</option>
     <option value="8">8</option>
     <option value="9">9</option>
     <option value="10">10</option>
     </select>
     </div>
     <div class="mb-3 row">
     <label for="inputPassword" class="col-sm-2 col-form-label fs-5">Des</label>
     <div class="col-sm-10">
     <textarea class="form-control" name="Des" id="Des" name="Des" placeholder="Des" placeholder="Description" id="exampleFormControlTextarea1" rows="3"></textarea>
     </div>
     </div>
     <div class="mb-3 row">
     <label for="inputPassword" class="col-sm-2 col-form-label fs-5"></label>
     <div class="col-sm-10">
     <div class="row">
     <div class="col-3">
     <input class="form-check-input" type="checkbox" value="1" name="Indoor" id="Indoor">
     <label class="form-check-label" name="Indoor" for="reverseCheck1"> Indoor </label>
     </div>
      <div class="col-3"><input class="form-check-input" value="1" type="checkbox" name="Outdoor" id="Outdoor">
      <label class="form-check-label" name="Out door" id="Outdoor" for="reverseCheck1">Out door</div> 
    </div>
     </div>
     </div>
     </div>
     <div class="col-12">
       <label for="inputPassword" class="col-sm-2 col-form-label fs-5"></label>
       <button type="submit" id="send" name="send" class="btn btn-primary">BOOK A TABLE</button>
      </div>
    </div>  
     
    <input type="hidden" name="contact_form_submitted" value="1">
       </form>
       
    </div>
    
    EOT;
    
    return $markup;
   
    }
    function contact_form_js() { ?>

      <script type="text/javascript">
      function validateForm(form) {
      
        var errors = '';
         
        var regexpEmail = /\w{1,}[@][\w\-]{1,}([.]([\w\-]{1,})){1,3}$/;
         if (!regexpEmail.test(form.Email.value)) errors += "Error :  your e-mail address format incorrect.\n";
         if (form.Name.value.trim() === '') { errors += "Error: Full name cannot be empty.\n"; }
         if (errors != '') { alert(errors); return false;  }
           return true;     
      }
      </script>
      
      <?php }
   
  add_shortcode('cofe_code','example_form_plugin');
  add_action('wp_head', 'contact_form_js');
  function contact_form_process() {
    session_start();
    if ( !isset($_POST['contact_form_submitted']) ) return;
    $Name  = ( isset($_POST['Name']) )  ? trim(strip_tags($_POST['Name'])) : null;
    $email   = ( isset($_POST['Email']) )   ? trim(strip_tags($_POST['Email'])) : null;
    $Phone = ( isset($_POST['Phone']) ) ? trim(strip_tags($_POST['Phone'])) : null;
    $date_time = ( isset($_POST['date_time']) ) ? trim(strip_tags($_POST['date_time'])) : null;
    $Guests = ( isset($_POST['Guests']) ) ? trim(strip_tags($_POST['Guests'])) : null;
    $Des = ( isset($_POST['Des']) ) ? trim(strip_tags($_POST['Des'])) : null;//
    $Indoor = ( isset($_POST['Indoor']) ) ? trim(strip_tags($_POST['Indoor'])) : null;
    $Outdoor = ( isset($_POST['Outdoor']) ) ? trim(strip_tags($_POST['Outdoor'])) : null;
    
    $to = trim(strip_tags($_POST['Email']));
    $subject = 'Cafe Brontos Booking Confirmationamalan';
    $message = "We are thrilled to confirm your reservation at Brontos.
    We are looking forward to welcoming you to Brontos and providing you with a delightful dining experience. Should you have any additional requests or questions, feel free to reach out to us.
    
    Thank you for choosing Cafe Brontos. We appreciate your business and can't wait to serve you.
    
    Team Brontos";
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $to_1 = 'skandarajah.shyamalan@gmail.com'; 
    $subject_1 = 'Admin Message';
    $message_1 = 'Reservation Name  :'.$_POST['name'].' <br/> Date :'.$_POST['date_time'].' <br/> Number of Guests:'.$_POST['Guests'].'<br/> Special comment : '.$_POST['Des'].'' ;

    $result = wp_mail($to_1, $subject_1, $message_1, $headers);
    $result = wp_mail($to, $subject, $message, $headers);
    insert_row_into_custom_table(
      $_POST['name'],
       $_POST['Email'],
       $_POST['Phone'],
       $_POST['date_time'],
       $_POST['Guests'],
       $_POST['Des'],
       $_POST['Indoor'],
       $_POST['Outdoor'],
      );
        
    //$_SESSION['message']=$_POST;
    $_SESSION['contact_form_success'] = 1;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
  }
  
function insert_row_into_custom_table($name, $email,$phone,$date_time,$Guests,$Des,$Indoor,$Outdoor) {
  global $wpdb;
 $table_name = $wpdb->prefix . 'cofebook';
 $data = array(
      'fullname'  => $name,
      'email' => $email,
      'phone' => $phone,
      'date_time' => $date_time,
      'guests' => $Guests,
      'descript' => $Des,
      'indor' => $Indoor,
      'outdor' => $Outdoor,
      
  );

  // Data format (in case you have different data types)
  $data_format = array('%s', '%s','%s');

  // Insert data into the table
  $wpdb->insert($table_name, $data, $data_format);

  // Check if the insertion was successful
  if ($wpdb->last_error) {
      return false;
  }

  return true;
}






  add_action('init', 'contact_form_process');
  

 
 
?>