<?php

require_once('common.class.php');

class Rating extends Common
{
    public $id, $review_giver, $email, $rating, $review, $u_id;

    public function save()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $sql = "insert into rating(review_giver, email, rating, review, u_id) values('$this->review_giver', '$this->email', '$this->rating', '$this->review', '$this->u_id')";

        $conn->query($sql);

        if ($conn->affected_rows == 1 && $conn->insert_id > 0) {
            // return $conn->insert_id;
            header('Location:view_user.php?v="Review Added Successfully"');
        } else {
            header('Location:review.php?v="Error Occured!"');
            return false;
        }
    }


    public function retrieve()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $sql = "select * from rating";
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
        $sql = "delete from rating where id='$this->id'";
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
        $sql = "SELECT * FROM rating WHERE u_id='$this->u_id' limit 2";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch all rows into an array of objects
            $data = [];
            while ($row = $result->fetch_object()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return [];
        }
    }

    public function getAverageRating()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $sql = "SELECT AVG(rating) AS average_rating FROM rating WHERE u_id='$this->u_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            return $data['average_rating'];
        } else {
            return 0; // Default value if no ratings found
        }
    }

    public function getTotalReviews()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $sql = "SELECT COUNT(*) AS total_reviews FROM rating WHERE u_id='$this->u_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            return $data['total_reviews'];
        } else {
            return 0; // Default value if no reviews found
        }
    }
}
