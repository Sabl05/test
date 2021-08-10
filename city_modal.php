<div class="container city-btn">
	<br class="invis"><button type="button" name="button" class="city_btn"><span class="lang" key="choose_city">Выбрать город:</span><span href=""> Алматы

		</span></button>
</div>

<!--
<div class="container city-btn">
	<br class="invis"> <span><button type="button" name="button" class="city_btn px-2" id="myBtn" style="font-size: 17px;"><span class="lang city_btn" key="choose_city">Выбрать город:</span> <span href="#" class="city_text city_btn"><?php

  #  echo $_SESSION['city'];


   ?> </span></button></span>
</div>

-->


<!-- The Modal -->
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content container">
  <div class="modal-header">
    <span class="close">&times;</span><br><br>
    <h2 class="title-middle text-white lang" style="display: block;" key="choose_city">Выберите город</h2>
  </div>
  <div class="modal-body">

    <?php
      $sql = "select city_name from city;";
      $statement = $dbh->prepare($sql);
      $statement->execute();
      $cities = $statement->fetchAll(\PDO::FETCH_ASSOC);
      foreach ($cities as $value) {
    ?>
    <div>
      <a href="./includes/save_city.php?id=<?php echo $value['city_name']; ?>" class="modal-link">
        <?php echo $value['city_name']; ?>
      </a>
    </div>
    <?php } ?>

  </div>
</div>
</div>
