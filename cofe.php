<?php
/**
 * @package coffee
 * @version 1.7.2
 */
/*
Plugin Name: coffe
Plugin URI: hhttps://www.linkedin.com/in/skandarajhshyamalan/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Skandarajah shyamalan
Version: 1.7.2
Author URI: https://www.linkedin.com/in/skandarajhshyamalan/
*/
function example_form_plugin(){
    $content = '';
     $content .='<div class="mb-3 row">
     <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
     <div class="col-sm-10">
       <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
     </div>
   </div>
   <div class="mb-3 row">
     <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
     <div class="col-sm-10">
       <input type="password" class="form-control" id="inputPassword">
     </div>
   </div>
   <div class="mb-3 row">
   <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
   <div class="col-sm-10">
   <select class="form-select" aria-label="Default select example">
   <option selected>Open this select menu</option>
   <option value="1">One</option>
   <option value="2">Two</option>
   <option value="3">Three</option>
 </select>
   </div>
 </div>';
    
    return $content;
    }
    function example_form_caoture(){
        if(isset($_POST['example_form_submit'])){
            echo 'answer'.print_r($_POST).'gfh';
        }
    }
  add_shortcode('cofe_code','example_form_plugin');

  /*
  <br><form method="post" action="http://localhost/cofe_web/" class="row">
    <div class="col-md-6">
      <label for="Fist Name" class="form-label">Fist Name</label>
      <input type="text" class="form-control" name="FistName" id="Fist Name">
    </div>
    <div class="col-md-6">
      <label for="LastName" class="form-label">Your Email*</label>
      <input type="email" class="form-control" name="Email" id="Email">
    </div>
    <div class="col-12">
      <label for="inputAddress" class="form-label">How can we contact you?</label>
      <input type="text" class="form-control" name="Phone" id="inputAddress" placeholder="Phone number here">
    </div>
    <div class="col-12">
      <label for="inputAddress2" class="form-label">From when ?*</label>
      <input type="datetime-local" class="form-control" name="Date" id="inputAddress2" placeholder="Start time here">
    </div><br/>
    <div class="col-12">
    <div class="form-group">
    <label for="exampleSelect">Total Guests * </label>
    <select class="form-control" id="exampleSelect" name="Guests">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
</div>
    </div>
    <div class="col-12">
    <label for="exampleFormControlTextarea1" class="form-label">Additional Information</label>
    <textarea class="form-control" name="Information" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="col-12">
     <div class="col-6">
      <div class="row">
        <div class="col-3">
        <input class="form-check-input" type="checkbox" value="" id="reverseCheck1">
        <label class="form-check-label" name="Indoor" for="reverseCheck1"> Indoor </label>
        </div>
         <div class="col-3"><input class="form-check-input" type="checkbox" value="" id="reverseCheck1">
         <label class="form-check-label" name="Out door" for="reverseCheck1">Out door</div> 
       </div>
     </div>
    </div>
    <br><div class="col-12">
      <button type="submit" name="example_form_submit" class="btn btn-primary">BOOK A TABLE</button>
    </div>
  </form>
  */
?>