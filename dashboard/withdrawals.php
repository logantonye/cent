<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "header.php";
?>



<!-- Transactions -->
<div class="row">
<div class="col-md-12 col-lg-12 order-2 mb-4 mx-auto">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Withdrawals</h5>
                      <div class="dropdown">
                       
                       
                      </div>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Transaction id</th>
                        <th>Portifolio</th>
                        <th>Amount</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                    <?php
                            $getActivities = mysqli_query($conn, "SELECT * FROM `user_activities` WHERE `user_id` = '$id' AND `type`='withdraw' ORDER BY `id` DESC");
                            if(mysqli_num_rows($getActivities)>0){
                              while($activities = mysqli_fetch_assoc($getActivities)){
                                $portifolioId = $activities['portifolio_name'];
                                $date = $activities['date'];
                                $amount = $activities['amount'];
                                $trxID = $activities['id'];
                                $transaction_status=$activities['status'];
                                
                              

                                echo"
                                <tr>
                                <td>#$trxID</td>
                        <td><i class='fab fa-angular fa-lg text-danger me-3'></i> <strong>$portifolioId</strong></td>
                        
                        <td>
                          $$amount
                            
                        </td>
                        <td>
                          $date
                        </td>
                      </tr>
                                
                                ";
                              }
                            }
                                

                    ?>
                      
                    </tbody>
                  </table>
                </div>
                    </div>
                  </div>
                </div>
                <!--/ Transactions -->
                        </div>



<?php
require "footer.php";
?>