<?php
$tz = new DateTimeZone('Europe/Paris');
$ob = date_create('', $tz);
$date = date_format($ob, 'd / m / Y');
$time = date_format($ob, 'H:i');
?>

<div>
    <p> <?php echo $date . "<br>" . $time ?> </p>
</div>
<div>
    <p> <?php echo $date . "<br>" . $time ?> </p>
</div>
<div>
    <p> <?php echo $date . "<br>" . $time ?> </p>
</div>