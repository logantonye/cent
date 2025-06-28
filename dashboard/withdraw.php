<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require "header.php";
?>

  <style>
   
    .light-bg{
              background-color: #d0dbe7;
            }
            input:focus{
                background:#fff !important;
            }
            input:-webkit-autofill, input:-webkit-autofill:hover, input:-webkit-autofill:focus, textarea:-webkit-autofill, textarea:-webkit-autofill:hover, textarea:-webkit-autofill:focus, select:-webkit-autofill, select:-webkit-autofill:hover, select:-webkit-autofill:focus, input:-internal-autofill-selected {
    background-clip: text !important;
    -webkit-background-clip: border-box !important;
}
  </style>

<div class="row">
<div class="col-lg-6 mx-auto">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Fund my Wallet </h5>
                      <small class="text-muted float-end"></small>
                    </div>
                    <div class="card-body">
                      <form method="post">
                      <input type="hidden" name='portfolio' id='portfolio' value='<?php echo $wallet_id; ?>' />
                            
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-company">How do you prefer to pay </label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"
                              ><i class='bx bx-timer'></i>
                            </span>
                      <select class="form-control" name="currency" id="currency" required>
                                <?php
                                $get_payment=mysqli_query($conn, "SELECT * FROM payment_methods WHERE active='yes'");
                                if(mysqli_num_rows($get_payment)>0){
                                    while($payment=mysqli_fetch_assoc($get_payment)){
                                        $name=$payment['name'];
                                        $slug=$payment['slug'];
                                        $id=$payment['id'];

                                        echo "
                                        <option value='$slug'>$name</option>
                                        ";
                                    }
                                }
                                $get_bank=mysqli_query($conn,"SELECT * FROM bank_transfer");
                                $bank=mysqli_fetch_assoc($get_bank);
                                $bank_active=$bank['active'];
                                $bank_name=$bank['bank_name'];
                                $bank_details=$bank['bank_details'];
                                $account_number=$bank['account_details'];
                                
                                if($bank_active=='yes'){
                                    echo "
                                        <option value='bank'>Bank transfer</option>
                                        ";
                                }
                                
                                ?>
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-email">Amount you want to deposit</label>
                          <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bx-dollar-circle'></i></span>
                            <input
                              type="number"
                              name="amount"
                              id="basic-icon-default-email"
                              class="form-control"
                              placeholder="Amount"
                              aria-label="Amount"
                              aria-describedby="basic-icon-default-email2"
                              required
                            />
                            <span id="basic-icon-default-email2" class="input-group-text"><?php echo $currency; ?></span>
                          </div>
                          <div class="form-text">You can use  numbers & periods</div>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary">Deposit</button>
                      </form>
                    </div>
                  </div>
                </div>

</div>
<?php
if ($_POST) {
    require "scripts/create-activity.php";

    $user_id = $_SESSION['user_id'];
    $amount = floatval($_POST['amount']);
    $folioId = intval($_POST['portfolio']);
    $currency = $_POST['currency'];
    $description = "new deposit of $symbol $amount";

    $date = date("l jS \of F Y");
    $unix_time = time();
    $status = "pending";
    $rand = rand();

    $get_email = $conn->prepare("SELECT email FROM `users` WHERE id = ?");
    $get_email->bind_param("i", $user_id);
    $get_email->execute();
    $result = $get_email->get_result();
    $user = $result->fetch_assoc();
    $email = $user['email'];
    $get_email->close();

    $subject = "New deposit awaiting confirmation";
    $message = "Your deposit request has been received and is awaiting confirmation. You will be contacted once our team has reviewed your account";
    $adminMessage = "<p>New deposit</p><p>Amount: $amount $currency</p><p>from: $email</p>";

    $get_portfolio = $conn->prepare("SELECT `name`, `amount` FROM `portifolios` WHERE `id` = ?");
    $get_portfolio->bind_param("i", $folioId);
    $get_portfolio->execute();
    $portfolio_result = $get_portfolio->get_result();
    $portifolio = $portfolio_result->fetch_assoc();
    $get_portfolio->close();

    $portifolioName = $portifolio['name'];
    $min_amount = $portifolio['amount'];

    if (true) {  // Placeholder: You can add condition if needed
        $amount /= $currency_rate;
        $balance /= $currency_rate;

        $stmt = $conn->prepare("INSERT INTO transactions(`user_id`, `folio_id`, `amount`, `type`, `status`, `date`, `unix_time`, `currency`) VALUES (?, ?, ?, 'deposit', ?, ?, ?, ?)");
        $stmt->bind_param("iidssis", $user_id, $folioId, $amount, $status, $date, $unix_time, $currency);

        if ($stmt->execute()) {
            $trxID = $conn->insert_id;
            createActivity($user_id, $description, $portifolioName, $amount, $date, $currency, $trxID);

            if ($currency !== "bank") {
                sendmail($email, $subject, $message);
                sendmail($admin_email, $subject, $adminMessage);
                echo "<script>location.replace('invoice.php?currency=$currency&amount=$amount');</script>";
            } else {
                $bank_message = "
                    <p>You have chosen E-payment as your deposit method for Centenial Trade</p>
                    <p>Our support team would contact you soon</p>
                ";
                sendmail($email, $subject, $bank_message);
                sendmail($admin_email, $subject, $adminMessage);
                echo "<script>swal('Great', 'Our bank details would be sent to your email shortly', 'success');</script>";
            }
        } else {
            $err = $stmt->error;
            echo "<script>swal('An error occurred', 'Your deposit transaction failed: $err', 'error');</script>";
        }

        $stmt->close();
    } else {
        $min_amount *= $currency_rate;
        echo "<script>swal('An error occurred', 'Minimum amount for this plan is $symbol $min_amount', 'error');</script>";
    }
}

?>


<?php
require "footer.php";
?>
