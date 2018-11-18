<?php

require_once('../php/defined.php');
?>
const hostinstalldir='http://'+window.location.hostname+'<?php echo VOTING_SYSTEM_FOLDER;?>';

window.onload = function query() {
	const votingSystem = document.getElementById('votingSystem');
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

		fetch(hostinstalldir+'php/voted.php', {
			method: 'post',
			headers:{
			    'Content-Type': 'application/x-www-form-urlencoded'
			},
			body: encodeURI('product=' + voteSystem__Select.value + '&vot=' + tmp)
		})
		.then(function(response) {
			return response.text();
		})
		.then(function(data) {
			console.log(data);
			alert(data);
			const bla = escape(voteSystem__Select.value);
			votingSystem.innerHTML = '';

			fetch(hostinstalldir+'php/check.php?prodid='+bla)
			.then(function(response) {
				return response.text();
			})
			.then(function(data) {
				document.getElementById('votingSystem').innerHTML = data;
			})
			.catch(function(error){
				console.log(error);
			})
		})
		.catch(function(error){
			console.log(error);
		})
	});
}
