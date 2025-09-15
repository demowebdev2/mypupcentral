<?php

class Staff_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get($id = null) {

        $this->db->select('staff.*,roles.name as user_type,roles.id as role_id')->from('staff')->join("staff_roles", "staff_roles.staff_id = staff.id", "left")->join("roles", "staff_roles.role_id = roles.id", "left");

        if ($id != null) {
            $this->db->where('staff.id', $id);
        } else {
            $this->db->where('staff.is_active', 1);
            $this->db->order_by('staff.id');
        }
        $query = $this->db->get();
        if ($id != null) {
            $result = $query->row_array();
        } else {
            $result = $query->result_array();
            if ($this->session->has_userdata('siteadmin')) {
                $superadmin_rest = $this->session->userdata['siteadmin']['superadmin_restriction'];
                if ($superadmin_rest == 'disabled') {
                    $search = in_array(7, array_column($result, 'role_id'));
                    $search_key = array_search(7, array_column($result, 'role_id'));

                    if (!empty($search)) {
                        unset($result[$search_key]);
                        $result = array_values($result);
                    }
                }
            }
        }

        return $result;
    }


    public function get_edit($id = null) {

        $this->db->select('staff.*,staff.id as staffid,roles.name as user_type,roles.id as role_id')
        ->from('staff')->join("staff_roles", "staff_roles.staff_id = staff.id", "left")->join("roles", "staff_roles.role_id = roles.id", "left");
       

        if ($id != null) {
            $this->db->where('staff.id', $id);
        } else {
            $this->db->where('staff.is_active', 1);
            $this->db->order_by('staff.id');
        }
        $query = $this->db->get();
        if ($id != null) {
            $result = $query->row_array();
        } else {
            $result = $query->result_array();
            if ($this->session->has_userdata('siteadmin')) {
                $superadmin_rest = $this->session->userdata['siteadmin']['superadmin_restriction'];
                if ($superadmin_rest == 'disabled') {
                    $search = in_array(7, array_column($result, 'role_id'));
                    $search_key = array_search(7, array_column($result, 'role_id'));

                    if (!empty($search)) {
                        unset($result[$search_key]);
                        $result = array_values($result);
                    }
                }
            }
        }

        return $result;
    }

  
  

    public function add($data) {

        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('staff', $data);
        } else {
            $this->db->insert('staff', $data);
            return $this->db->insert_id();
        }
    }

    public function update($data) {
        $this->db->where('id', $data['id']);
        $query = $this->db->update('staff', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    

    public function batchInsert($data, $roles = array()) {

        $this->db->trans_start();
        $this->db->trans_strict(FALSE);

        $this->db->insert('staff', $data);
        $staff_id = $this->db->insert_id();
        $roles['staff_id'] = $staff_id;
        $this->db->insert_batch('staff_roles', array($roles));
       
        $this->db->trans_complete();


        if ($this->db->trans_status() === FALSE) {

            $this->db->trans_rollback();
            return FALSE;
        } else {

            $this->db->trans_commit();
            return $staff_id;
        }
    }

   

    public function remove($id) {

        $this->db->where('id', $id);
        $this->db->delete('staff');

        $this->db->where('staff_id', $id);
        $this->db->delete('staff_roles');
    }


    function check_data_exists($name, $id, $staff_id) {

        if ($staff_id != 0) {
            $data = array('id != ' => $staff_id, 'employee_id' => $id);
            $query = $this->db->where($data)->get('staff');
            if ($query->num_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {

            $this->db->where('employee_id', $id);
            $query = $this->db->get('staff');
            if ($query->num_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    public function valid_email_id($str) {
        $email = $this->input->post('email');
        $id = $this->input->post('employee_id');
        $staff_id = $this->input->post('editid');

        if (!isset($id)) {
            $id = 0;
        }
        if (!isset($staff_id)) {
            $staff_id = 0;
        }

        if ($this->check_email_exists($email, $id, $staff_id)) {
            $this->form_validation->set_message('check_exists', 'Email already exists');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function check_email_exists($email, $id, $staff_id) {

        if ($staff_id != 0) {
            $data = array('id != ' => $staff_id, 'email' => $email);
            $query = $this->db->where($data)->get('staff');
            if ($query->num_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {

            $this->db->where('email', $email);
            $query = $this->db->get('staff');
            if ($query->num_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    public function getStaffRole($id = null) {

        $this->db->select('roles.id,roles.name as type')->from('roles');
        $this->db->where('id!=', 3);
        if ($id != null) {
            $this->db->where('id', $id);
        } else {
            $this->db->order_by('id');
        }
        $this->db->where("is_active", "yes");
        $query = $this->db->get();
        if ($id != null) {
            $result = $query->row_array();
        } else {
            $result = $query->result_array();
            if ($this->session->has_userdata('siteadmin')) {
                $superadmin_rest = $this->session->userdata['siteadmin']['superadmin_restriction'];
                if ($superadmin_rest == 'disabled') {
                    $search = in_array(7, array_column($result, 'id'));
                    $search_key = array_search(7, array_column($result, 'id'));
                    if (!empty($search)) {
                        unset($result[$search_key]);
                    }
                }
            }
        }


        return $result;
    }


    public function searchFullText($searchterm, $active, $order = 'staff.employee_id', $dir = 'desc', $limit = 5, $start = 0) {

        $query = $this->db->query("SELECT `staff`.*, `roles`.`name` as user_type,`roles`.`id` as role_id  FROM `staff` LEFT JOIN  `staff_roles` ON `staff_roles`.`staff_id` = `staff`.`id` LEFT JOIN `roles` ON `staff_roles`.`role_id` = `roles`.`id`");

        $result = $query->result_array();
        if ($this->session->has_userdata('siteadmin')) {
            $superadmin_rest = $this->session->userdata['siteadmin']['superadmin_restriction'];
            if ($superadmin_rest == 'disabled') {
                $search = in_array(7, array_column($result, 'role_id'));
                $search_key = array_search(7, array_column($result, 'role_id'));
                if (!empty($search)) {
                    unset($result[$search_key]);
                }
            }
        }

        return $result;
    }


    public function searchFullText_staff($searchterm, $active, $order = 'staff.employee_id', $dir = 'desc', $limit = 5, $start = 0) {

        $query = $this->db->query("SELECT `staff`.`name`,`staff`.`id`, `roles`.`name` as user_type,`roles`.`id` as role_id  FROM `staff` LEFT JOIN  `staff_roles` ON `staff_roles`.`staff_id` = `staff`.`id` LEFT JOIN `roles` ON `staff_roles`.`role_id` = `roles`.`id`");

        $result = $query->result_array();
       
                $search = in_array(7, array_column($result, 'role_id'));
                $search_key = array_search(7, array_column($result, 'role_id'));
                if (!empty($search)) {
                    unset($result[$search_key]);
                }
            

        return $result;
    }

    public function searchFullTexts($searchterm, $active, $order = 'staff.employee_id', $dir = 'desc', $limit = 5, $start = 0) {

        $query = $this->db->query("SELECT `staff`.*, `staff_designation`.`designation` as `designation`, `department`.`department_name` as `department`,`roles`.`name` as user_type,`roles`.`id` as role_id  FROM `staff` LEFT JOIN `staff_designation` ON `staff_designation`.`id` = `staff`.`designation` LEFT JOIN `staff_roles` ON `staff_roles`.`staff_id` = `staff`.`id` LEFT JOIN `roles` ON `staff_roles`.`role_id` = `roles`.`id` LEFT JOIN `department` ON `department`.`id` = `staff`.`department` WHERE  `roles`.`id`=3 and `staff`.`is_active` = '$active' and (`staff`.`name` LIKE '%$searchterm%' ESCAPE '!' OR `staff`.`surname` LIKE '%$searchterm%' ESCAPE '!' OR `staff`.`employee_id` LIKE '%$searchterm%' ESCAPE '!' OR `staff`.`local_address` LIKE '%$searchterm%' ESCAPE '!'  OR `staff`.`contact_no` LIKE '%$searchterm%' ESCAPE '!' OR `staff`.`email` LIKE '%$searchterm%' ESCAPE '!') ");

        $result = $query->result_array();
        if ($this->session->has_userdata('siteadmin')) {
            $superadmin_rest = $this->session->userdata['siteadmin']['superadmin_restriction'];
            if ($superadmin_rest == 'disabled') {
                $search = in_array(7, array_column($result, 'role_id'));
                $search_key = array_search(7, array_column($result, 'role_id'));
                if (!empty($search)) {
                    unset($result[$search_key]);
                }
            }
        }

        return $result;
    }


    public function getByEmail($email) {
        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where('email', $email);
        //  $this->db->where('application', 'puppyverify');
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    public function checkLogin($data) {


        $record = $this->getByEmail($data['email']);
        if ($record) {
            $pass_verify = $this->enc_lib->passHashDyc($data['password'], $record->password);
            if ($pass_verify) {
                $roles = $this->staffroles_model->getStaffRoles($record->id);
                // echo json_encode( $roles);
                // exit();
                $record->roles = array($roles[0]->name => $roles[0]->role_id);
                $record->rolesid=$roles[0]->role_id;
                return $record;
            }
        }
        return false;
    }
    public function update_role($role_data) {

        $this->db->where("staff_id", $role_data["staff_id"])->update("staff_roles", $role_data);
    }


}

?>
