<?php

require_once('common.class.php');

class User extends Common
{
    public $id, $fullname, $email, $password, $role;

    public function save()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $sql = "insert into seeker(fullname, email, password) values('$this->fullname','$this->email', MD5('$this->password'))";

        $conn->query($sql);

        if ($conn->affected_rows == 1 && $conn->insert_id > 0) {
            // return $conn->insert_id;
            header('Location:KHS/index.php?v="Logged in Successfully"');
        } else {
            header('Location:index.php?v="Error Occured!"');
            return false;
        }
    }

    public function login()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $encryptedPassword = md5($this->password);
        $sql = "select * from admin where 
                 email='$this->email' and 
                 password='$encryptedPassword'";
        $var = $conn->query($sql);
        if ($var->num_rows > 0) {
            $data = $var->fetch_object();
            @session_start();
            $_SESSION['id'] = $data->id;
            $_SESSION['fullname'] = $data->fullname;
            $_SESSION['email'] = $data->email;
            $_SESSION['role'] = $data->role;
            setcookie('email', $data->email, time() + 60 * 60);
            header('Location:KHS/index.php?v="Logged In Successfully!"');
        } else {
            $error = "Invalid Credentials!";
            return $error;
        }
    }


    public function retrieve()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $sql = "select * from admin where 1";
        $var = $conn->query($sql);
        if ($var->num_rows > 0) {
            $datalist = $var->fetch_all(MYSQLI_ASSOC);
            return $datalist;
        } else {
            return false;
        }
    }


    // public function edit()
    // {
    //     $conn = mysqli_connect('localhost', 'root', '', 'outsidelime');
    //     $sql = "update slider set banner_title='$this->banner_title',
    //                                 banner_quote='$this->banner_quote',
    //                                 banner_img='$this->banner_img',
    //                                 banner_link='$this->banner_link',
    //                                 status='$this->status'
    //                                 where banner_id='$this->banner_id'";
    //     $conn->query($sql);
    //     if ($conn->affected_rows == 1) {
    //         return $this->banner_id;
    //     } else {
    //         return false;
    //     }
    // }
    public function delete()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $sql = "delete from seeker where id='$this->id'";
        $var = $conn->query($sql);
        if ($var) {
            return "success";
        } else {
            return "failed";
        }
    }
}
