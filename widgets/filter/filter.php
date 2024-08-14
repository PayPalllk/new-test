 <!-- фильтр -->
    <div class="filter-line">
      <div class="sticky">
      <div id="filter">
      <?php 
      if($_COOKIE['user'] == 'ADMIN'){
  $rec = mysqli_query($bd,"SELECT `type` FROM `product` GROUP BY `type`");
  while($type = mysqli_fetch_assoc($rec)){ 
  $tip = $type['type'];
  $case = $case + '1';
  ?>
  <div data-index="<?=$case?>"><?=$tip?></div>
  <?php }
  }
?>
      </div>
      <button id="filterReset">Сбросить фильтр</button>
      </div>
    </div>
