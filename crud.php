<?php
class crud{
    public $fname;
    public $lname;
    public $uname;
    public $email;
    public $phone;

    private $conn;

    public function __construct($conn)
    {
        $this->conn=$conn;
        
    }
    public function addcustomerdetail($obj){
        $sql="INSERT INTO user (fname,lname,uname,email,phone) VALUES('$obj->fname','$obj->lname','$obj->uname','$obj->email','$obj->phone');";
            $result=mysqli_query($this->conn,$sql);
            if($result==TRUE)
            {
                $msg=["Form successfully submitted"];
            }
            else
            {
                $msg=["Error occurred while submitting information. Please try again later."];
            }
            
            return json_encode($msg);
    }
    public function update_user_detail($obj,$uname){
        $sql="UPDATE user
        SET fname='$obj->fname',lname='$obj->lname',uname='$obj->uname',email='$obj->email',phone='$obj->phone'
        WHERE uname='$uname';";
        $result=mysqli_query($this->conn,$sql);
        if($result==TRUE)
        {
            $msg=["Successfully Updated."];
        }
        else
        {
            $msg=["Error occurred while updating information. Please try again later."];
        }
        
        return json_encode($msg);

    }
    public function delete_user_detail($uname){
        $sql="DELETE FROM user WHERE uname='$uname';";
        $result=mysqli_query($this->conn,$sql);
        if($result==TRUE)
        {
            $msg=["Deleted Successfully."];
        }
        else
        {
            $msg=["Error occurred while deleting information. Please try again later."];
        }
        
        return json_encode($msg);
    }
    public function check_customer_uname($uname){
        $sql="SELECT * FROM user where uname='$uname';";
        $result=mysqli_query($this->conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            $msg=["Username is selected by another user."];
        }
        else
        {
            $msg=[""];
        }
        return json_encode($msg);      
    }
    
    public function check_customer_email($email){
        $sql="SELECT * FROM user where email='$email';";
        $result=mysqli_query($this->conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            $msg=["Email is already registered."];
        }
        else
        {
            $msg=[""];
        }
        return json_encode($msg);      
    }
    public function check_customer_phone($phone){
        $sql="SELECT * FROM user where phone='$phone';";
        $result=mysqli_query($this->conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            $msg=["Phone is already registered."];
        }
        else
        {
            $msg=[""];
        }
        return json_encode($msg);      
    }
    public function get_user_detail($uname){
        $sql="SELECT * FROM user where uname='$uname';";
        $result=mysqli_query($this->conn,$sql);
        $arr=array();
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $arr[]=$row;
            }
        }
        return json_encode($arr);      
    }
    public function search_user_detail($uname)
    {
        $sql="SELECT * FROM user WHERE uname like '%$uname%';";
        $result=mysqli_query($this->conn,$sql);
        $arr=array();
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $arr[]=$row;
            }
        }
        return json_encode($arr);   
    }
    public function get_all_user_detail()
    {
        $sql="SELECT * FROM user;";
        $result=mysqli_query($this->conn,$sql);
        $arr=array();
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $arr[]=$row;
            }
        }
        return json_encode($arr);   
    }
   

}
?>
