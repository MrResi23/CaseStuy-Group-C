<?php

//Store slot by slot using array
//Nur Hafni (1913844), Nurul Sa'adah  (1911510) ,Nur Husnina (1817234)
$slot = array (

//--Storage that contains 30 slots, each slot have maximum 5 parcels
//--Parcels stored based on house no

  //Slot 1 to 5
  array(71,22,18,23,98),
  array(21,15,13,45,67),
  array(16,76,35,98,12),
  array(54,25,11,79,21),
  array(83,26,94,56,32),

  //Slot 6 to 10
  array(98,35,25,28,93),
  array(27,85,26,73,26),
  array(72,24,27,93,17),
  array(51,63,57,15,28),
  array(17,27,36,31,78),

  //Slot 11 to 15
  array(45,29,12,53,18),
  array(56,86,35,90,3),
  array(73,84,63,18,11),
  array(47,48,24,32,48),
  array(64,58,20,79,37),

  //Slot 16 to 20
  array(16,39,25,27,47),
  array(15,25,24,15,14),
  array(70,38,26,35,58),
  array(25,37,18,48,84),
  array(17,46,34,27,24),

  //Slot 21 to 25
  array(15,84,25,56,74),
  array(75,84,73,78,35),
  array(36,24,27,96,84),
  array(38,14,68,35,68),
  array(63,37,34,85,10),

  //Slot 26 to 30
  array(14,78,45,35,36),
  array(24,96,69,23,35),
  array(60,47,26,80,21),
  array(54,84,24,24,36),
  array(26,26,65,69,57)
);

//Variable for slot's addition
$a = 1;

//Function to generate random string for slot ID
// Yasha (2017701), Syafiq (1913521)
function generateRandomString($length = 5) {
  $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

//--Using for loop to access array that has been stored

//Loop for row
//Nur Hafni (1913844), Nurul Sa'adah  (1911510) ,Nur Husnina (1817234)
for ($row = 0; $row < 30; $row++)
{
  //Display slot number
  echo ("Slot " .$row+$a. ": ID (" . mt_rand(100,500) . generateRandomString() . ") ---> ");

    //Loop for column
    for ($col = 0; $col < 5; $col++)
    {
       //Display parcel no
       echo " |".$slot[$row][$col]."|"."<b> </b>";
    }

//--Calculate date duration to know how long the parcels have been stored for each slot

//Start point of date range
//Nur Hafni (1913844), Nurul Sa'adah  (1911510) ,Nur Husnina (1817234)
$start = strtotime("1 December 2021");

//End point of date range
$end = strtotime("4 December 2021");

//Random date for start and end
$startDate =  mt_rand($start, $end);
$endDate =  mt_rand($start, $end);

//Change to date format
$randomDate1 = date("d M Y", $startDate);
$randomDate2 = date("d M Y", $endDate);

//echo $randomDate1;
//echo $randomDate2;

//Calculate difference between start and end date by call a function
$dateIntervals = dateDiff($randomDate1, $randomDate2);

//Display the difference between start and end date
echo "--- This slot was stored for " .$dateIntervals. " days";

//Check the duration of parcel in the slot to determine if it will be sent back to sender
//Yasha (2017701), Syafiq (1913521)
if ($dateIntervals < 2) {
    echo " --- PARCEL IN STORAGE";

} elseif ($dateIntervals == 2) {
    echo " --- UNCOLLECTED PARCEL : Parcel has been stored for 2 days.";
    echo " This will be returned to sender";
}
// elseif ($dateIntervals > 2) {
//     echo " --- UNCOLLECTED PARCEL : Parcel has been returned to sender.";
// }

echo "<br> </br>";
}

//Function to calculate difference between start and end date
//Nur Hafni (1913844), Nurul Sa'adah  (1911510) ,Nur Husnina (1817234)
function dateDiff($randomDate1, $randomDate2)
{
        //Calulating the difference in timestamps
        $difference = strtotime($randomDate1) - strtotime($randomDate2);

    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds
    return ceil(abs($difference / 86400));
}
?>
