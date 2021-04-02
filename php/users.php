<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn,"select * from users where not unique_id ={$outgoing_id}");
    $output = "";
    if(mysqli_num_rows($sql)==1){
        $output .= "No Users Available to Chat";
    }elseif(mysqli_num_rows($sql)>0){
        while($row = mysqli_fetch_assoc($sql)){
            $sql2 = "select * from messages where (incoming_msg_id = {$row['unique_id']}
                    or outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id}
                    or incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
            $query2 = mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_assoc($query2);
            if(mysqli_num_rows($query2)>0){
                $result = $row2['msg'];
            }else{
                $result="No Messages Available";
            }

            (strlen($result)>28) ? $msg = substr($result,0,28).'...' : $msg = $result;
            //($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you ="";
            ($row['status']=="Offline now") ? $offline = "offline" : $offline = "";
            $output .= '<a href="chat-area.php?user_id='.$row['unique_id'].'">
                        <div class="content">
                        <img src="php/Images/'. $row['image'].'" alt="">
                        <div class="details">
                            <span>'. $row['fname'] . " " . $row['lname'] .'</span>
                            <p>'. $msg .'</p>
                        </div>
                        </div>
                        <div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
                        </a>';
        }

    }
    echo $output;
?>