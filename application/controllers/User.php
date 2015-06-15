<?php

class User extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->library("Aauth");
    }
    
    public function login()
    {
        $result = new ArrayObject();
        header('Content-Type: application/json');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        if($this->aauth->login($email, $password, FALSE ))
        {
            $result['code'] =  "success";
        }
        else 
        {
            $result['code'] ="fail";
            $result['msgs'] = $this->aauth->errors;
        }    
        echo json_encode($result);
        
    }
    
    
    public function logout()
    {
       $result = new ArrayObject();
       header('Content-Type: application/json');
       
        $this->aauth->logout();
        $result['code'] = 'loggedout';
       
        echo json_encode($result);
        
    }
    
    public function register()
    {

        $result = new ArrayObject();
        header('Content-Type: application/json');
        if ($this->input->post())
        {
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->aauth->create_user($email, $password, $username);

            if($user)
            {
                 $result['code'] = 'success';
//                 $user->role = 'User';

                 $result['user_id'] = $user;
                 $this->aauth->add_member($user, 'Users');
            }
            else
            {
                $result['code']='fail';
                $result['msgs']=  $this->aauth->errors;
            }
        }
        echo json_encode($result);
    }
    
    
    // delete user
    public function deleteUser()
    {
        $result = new ArrayObject();
        header('Content-Type: application/json');
        if ($this->aauth->is_loggedin)
        {
            if ($this->input->post())
            {
                if($this->aauth->is_member('Admin',FALSE))
                {
                    $user_id = $this->input->post('user_id');
                    $this->aauth->delete_user($user_id);
                    $result['code'] = 'success';
                }else{
                    $result['code'] = 'not_admin';
                }
            }
        }else{
            $result['code'] = 'not_loggedin';
        }
        echo json_encode($result);

    }
    
    
    // ban user
    public function ban($user_id)
    {
        
        if($this->input->post())
        {
            if($this->aauth->is_member('Admin',FALSE))
            {
                $this->aauth->ban_user($user_id);
                return "banned";
            }
        }
    }
    
    // function for update user 
    public function updateUser()
    {
        $result = new ArrayObject();
        header('Content-Type: application/json');
        if ($this->aauth->is_loggedin())
        {
            if ($this->input->post())
            {
                $userid = $this->input->post('id');
                $email = $this->input->post('email');
                $name = $this->input->post('name');
                if($this->aauth->is_member('Amdmin', FALSE))
                {
                    if ($this->input->post('banned') == 'True')
                    {
                        $this->aauth->ban_user($userid);
                    }
                    else
                    {
                        $this->aauth->unban_user($userid);
                    }
                    if($this->input->post('admin') == 'True')
                    {
                        $this->aauth->add_member($userid, 'Admin');
                    }
                    else
                    {
                        $this->aauth->add_member($userid, 'Users');
                    }
                }
                $this->aauth->update_user($userid,$email,FALSE,$name);
                $result['code'] = 'success';
            }
        }
        else
        {
            $result['code'] = 'not_loggedin';
        }
        echo json_encode($result);
    }
    
    // retrive all users
    public function listUsers()
    {
        $result = new ArrayObject();
        header('Content-Type: application/json');

        if($this->aauth->is_loggedin())
        {
            if ($this->aauth->is_member('Admin',FALSE))
            {
                $result = new ArrayObject();
                header('Content-Type: application/json');
                $users = $this->aauth->list_users(FALSE,FALSE, FALSE, TRUE);
                $result['code'] = 'success';
                $result['users'] = $users;
                
                foreach ($users as $user){
                   $user->is_admin = $this->aauth->is_member('Admin',$user->id);
                }
                
            }
            else
            {
                $result['code'] = 'not_admin';
            }
        }
        else
        {
            $result['code'] = 'not_loggedin';
        }
        echo json_encode($result);
    }
    
    public function usersGet()
    {
        $result = new ArrayObject();
        header('Content-Type: application/json');

        $user =  $this->aauth->get_user();
        if ($user){
            $result['code'] = 'success';
            $result['user'] = $user;
            $user->is_admin = $this->aauth->is_allowed('Admin',FALSE);
        } else {
            $result['code'] = 'error';
        }
        
        echo json_encode($result);
    }
}

