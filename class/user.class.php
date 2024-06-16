<?php

require_once('common.class.php');

class User extends Common
{
    public $id, $fullname, $email, $age,
        $phone, $gender, $occupation, $area, $address, $image, $password, $role;

    public function save()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $sql = "insert into users(fullname, email, age, phone, gender, 
               occupation, area, address, image, password) values('$this->fullname','$this->email','$this->age',
               '$this->phone','$this->gender', '$this->occupation', '$this->area', '$this->address', '$this->image', MD5('$this->password'))";

        $conn->query($sql);

        if ($conn->affected_rows == 1 && $conn->insert_id > 0) {
            // return $conn->insert_id;
            header('Location:index.php?v="Registered Successfully"');
        } else {
            header('Location:register.php?v="Error Occured!"');
            return false;
        }
    }

    public function login()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $encryptedPassword = md5($this->password);
        $sql = "select * from users where 
                 email='$this->email' and 
                 password='$encryptedPassword'";
        $var = $conn->query($sql);
        $data = $var->fetch_object();

        if ($data->email == $this->email || $data->password == $this->password) {

            if ($data->status == 0) {
                $error = "Your approval is pending!";
                return $error;
            } else if ($var->num_rows > 0) {
                @session_start();
                $_SESSION['id'] = $data->id;
                $_SESSION['fullname'] = $data->fullname;
                $_SESSION['email'] = $data->email;
                $_SESSION['role'] = $data->role;
                $_SESSION['image'] = $data->image;
                setcookie('email', $data->email, time() + 60 * 60);
                header('Location:index.php?v="Logged In Successfully!"');
            } else {
                $error = "Error Occured!";
                return $error;
            }
        } else {
            $error = "Invalid Credentials!";
            return $error;
        }
    }


    public function retrieve()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $sql = "select * from users where status = 1";
        $var = $conn->query($sql);
        if ($var->num_rows > 0) {
            $datalist = $var->fetch_all(MYSQLI_ASSOC);
            return $datalist;
        } else {
            return false;
        }
    }


    public function edit()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $sql = "update users set fullname='$this->fullname',
                                    email='$this->email',
                                    age='$this->age',
                                    phone='$this->phone',
                                    gender='$this->gender',
                                        occupation='$this->occupation',
                                        area='$this->area',
                                        address='$this->address',
                                        image='$this->image'
                                    where id='$this->id'";
        $conn->query($sql);
        if ($conn->affected_rows == 1) {
            return $this->id;
        } else {
            return false;
        }
    }
    public function delete()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $sql = "delete from users where id='$this->id'";
        $var = $conn->query($sql);
        if ($var) {
            return "success";
        } else {
            return "failed";
        }
    }

    public function getById()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $sql = "select * from users where id='$this->id'";
        $var = $conn->query($sql);
        if ($var->num_rows > 0) {
            $data = $var->fetch_object();
            return $data;
        } else {
            return [];
        }
    }

    public function retrievePending()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $sql = "select * from users where status = 0";
        $var = $conn->query($sql);
        if ($var->num_rows > 0) {
            $datalist = $var->fetch_all(MYSQLI_ASSOC);
            return $datalist;
        } else {
            return false;
        }
    }

    public function activeStatus()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $sql = "update users set status = 1 where id='$this->id'";
        $conn->query($sql);
        if ($conn->affected_rows == 1) {
            // header("Location:editStatus.php?id=" . $this->id);
            header("Location:editStatus.php?v=The status is updated successfully to active! & id=" . $this->id);
            return $this->id;
        } else {
            return false;
        }
    }

    public function pendingStatus()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $sql = "update users set status = 0 where id='$this->id'";
        $conn->query($sql);
        if ($conn->affected_rows == 1) {
            header("Location:editStatus.php?v=The status is updated successfully to pending! & id=" . $this->id);
            return $this->id;
        } else {
            return false;
        }
    }

    public function rejectAccount()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $sql = "delete from users where id='$this->id'";
        $var = $conn->query($sql);
        if ($var) {
            return "success";
        } else {
            return "failed";
        }
    }
    public function retrieveAll()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $sql = "select * from users";
        $var = $conn->query($sql);
        if ($var->num_rows > 0) {
            $datalist = $var->fetch_all(MYSQLI_ASSOC);
            return $datalist;
        } else {
            return false;
        }
    }
}
