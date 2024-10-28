<?php
$host = "conceptgrammarschool.com";
$dbname = "conceptg_jyothi";
$username ="conceptg_abdul";
$pass = "tolichowki";
$conn = mysqli_connect($host,$username,$pass,$dbname) or die("unable to connect to database");
include('dbconnection/connection.php'); 

function send_notification ($tokens, $message = "", $n)
{
    $url = 'https://fcm.googleapis.com/fcm/send';
    $fields = array(
         /*'to'             => $tokens,*/
         'registration_ids' => $tokens,
         'priority'     => "high",
         'notification' => $n,
         'data'         => $message
    );

    //var_dump($fields);

    $headers = array(
        'Authorization:key =AAAAuOb_MYs:APA91bGBTiiC2s_8Q_rJSkxgE0DOFZuwK6OhUZq1i-6WC3L99E9JwQ7qCMixqbnj999XF9lbcQsLt0kKn-H2q_b9k8nIVkIGcynXMa_jODY9WwhGj55kobGgwhalA3M2JvxpsvxluGwT',
        'Content-Type: application/json'
        );

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
   $result = curl_exec($ch);           
   if ($result == FALSE) {
       die('Curl failed: ' . curl_error($ch));
   }
   curl_close($ch);
   return $result;
}

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d");
$sql1 = "select COUNT(aq.id) as counts,aq.ses,emp.contactno from add_qot aq left join employee emp on emp.username=aq.ses where aq.status='work to be started' group by aq.ses
UNION
select COUNT(aq.id) as counts,aq.ses,emp.contactno from add_tgqot aq left join employee emp on emp.username=aq.ses where aq.status='work to be started' group by aq.ses
UNION
select COUNT(aq.id) as counts,aq.ses,emp.contactno from add_knqot aq left join employee emp on emp.username=aq.ses where aq.status='work to be started' group by aq.ses
UNION
select COUNT(aq.id) as counts,aq.ses,emp.contactno from add_klqot aq left join employee emp on emp.username=aq.ses where aq.status='work to be started' group by aq.ses
UNION
select COUNT(aq.id) as counts,aq.ses,emp.contactno from add_tnqot aq left join employee emp on emp.username=aq.ses where aq.status='work to be started' group by aq.ses
";
        $result1 = mysqli_query($link,$sql1) or die("unable to execute");
        
       

            while ($row1 = mysqli_fetch_assoc($result1)) 
            {
                 $contactno = $row1["contactno"];
                 $counts=$row1["counts"];
                 $messageforapp='Work to be started QTNS for '.$date.' are ' .$counts;
             
        
 

        $sql = "select  * from tokens where  token ='$contactno' ";
        $result = mysqli_query($conn,$sql) or die("unable to execute");
        $tokens = array();
        if(mysqli_num_rows($result) > 0 )
        {

            while ($row = mysqli_fetch_assoc($result)) 
            {
                 $tokens[] = $row["name"];
             }
        }
        $msg = array
(
    'message'   => 'here is a message. message',
    'title'     => 'This is a title. title',
    'subtitle'  => 'This is a subtitle. subtitle',
    'tickerText'    => 'Ticker text here...Ticker text here...Ticker text here',
    'vibrate'   => 1,
);

$n = array(
    "body"  => $messageforapp,
    "title" => "Jyothi Facility Management",
    "text"  => "Click me to open an Activity!",
    "sound" => "warning"
);
$message_status = send_notification($tokens, $msg, $n);
}
?>