<?php

require_once('../php/defined.php');
?>
var hostinstalldir='http://'+window.location.hostname+'<?php echo VOTING_SYSTEM_FOLDER;?>';

window.onload = function query() {
	const voteSystem__Submit = document.querySelector('input[name="voteSystem__Submit"]');
	const voteSystem__Select = document.querySelector('select[name="voteSystem__Select"]');

	voteSystem__Submit.addEventListener('click', function() {
		if ( !parseInt( voteSystem__Select.value ) ) {
			alert('Please, choose a product');
			voteSystem__Select.focus();
			return false;
		}

		const tmp = parseInt( document.querySelector( 'input[name="radio1"]:checked' ).value );
		if (tmp == 0){
			alert('Please, choose your vote');
			return false;
		}

		$.post(hostinstalldir+'php/voted.php',{'product':escape(voteSystem__Select.value),'vot':escape(tmp)},function(data) {
		alert(data);
			var bla = escape(voteSystem__Select.value);
			$('#sreda').empty();
			$('#sreda').load(hostinstalldir+'php/check.php?prodid='+bla);
		});
	});
}
