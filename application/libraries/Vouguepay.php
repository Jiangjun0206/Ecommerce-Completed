<?php
/*******************************************************************************
 *                      PHP vouguepay IPN Integration Class
 *******************************************************************************
 *      Author:     Md. Moinuddin Kadir
 *      Email:      kadir_bm@yahoo.com
 *
 *      File:       vouguepay.class.php
 *      Copyright:  (c) 2015 - Md Moinuddin Kadir
 *
 *******************************************************************************
 *  DESCRIPTION:
 *
 *      NOTE: See www.micahcarrick.com for the most recent version of this class
 *            along with any applicable sample files and other documentaion.
 *
 *      This file provides a neat and simple method to interface with vouguepay and
 *      The vouguepay Instant Payment Notification (IPN) interface.  This file is
 *      NOT intended to make the vouguepay integration "plug 'n' play". It still
 *      requires the developer (that should be you) to understand the vouguepay
 *      process and know the variables you want/need to pass to vouguepay to
 *      achieve what you want.  
 *
 *      This class handles the submission of an order to vouguepay aswell as the
 *      processing an Instant Payment Notification.
 *  
 *      This code is based on that of the php-toolkit from vouguepay.  I've taken
 *      the basic principals and put it in to a class so that it is a little
 *      easier--at least for me--to use.  The php-toolkit can be downloaded from
 *      http://sourceforge.net/projects/vouguepay.
 *      
 *      To submit an order to vouguepay, have your order form POST to a file with:
 *
 *          $p = new vouguepay;
 *          $p->add_field('business', 'somebody@domain.com');
 *          $p->add_field('first_name', $_POST['first_name']);
 *          ... (add all your fields in the same manor)
 *          $p->submit_vouguepay_post();
 *
 *      To process an IPN, have your IPN processing file contain:
 *
 *          $p = new vouguepay;
 *          if ($p->validate_ipn()) {
 *          ... (IPN is verified.  Details are in the ipn_data() array)
 *          }
 *
 *
 *      In case you are new to vouguepay, here is some information to help you:
 *
 *      1. Download and read the Merchant User Manual and Integration Guide from
 *         http://www.vouguepay.com/en_US/pdf/integration_guide.pdf.  This gives 
 *         you all the information you need including the fields you can pass to
 *         vouguepay (using add_field() with this class) aswell as all the fields
 *         that are returned in an IPN post (stored in the ipn_data() array in
 *         this class).  It also diagrams the entire transaction process.
 *
 *      2. Create a "sandbox" account for a buyer and a seller.  This is just
 *         a test account(s) that allow you to test your site from both the 
 *         seller and buyer perspective.  The instructions for this is available
 *         at https://developer.vouguepay.com/ as well as a great forum where you
 *         can ask all your vouguepay integration questions.  Make sure you follow
 *         all the directions in setting up a sandbox test environment, including
 *         the addition of fake bank accounts and credit cards.
 * 
 *******************************************************************************
*/

class Vouguepay {
    
   var $last_error;                 // holds the last error encountered
   
   var $ipn_log;                    // bool: log IPN results to text file?
   
   var $ipn_log_file;               // filename of the IPN log
   var $ipn_response;               // holds the IPN response from vouguepay   
   var $ipn_data = array();         // array contains the POST values for IPN
   
   var $fields = array();           // array holds the fields to submit to vouguepay

   
   function vouguepay() {
       
      // initialization constructor.  Called when class is created.
      $CI=& get_instance();
      $CI->load->database();
      /*
      $type = $CI->db->get_where('business_settings',array('type'=>'vouguepay_type'))->row()->value;
      if($type == 'sandbox') {
         $this->vouguepay_url = 'https://www.sandbox.vouguepay.com/cgi-bin/webscr';
      } else if($type == 'original') {
         $this->vouguepay_url = 'https://www.vouguepay.com/cgi-bin/webscr';
      }
      */
      $this->vouguepay_url = 'https://voguepay.com/pay/';

      $this->last_error = '';
      
      $this->ipn_log = true; 
      $this->ipn_response = '';
      
      // populate $fields array with a few default values.  See the vouguepay
      // documentation for a list of fields and their data types. These defaul
      // values can be overwritten by the calling script.
        
      // Return method = POST
      //$this->add_field('rm','2');   
      //$this->add_field('cmd','_xclick'); 
      
   }
   
   function add_field($field, $value) {
      
      // adds a key=>value pair to the fields array, which is what will be 
      // sent to vouguepay as POST variables.  If the value is already in the 
      // array, it will be overwritten.
            
      $this->fields["$field"] = $value;
   }

   function submit_vouguepay_post() {
 
      // this function actually generates an entire HTML page consisting of
      // a form with hidden elements which is submitted to vouguepay via the 
      // BODY element's onLoad attribute.  We do this so that you can validate
      // any POST vars from you custom form before submitting to vouguepay.  So 
      // basically, you'll have your own form which is submitted to your script
      // to validate the data, which in turn calls this function to create
      // another hidden form and submit to vouguepay.
 
      // The user will briefly see a message on the screen that reads:
      // "Please wait, your order is being processed..." and then immediately
      // is redirected to vouguepay.

      echo "<html>\n";
      //echo "<head><title>Processing Payment...</title></head>\n";
      echo "<body onLoad=\"document.forms['vouguepay_form'].submit();\">\n";
      //echo "<center><h3>";
      //echo " Redirecting to the vouguepay.</h3></center>\n";
      echo "<form method=\"post\" name=\"vouguepay_form\" ";
      echo "action=\"".$this->vouguepay_url."\">\n";

      foreach ($this->fields as $name => $value) {
         echo "<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n";
      }
        
      echo "</form>\n";
      echo "</body></html>\n";
    
   }

   function validate_ipn(){
      if (isset($_POST['transaction_id'])) {
         $transaction_id = $_POST['transaction_id'];
         $json = file_get_contents('https://voguepay.com/?v_transaction_id='.$transaction_id.'&type=json&demo=true ');
         return json_decode($json,true);
      }
   }

}         


 
