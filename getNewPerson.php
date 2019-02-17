<?php

include 'PersonGenerator.php';

$person = (new \VirtualPersonGenerator\PersonGenerator())->getPerson();

?>
<div class="personBox">
	<img class="portrait" src="<?= $person->photoLink ?>" onload="window.scrollTo(0,document.body.scrollHeight);">
	<p><b><?= $person->name ?> (age <?= $person->age ?>)</b>, <?= $person->country ?></p>
	<p><a href="mailto:<?= $person->email ?>"><?= $person->email ?></a></p>
</div>
