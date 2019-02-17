<?php include "PersonGenerator.php";
$personGenerator = new VirtualPersonGenerator\PersonGenerator();
/** @var \VirtualPersonGenerator\Person $person */
$person = $personGenerator->getPerson();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="UTF-8">
	<title>Virtual Person Generator</title>
	<script>
		function getNewPerson() {
			let fetchStart = new Event( 'fetchStart', { 'view': document, 'bubbles': true, 'cancelable': false } );
			let fetchEnd = new Event( 'fetchEnd', { 'view': document, 'bubbles': true, 'cancelable': false } );

			document.dispatchEvent(fetchStart);
			let personsDiv = document.getElementById('persons');
			fetch('/getNewPerson.php')
				.then(response => response.text())
				.then(function (data) {
					personsDiv.insertAdjacentHTML('beforeend', data);
					document.dispatchEvent(fetchEnd);
				})
				.catch(function () {
					console.log(response);
				})
		}

		document.addEventListener('fetchStart', function() {
			document.getElementById('showMoreButton').innerText = 'Loading...';
		});

		document.addEventListener('fetchEnd', function() {
			document.getElementById('showMoreButton').innerText = 'Show new random person!';
		});
	</script>
</head>
<body>
<h1>Virtual Person Generator</h1>
<div id="persons">
	<script>getNewPerson();</script>
</div>
<button id="showMoreButton" onclick="getNewPerson()">Loading...</button>
</body>
</html>