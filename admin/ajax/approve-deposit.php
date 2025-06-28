<?php
require "../../config.php";
require "../../mail.php";

$trx_id = $_POST['trx_id'] ?? null;

if (!$trx_id) {
    echo "Invalid transaction ID.";
    exit;
}

$update = mysqli_query($conn, "UPDATE `transactions` SET `status`='approved' WHERE id='$trx_id'");

$select = mysqli_query($conn, "SELECT * FROM `transactions` WHERE id='$trx_id'");
$fetch = mysqli_fetch_assoc($select);

if (!$fetch) {
    echo "Transaction not found.";
    exit;
}

$user_id = $fetch['user_id'];
$folio_id = $fetch['folio_id'];
$withdraw_amount = $fetch['amount'];
$is_bot = $fetch['is_bot'];


$folio_balance = 0;
$get_portfolio = mysqli_query($conn, "SELECT * FROM portifolios WHERE id='$folio_id'");
if ($get_portfolio && mysqli_num_rows($get_portfolio) > 0) {
    $folio = mysqli_fetch_assoc($get_portfolio);
    $folio_balance = $folio['balance'];
}

$select_referrer = mysqli_query($conn, "SELECT * FROM referrals WHERE user_id='$user_id'");
if ($select_referrer && mysqli_num_rows($select_referrer) > 0) {
    $refer = mysqli_fetch_assoc($select_referrer);
    $referred_by = $refer['refer_by'];

    if ($referred_by != 0) {
        $referral_bonus = (5 / 100) * $withdraw_amount;

        $get_account = mysqli_query($conn, "SELECT * FROM accounts WHERE user_id='$referred_by'");
        if ($get_account && mysqli_num_rows($get_account) > 0) {
            $account = mysqli_fetch_assoc($get_account);
            $account_balance = $account['balance'] + $referral_bonus;

            $date = date("l jS \of F Y");

            mysqli_query($conn, "UPDATE accounts SET balance='$account_balance' WHERE user_id='$referred_by'");
            mysqli_query($conn, "INSERT INTO `user_activities` (user_id, transaction_id, description, portifolio_name, amount, date)
                                 VALUES ('$referred_by', '0', 'Referral bonus', 'No portfolio', '$referral_bonus', '$date')");
        }
    }
}

$new_balance = $withdraw_amount + $folio_balance;
if ($is_bot == "no") {
    mysqli_query($conn, "UPDATE `portifolios` SET `status`='active', `balance`='$new_balance' WHERE `id`='$folio_id'");
}

$select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE `id` = '$user_id'");
if ($select_user && mysqli_num_rows($select_user) > 0) {
    $user = mysqli_fetch_assoc($select_user);
    $username = $user['username'];
    $email = $user['email'];

    if ($update) {
        $client_message = "
            <p>Your Deposit on Centenial Trade has been approved.</p>
        ";
        sendmail($email, "Deposit Approved", $client_message, null, $username);
        echo "You approved this Deposit";
    } else {
        echo "Failed to update transaction.";
    }
} else {
    echo "User not found.";
}
?>
