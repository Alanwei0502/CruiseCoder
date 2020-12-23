

<?php

if(isset($_POST['submit_type']) AND $_POST['token'] != $_SESSION['token']){
  $_SESSION['token'] = $_POST['token'];
  if($_POST['submit_type'] == 'a_score'){
    $rNumber = date('Ymdmis');
    $rMmeber = $member['mNumber']??'';
    $rFeedback = $_POST['review_content'];
    $rCourse = $CourseID;
    $rStar = $_POST['review_stars'];
    $sql = "INSERT INTO `review` (`rNumber`, `rCourse`, `rMmeber`, `rFeedback`, `rStar`, `rDate`) VALUES ('".$rNumber."', '".$rCourse."', '".$rMmeber."', '".$rFeedback."', '".$rStar."', now())";
    $r = mysqli_query($conn, $sql);
    // var_dump($conn->error);
  }

  if($_POST['submit_type'] == 'a_qa'){
    
    $sql = "SELECT count(*) as c
    FROM `discuss` d 
    Order by d.dDate";
    if ($result = $conn->query($sql)) {
      if($r = mysqli_fetch_assoc($result)){
        $dNumber = $r['c'];
      }
    }

    $dNumber = 'D'.str_pad(($dNumber+1),4,'0',STR_PAD_LEFT);
    $dMember = $member['mNumber']??'';
    $dContent = $_POST['dContent'];
    $p_dNumber = $_POST['a_qa_p']??'0';
    $dCourse = $CourseID;
    $sql = "INSERT INTO `discuss` (`dNumber`, `p_dNumber`, `dCourse`, `dMember`, `dContent`, `dDate`) VALUES ('".$dNumber."', '".$p_dNumber."', '".$dCourse."', '".$dMember."', '".$dContent."', now())";
    $r = mysqli_query($conn, $sql);
    // var_dump($conn->error);
  }

}

$review_count = 0;
$star = 0;
$rstar = 0;
$is_review = $member?true:false;
$sql = "SELECT r.*, m.mName, m.mPhoto 
FROM `review` r 
LEFT JOIN `member` m ON(m.mNumber = r.rMmeber) 
WHERE r.rCourse = '".$CourseID."' ORDER BY r.rDate desc ";
$reviewList = [];
if ($result = $conn->query($sql)) {
  while($r = mysqli_fetch_assoc($result)){
    if(isset($member['mNumber']) AND $r['rMmeber'] == $member['mNumber']){
      $is_review = false;
    }

    
    $review_count++;
    $rstar += $r['rStar'];

    $reviewList[] = $r;
  }
}
if($rstar > 0){
  $star = $rstar/$review_count;
  $star = number_format($star,1);
}
$is_discuss = $member?true:false;
$sql = "SELECT d.*, m.mName, m.mPhoto 
FROM `discuss` d 
LEFT JOIN `member` m ON(m.mNumber = d.dMember) 
WHERE d.dCourse = '".$CourseID."' AND d.p_dNumber = '0' ORDER BY d.dDate desc ";
$discussList = [];
if ($result = $conn->query($sql)) {
  while($r = mysqli_fetch_assoc($result)){
    
    $sql2 = "SELECT d.*, m.mName, m.mPhoto 
    FROM `discuss` d 
    LEFT JOIN `member` m ON(m.mNumber = d.dMember) 
    WHERE d.p_dNumber = '".$r['dNumber']."' ";
    $discussList2 = [];
    if ($result2 = $conn->query($sql2)) {
      while($r2 = mysqli_fetch_assoc($result2)){
          $discussList2[] = $r2;
      }
    }
    $r['p_discuss'] = $discussList2;
    $discussList[] = $r;
  }
}

$is_favorite = false;
if($member){
  $sql = "SELECT * 
  FROM `favorite_c`  
  WHERE fcCourse = '".$CourseID."' AND fcMember = '".$member['mNumber']."'";
  if ($result = $conn->query($sql)) {
    if($r = mysqli_fetch_assoc($result)){
      $is_favorite = true;
    }
  }
}


$is_buy = false;
if($member){
  $sql = "SELECT * 
  FROM `myorder` mo 
  JOIN `invoice` i ON(i.iNumber = mo.oNumber) 
  WHERE i.iCourse = '".$CourseID."' AND mo.oMember = '".$member['mNumber']."'";
  if ($result = $conn->query($sql)) {
    if($r = mysqli_fetch_assoc($result)){
      $is_buy = true;
    }
  }
}


?>