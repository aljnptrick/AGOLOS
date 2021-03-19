<?php 
	include "header/header-admin.php";
	include "database.php";
	include "account.php";

	$database=new Database();
	$db=$database->getConnection();
	$acc=new Account($db); 

	echo "<center><h2>Archieved Account's</h2>
		<h2>Request For Activation</h2></center>";

	//Views all pending accounts
	$stmt=$acc->pendingAccounts();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  	extract($row);
  	echo "<div class='alert alert-warning'>
			<strong>Account Name:</strong> {$lastName},{$firstName} requesting to reactivate his account. <a class='nav-link' href=''>Activate Now</a>
			<a class='btn btn-danger text-white delete-object' delete-id='{$accountId}'>Ignore</a>
		</div>";
	}
?>
<!-- Script for deleting an account pending for activation -->
<script>
	$(document).on('click', '.delete-object', function(){
	    var id = $(this).attr('delete-id');
	    var q = confirm("Are you sure?");
	    if (q == true){
        $.post('accountDelete.php', {
            accountId: id
        }, function(data){
            location.reload();
        }).fail(function() {
            alert('Unable to delete.');
        });
    }
});
</script>
<?php
	include "footer/footer.php";
?>