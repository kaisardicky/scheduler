<?php
   	$Field = $_POST['Field'];
    $RN = $_POST['RN'];
    $RC = $_POST['RC'];
    $Vendor = $_POST['Vendor'];
    $Activity = $_POST['Activity'];
    $WN = $_POST['WN'];
    $TD = $_POST['TD'];
    $Duration = $_POST['Duration'];
    echo "Berikut data Event yang telah dimasukkan <br /> - Field = ". $Field. "<br /> - RIG Name = " . $RN . "<br /> - RIG Capacity = " . $RC . "<br /> - Vendor = " . $Vendor . "<br /> - Activity = " . $Activity . "<br /> - Well Name = " . $WN . "<br /> - Target Depth = " . $TD . "<br /> - Duration =  " . $Duration . "<br />Terima kasih, data sudah tersimpan di Database";

    //echo $_POST['Activity, Field'];

?>