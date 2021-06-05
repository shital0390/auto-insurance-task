<?php
class Report_model extends CI_Model 
{
   
    public function display_records(){
        $query=$this->db->get("tbl_users");
        return $query->result();
    }

    

    public function edit_record($edit_id)
 	{ 
        $query=$this->db->where('id',$edit_id)->get('tbl_users')->result();

 		return $query;
 	}

     public function update($capsule,$uid)
 	{
 		$update=$this->db->where('id',$uid)->update('tbl_users',$capsule);
 		if ($update) {
 		return $msg="Data Updated Successfully";
 		}
 	}

    public function get_user_logs($user_id){
        $query=$this->db->where('user_id',$user_id)->get('tbl_user_login_logs')->result();

 		return $query;
    }

    public function getLastLogin($userid){
        $Q = $this->db->query(' SELECT max(last_login) as last_login FROM `tbl_user_login_logs` WHERE user_id = "'.$userid.'" order by last_login desc  ');

        if ($Q->num_rows() > 0){
            $result = $Q->result_array();
            return $result[0]['last_login'];
        }
        //$query=$this->db->where('user_id',$userid)->get('tbl_user_login_logs')->result();
    }

     
	
}