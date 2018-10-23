<?php

class Pum {    
   var $fields = array();
   function __construct() {       
      $CI=& get_instance();
      $CI->load->database();
      $type = $CI->db->get_where('business_settings',array('type'=>'pum_account_type'))->row()->value;
      $salt = $CI->db->get_where('business_settings',array('type'=>'pum_merchant_salt'))->row()->value;
      if($type == 'sandbox') {
         $this->pum_url = "https://sandboxsecure.payu.in/_payment";
      } else if($type == 'original') {
         $this->pum_url = "https://secure.payu.in/_payment";
      } 
      $this->pum_salt = $salt;    
   }
   
   function add_field($field, $value) {            
      $this->fields["$field"] = $value;
   }

   function submit_pum_post() {
      $hash = '';
      $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
      if(empty($this->fields['key'])
         || empty($this->fields['txnid'])
         || empty($this->fields['amount'])
         || empty($this->fields['firstname'])
         || empty($this->fields['email'])
         || empty($this->fields['phone'])
         || empty($this->fields['productinfo'])
         || empty($this->fields['surl'])
         || empty($this->fields['furl'])
         || empty($this->fields['service_provider'])) {
         echo 'Error!!';
      } else {
         //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
         $hashVarsSeq = explode('|', $hashSequence);
         $hash_string = '';  
         foreach($hashVarsSeq as $hash_var) {
            $hash_string .= isset($this->fields[$hash_var]) ? $this->fields[$hash_var] : '';
            $hash_string .= '|';
         }
         $hash_string .= $this->pum_salt;
         $hash = strtolower(hash('sha512', $hash_string));
         $this->add_field('hash',$hash);

         echo "<html>\n";
         //echo "<head><title>Processing Payment...</title></head>\n";
         echo "<body onLoad=\"document.forms['pum_form'].submit();\">\n";
         //echo "<body >\n";
         //echo "<center><h3>";
         //echo " Redirecting to the pum.</h3></center>\n";
         echo "<form method=\"post\" name=\"pum_form\" ";
         echo "action=\"".$this->pum_url."\">\n";

         foreach ($this->fields as $name => $value) {
            echo "<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n";
         }
           
         echo "</form>\n";
         echo "</body></html>\n";
      }
    
   }
}         


 
