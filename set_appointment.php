<?php
include('admin/db_connect.php');
$qry = $conn->query("SELECT * from system_settings limit 1");
if($qry->num_rows > 0){
	foreach($qry->fetch_array() as $k => $val){
		$meta[$k] = $val;
	}
}
	?>
<style>
	#uni_modal .modal-footer {
		display: none
	}

	.online-checkup {
		display: none;
	}
</style>
<div class="container-fluid">
	<div class="col-lg-12">
		<div id="msg"></div>
		<form action="" id="manage-appointment">
			<input type="hidden" name="doctor_id" value="<?php echo $_GET['id'] ?>">
			<div class="form-group">
				<label for="" class="control-label">Date</label>
				<input type="date" value="" name="date" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="" class="control-label">Time</label>
				<input type="time" value="" name="time" class="form-control" required>
			</div>
			<?php if($_GET['amount']) { ?>
			<div class="custom-control custom-switch">
				<input type="checkbox" name="isOnlineCheckup" class="custom-control-input" id="customSwitch1">
				<label class="custom-control-label" for="customSwitch1">Request for online checkup</label>
			</div>
			<?php } ?>
			<div class="form-group online-checkup">
				<select class="custom-select" name="payment_method">
					<option selected>Select Payment Method</option>
					<option value="1">Bkash</option>
					<option value="2">Rocket</option>
					<option value="3">Nogod</option>
				</select>
			</div>
			<div class="form-group online-checkup">
				<label for="amount">Amount</label>
				<input type="text" value="<?php echo $_GET['amount'] ?>" class="form-control" id="amount" name="online_checkup_fee" disabled>
			</div>
			<div class="form-group online-checkup">
				<label for="trxID">Transaction ID</label>
				<input type="text" class="form-control" id="trxID" name="trx_id" placeholder="Transaction ID">
			</div>
			<div class="online-checkup">
				<div class="alert alert-info" role="alert">
					Please "send money" to below numbers <br/>
					Bkash: <?php echo isset($meta['bkash']) ? $meta['bkash'] : '' ?> <br/>
					Rocket: <?php echo isset($meta['rocket']) ? $meta['rocket'] : '' ?> <br/>
					Nogod: <?php echo isset($meta['nogod']) ? $meta['nogod'] : '' ?> <br/>
				</div>
			</div>

			<hr>
			<div class="col-md-12 text-center">
				<button class="btn-primary btn btn-sm col-md-4">Request</button>
				<button class="btn btn-secondary btn-sm col-md-4  " type="button" data-dismiss="modal"
					id="">Close</button>
			</div>
		</form>
	</div>
</div>

<script>

	$("#customSwitch1").on("change paste keyup", function (e) {
		if (e.target.checked) {
			$(".online-checkup").show();
		} else {
			$(".online-checkup").hide();
		}
	});

	$("#manage-appointment").submit(function (e) {
		e.preventDefault()
		start_load()
		$.ajax({
			url: 'admin/ajax.php?action=set_appointment',
			method: 'POST',
			data: $(this).serialize(),
			success: function (resp) {
				resp = JSON.parse(resp)
				if (resp.status == 1) {
					alert_toast("Request submitted successfully");
					end_load();
					$('.modal').modal("hide");
				} else {
					$('#msg').html('<div class="alert alert-danger">' + resp.msg + '</div>')
					end_load();
				}
			}
		})
	})
</script>