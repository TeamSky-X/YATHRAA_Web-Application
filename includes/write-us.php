<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
{
//var_dump($_POST['report']);
$issue=$_POST['issue'];
$description=$_POST['description'];
$report=$_POST['report'];
$email=$_SESSION['login'];
$sql="INSERT INTO   tblissues(UserEmail,Issue,description,post_id) VALUES(:email,:issue,:description,:post_id)";
$query = $dbh->prepare($sql);
$query->bindParam(':issue',$issue,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':report',$report,PDO::PARAM_INT);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Info successfully submited ";
echo "<script type='text/javascript'> document.location = 'thankyou.php'; </script>";
}
else
{
$_SESSION['msg']="Something went wrong. Please try again.";
echo "<script type='text/javascript'> document.location = 'thankyou.php'; </script>";
}
}
?>

	<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
							<section>
							<form name="help" method="post">
								<div class="modal-body modal-spa">
									<div class="writ">
										<h4>REPORT THE POST</h4>
											<ul>

												<li class="na-me">
													<select id="country" name="issue" class="frm-field required sect" required="">
														<option value="">Select the Reason</option>
														<option value="Inappropriated Content">Inappropriate</option>
														<option value="Forbidden Integrity">False Information</option>
														<option value="Spam Attempt">Spam</option>
														<option value="Other">other</option>
													</select>
												</li>

												<li class="descrip">
									<input class="special" type="text" placeholder="Describe the reason"  name="description" required="">
												</li>
													<div class="clearfix"></div>
											</ul>
											<div class="sub-bn">
<!--												<form>-->
<!--													<button type="submit" name="report" class="subbtn">Report</button>-->
<!--												</form>-->
                                                <form method="POST">

                                                    <!--                                            <input type="hidden" name="id" value="--><?php //echo $_POST['id']; ?><!--">-->
                                                    <input type="hidden" name="report" value="<?php echo $result->id;?>"><button type="submit">Report</button>

                                                </form>

											</div>
									</div>
								</div>
								</form>
							</section>
					</div>
				</div>
			</div>
