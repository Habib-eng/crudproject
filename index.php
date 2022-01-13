<?php
require 'header.php';
require 'db.php';
$sql = 'SELECT * FROM data ';
$result = $db->prepare($sql);
$result->execute();
$articles = $result->fetchALl(PDO::FETCH_OBJ);
?>
<?php
function format($date){ //ecrire la date sous la forme:  Mois date, année
  $dict = array(
    '01' => 'January',
    '02' => 'February',
    '03' => 'March',
    '04' => 'April',
    '05' => 'May',
    '06' => 'June',
    '07' => 'July',
    '08' => 'August',
    '09' => 'September',
    '10' => 'October',
    '11' => 'NOvember',
    '12' => 'December'
  );
  return $dict[substr($date,3,2)].substr($date,0,2).','.' 20'.substr($date,6,2); 
}
foreach($articles as $value){
  echo "<div class='col-md-6' style='width:100%; padding: 0px 20%'>
          <div class='row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative'>
            <div class='col p-4 d-flex flex-column position-static'>
              <strong class='d-inline-block mb-2 text-success'>".$value->category."</strong>
              <h3 class='mb-0'>".$value->title."</h3>
              <div class='mb-1 text-muted'>".format($value->date)." By ".$value->firstName."  ".$value->lastName."</div>
              <p class='mb-auto'>".$value->exampleFormControlTextarea1."</p>
              <a href='#' class='stretched-link'>Continue reading</a>
            </div>
            <div class='col-auto d-none d-lg-block'>
              <svg class='bd-placeholder-img' width='200' height='250' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Placeholder: Thumbnail' preserveAspectRatio='xMidYMid slice' focusable='false'><title>Placeholder</title><rect width='100%' height='100%' fill='#55595c'/><text x='50%' y='50%' fill='#eceeef' dy='.3em'>Thumbnail</text></svg>
            </div>
          </div>
        </div>";
}
?>
<?php require 'footer.php' ?>