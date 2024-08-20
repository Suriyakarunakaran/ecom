<?php include('connect.php');

?>
<!-- The Modal -->
		<div class="modal fade" id="myModallogin">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
					  <h4 class="modal-title">Login</h4>
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<!-- Modal body -->
					<div class="modal-body">
					  	<form class="contactForm" action="index.php" method="post">
						<div class="d-flex flex-wrap row1 mb-md-1">
							<div class="form-group col-12 mb-5">
								<label>Mobile Number</label>
								<input type="tel" id="mobile" class="form-control" name="mobile" placeholder="XXXXXXXXXX  *">
							</div>
							<div class="form-group col-12 mb-5">
								<label>Password</label>
								<input type="password" id="password" class="form-control" name="password" placeholder="********">
							</div>
						</div>
						<input type="submit" name="login" class="btn btn-success float-left" value="login">
						<button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
						</form>
					</div>
					<!-- Modal footer -->
					<div class="modal-footer"></div>
				</div>
			</div>
		</div>