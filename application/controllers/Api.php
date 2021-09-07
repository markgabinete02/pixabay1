<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api extends CI_Controller
{
    public function index()
    {
        $data["new_tags"]="";
        $this->load->view('dash', $data);
    }

    public function callapi()
    {
        /* API URL */
        $query = $this->input->post('img_search');
        $query = str_replace(' ', '+', $query);
        $meth = $this->input->post('type');;
        $type = "api/videos";
        $tag = 'iframe';
        if ($meth=="Images") {
            $type = "api";
            $tag = 'img';
        }
        // $query ="yellow flower";
        $url = 'https://pixabay.com/'.$type.'/?key=23268132-a0000fd3891006d97635fa5c4&q='.$query;
             
        /* Init cURL resource */
        $ch = curl_init($url);
            
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
           
        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type:application/json',
                ));
            
        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $arr = json_decode(curl_exec($ch));
        $check = sizeof($arr->hits);
      
        if ($check == 0) {
            $data["new_tags"]="<H1> NO DATA FOUND PLEASE TRY AGAIN </H1>";
            curl_close($ch);
            $this->load->view('dash', $data);
        }else{
             /* execute request */
             for ($x = 0; $x < 16; $x++) {
                 if ($meth=="Images") {
                     $data[$meth.$x] = $arr->hits[$x]->webformatURL;
                 }else if ($meth=="Videos"){
                     $data[$meth.$x] = $arr->hits[$x]->videos->medium->url;   
                 }
             }
             /* close cURL resource */
             $data_tag["new_tags"] = "<div class='row' style='margin-bottom:100px;'><div class='column'>";
             for ($x = 0; $x < 16; $x++) {
                 $data_tag["new_tags"] .= '<'.$tag.' width="320" height="245" src='.$data[$meth.$x].'></'.$tag.'>';
                 if ($x==3 or $x==7 or $x==11) {
                     $data_tag["new_tags"] .= "</div><div class='column'>";
                 }
             }
             $data_tag["new_tags"] .= "</div></div><br/>";             
                                 
             curl_close($ch);
             $this->load->view('dash', $data_tag);

        }
        
       
    }
}