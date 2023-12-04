<?php

require "Database.php";

class User extends Database {

    public function createUser($first_name, $last_name, $username, $password){

        $sql = "INSERT INTO users(first_name, last_name, username, password) 
        VALUES('$first_name', '$last_name', '$username', '$password')";

        if($this->conn->query($sql)){
            //go to login page
            header("location: ../views");
            exit;
        }else{
            die("Error creating user: ".$this->conn->error);
        }
    }

    public function login($username, $password){

        //finding the user
        $sql = "SELECT * FROM users WHERE username='$username'";

        $result = $this->conn->query($sql);

        if($result->num_rows == 1){ // if 1 user record found
            $user_data = $result->fetch_assoc();
            //check password
            if(password_verify($password, $user_data['password'])){
                //login
                session_start();
                $_SESSION['user_id'] = $user_data['id'];
                $_SESSION['username'] = $user_data['username'];
                //go to dashboard page
                header("location: ../views/dashboard.php");
                exit;
            }else{
                die("Incorrect password");
            }
        }else{
            die("User not found.");
        }
    }

    public function getAllUsers(){
        $sql = "SELECT * FROM users";

        if($result = $this->conn->query($sql)){
            return $result; //return or pass back the data
        }else{
            die("Error retrieving users: ". $this->conn->error);
        }
    }

    //get data of 1 user (using ID)
    public function getUser($id){
        $sql = "SELECT * FROM users WHERE id=$id";

        if($result = $this->conn->query($sql)){
            //return the 1st row of data
            return $result->fetch_assoc();
        }else{
            die("Error retrieving user: ".$this->conn->error);
        }
    }

    //update user
    public function updateUser($id, $first_name, $last_name, $username){
        $sql = "UPDATE users SET first_name='$first_name',
                                last_name = '$last_name', 
                                username = '$username'
                            WHERE id=$id";
        if($this->conn->query($sql)){
            //go to dashboard
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error updating user: ".$this->conn->error);
        }
    }

    public function uploadPhoto($file_name, $tmp_name){
        session_start();

        //update the file name to database
        $sql = "UPDATE users SET photo='$file_name' WHERE id=".$_SESSION['user_id'];

        if($this->conn->query($sql)){
            $destination = "../images/$file_name";
            if(move_uploaded_file($tmp_name, $destination)){
                //success; go back to profile
                header("location: ../views/profile.php");
                exit;
            }else{
                die("Error moving file");
            }
        }else{
            die("Error updating photo: ".$this->conn->error);
        }
    }

    //delete user
    public function deleteUser($id){
        $sql = "DELETE FROM users WHERE id=$id";

        if($this->conn->query($sql)){
            //success; go to dashboard
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error deleting user: ".$this->conn->error);
        }
    }
}