<?php
require "header.php";
require "scripts/create-activity.php";
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$tenureAmount=$_SESSION['amount'];
$portifolioName=$_SESSION['portfolioName'];
$ticker=$_REQUEST['ticker'];
                if (isset($_GET['plan'])) {

    $date = date("l jS \of F Y");
    $plan = mysqli_real_escape_string($conn, $_GET['plan']);
    $user_id = $_SESSION['user_id'];
    $description = "New portfolio created";
    $unix_time = time();

    // Get plan details securely
    $get_plans = $conn->prepare("SELECT amount FROM iv_schemes WHERE id = ?");
    $get_plans->bind_param("i", $plan);
    $get_plans->execute();
    $result = $get_plans->get_result();
    $plans = $result->fetch_assoc();
    $get_plans->close();

    $min = $plans['amount'];

    if ($tenureAmount >= $min) {
        $balance /= $currency_rate;
        if ($balance >= $tenureAmount) {
            $new_balance = $balance - $tenureAmount;

            // Update portfolio balance securely
            $update_stmt = $conn->prepare("UPDATE portifolios SET balance = ? WHERE id = ?");
            $update_stmt->bind_param("di", $new_balance, $wallet_id);
            $update_stmt->execute();
            $update_stmt->close();

            // Insert new portfolio securely
            $insert_stmt = $conn->prepare("INSERT INTO portifolios(`user_id`, `name`, `description`, `amount`, `balance`, `rate`, `save_pro`, `date`, `unix_time`, `ticker`, `status`, `track`) 
            VALUES (?, ?, ?, ?, ?, ?, 'no', ?, ?, ?, 'active', ?)");
            $insert_stmt->bind_param(
                "issddssssi",
                $user_id,
                $portifolioName,
                $description,
                $tenureAmount,
                $tenureAmount,
                $plan,
                $date,
                $unix_time,
                $ticker,
                $unix_time
            );

            $createPortifolio = $insert_stmt->execute();
            $folioId = $conn->insert_id;
            $insert_stmt->close();

            if ($createPortifolio) {
                $date = date("l jS \of F Y");
                createActivity($user_id, $description, $portifolioName, $tenureAmount, $date);
                echo "<script>
                    swal('Great','new portfolio created','success')
                    .then(()=>{
                        location.replace('portifolios.php')
                    })
                </script>";
            } else {
                echo "<script>
                    swal('Error','An error occurred','error')
                </script>";
            }
        } else {
            echo "<script>
                swal('Error','Not enough balance in wallet','error')
            </script>";
        }
    } else {
        $min *= $currency_rate;
        echo "<script>
            swal('Error','Minimum amount to deposit for this plan is $symbol $min','error')
        </script>";
    }
}

                 
?>
 <link rel="stylesheet" href="../css/plans.css">

<style>
    .plans{
        background: #000 !important;
    }
    .plan{
        background:#000021 !important;
        border-color:#222;
    }
    .plan-price,.plan-title {
        color:#fff !important;
    }
    .plan-feature,.plan-unit,.plan-feature-name {
        color:#aaa !important;
    }
</style>



         <!-- section content begin -->
     
     <div id="plans" class="plans">
  <br>
 <center><h2>Short termed plans</h2></center>
  <br>

  <center>
  <?php
  $get_plan=mysqli_query($conn,"SELECT * FROM iv_schemes WHERE active='yes' AND type='short' ORDER BY id ");
  if(mysqli_num_rows($get_plan)>0){
      while($scheme=mysqli_fetch_assoc($get_plan)){
          $plan_name=$scheme['name'];
          $min=$scheme['amount'] * $currency_rate;
          $roi=$scheme['ROI'];
          $plan_id=$scheme['id'];
          $term=$scheme['term'];
          $duration=$scheme['duration'];
          
          ?>
           <div class="plan">
    <h3 class="plan-title"><?php echo $plan_name; ?></h3>
    <p><span class="plan-price"><?php echo $roi; ?>%&nbsp;<b>ROI</b></span></p>
    <ul class="plan-features">
     
      <li class="plan-feature"><?php echo $term." ".$duration; ?> <span class="plan-feature-name"><br>Duration</span></li>
      <li class="plan-feature"><?php echo $symbol."".$min; ?><span class="plan-feature-name"><br>minimum investment</span></li>
    </ul>
    <a href="plans.php?plan=<?php echo $plan_id; ?>&ticker=<?php echo $ticker;?>">
    <button name="plan" value="<?php echo $plan_id; ?>" class="plan-button w-100">Choose Plan</button>
    </a>
  </div>
    <?php      
      }
  }
  ?>
   
     
 </center>
  <br>
  
  
    <br>
 <center><h2>Long termed plans</h2></center>
  <br>

  <center>
  <?php
 $get_plan=mysqli_query($conn,"SELECT * FROM iv_schemes WHERE active='yes' AND type='long'  ORDER BY id ");
  if(mysqli_num_rows($get_plan)>0){
      while($scheme=mysqli_fetch_assoc($get_plan)){
          $plan_name=$scheme['name'];
          $min=$scheme['amount']*$currency_rate;
          $roi=$scheme['ROI'];
          $recurring=$scheme['recurring'];
          $term=$scheme['term'];
          $duration=$scheme['duration'];
          $plan_id=$scheme['id'];
          ?>
           <div class="plan">
    <h3 class="plan-title"><?php echo $plan_name; ?></h3>
    <p class="plan-price"><?php echo $roi; ?>%&nbsp;<b>ROI</b></p>
    <ul class="plan-features">
     <li class="plan-feature"><?php echo $recurring; ?> days <span class="plan-feature-name"><br>Top up period</span></li>
      <li class="plan-feature"><?php echo $term." ".$duration; ?> <span class="plan-feature-name"><br>Duration</span></li>
      <li class="plan-feature"><?php echo $symbol."".$min; ?><span class="plan-feature-name"><br>minimum investment</span></li>
    </ul>
    <a href="plans.php?plan=<?php echo $plan_id; ?>&ticker=<?php echo $ticker;?>">
    <button name="plan" value="<?php echo $id; ?>" class="plan-button w-100">Choose Plan</button>
    </a>
  </div>
    <?php      
      }
  }
  ?>
   
     
 </center>
  <br>

 </div>
     <!-- section content end -->







<?php
require "footer.php";
?>