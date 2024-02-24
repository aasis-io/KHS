<?php

require_once('common.class.php');

class Area extends Common
{
    public $id, $name;

    public function save()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $sql = "insert into area(name) values('$this->name')";

        $conn->query($sql);

        if ($conn->affected_rows == 1 && $conn->insert_id > 0) {
            // return $conn->insert_id;
            header('Location:index.php?v="Area Added Successfully"');
        } else {
            header('Location:register.php?v="Error Occured!"');
            return false;
        }
    }


    public function retrieve()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $sql = "select * from area";
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
        $sql = "delete from area where id='$this->id'";
        $var = $conn->query($sql);
        if ($var) {
            return "success";
        } else {
            return "failed";
        }
    }

    // public function getById()
    // {
    //     $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
    //     $sql = "select * from users where id='$this->id'";
    //     $var = $conn->query($sql);
    //     if ($var->num_rows > 0) {
    //         $data = $var->fetch_object();
    //         return $data;
    //     } else {
    //         return [];
    //     }
    // }



}
