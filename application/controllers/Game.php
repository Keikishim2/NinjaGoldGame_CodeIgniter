<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Game extends CI_Controller{

    public function ninja(){
        if($this->session->userdata('gold') == FALSE){
            $this->session->set_userdata('gold', 0);
        }
        if($this->session->userdata('act_temp') == FALSE){
            $act = array();
            $this->session->set_userdata('act_temp', $act);
        }
        $this->load->view('ninja');
    }

    public function farm(){
        $gold = rand(10, 20);
        $this->session->set_userdata('gold', ($this->session->userdata('gold') + $gold));
        $tempo = $this->session->userdata('act_temp');
        array_unshift($tempo, "<p class='gain'>Earned " . $gold . "gold from the farm! (".date('Y/j/d h:i a').")</p>");
        $this->session->set_userdata('act_temp', $tempo);
        $this->load->view('ninja');
    }

    public function house(){
        $gold = rand(5,10);
        $this->session->set_userdata('gold', ($this->session->userdata('gold') + $gold));
        $tempo = $this->session->userdata('act_temp');
        array_unshift($tempo, "<p class='gain'>Earned " . $gold . "gold from the house! (".date('Y/j/d h:i a').")</p>");
        $this->session->set_userdata('act_temp', $tempo);
        $this->load->view('ninja');
    }

    public function cave(){
        $gold = rand(2,5);
        $this->session->set_userdata('gold', ($this->session->userdata('gold') + $gold));
        $tempo = $this->session->userdata('act_temp');
        array_unshift($tempo, "<p class='gain'>Earned " . $gold . "gold from the cave! (".date('Y/j/d h:i a').")</p>");
        $this->session->set_userdata('act_temp', $tempo);
        $this->load->view('ninja');
    }

    public function casino(){
        $gold = rand(-50, 50);
        $this->session->set_userdata('gold', ($this->session->userdata('gold') + $gold));
        if($gold > 0){
            $tempo = $this->session->userdata('act_temp');
            array_unshift($tempo, "<p class='gain'> Entered a casino and earned " . $gold . " gold from the casino! (".date('Y/j/d h:i a').")</p>");
            $this->session->set_userdata('act_temp', $tempo);
        }
        elseif($gold == 0){
            $tempo = $this->session->userdata('act_temp');
            array_unshift($temp, "<p class='gain'> Entered a casino and had no change of gold! (".date('Y/j/d h:i a').")</p>");
            $this->session->set_userdata('act_temp', $tempo);
        }
        else{
            $tempo = $this->session->userdata('act_temp');
            array_unshift($tempo, "<p class='lost'> Entered a casino and lost " .abs($gold). "gold....Ouch!(".date('Y/j/d h:i a').")</p>");
            $this->session->set_userdata('act_temp', $tempo);
        }
        $this->load->view('ninja');
    }

    public function reset(){
        $this->session->sess_destroy();
        redirect('ninja');
    }

}

?>
