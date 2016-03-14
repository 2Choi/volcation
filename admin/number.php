<div class="number-container">
  <form action="manage.php" method="post">
  <?php
    echo '<input class="mileage" name="mileage" type="number" value="'.$row['mileage'].'"/>';
    echo '<input type="hidden" name="user_id" value="'.$row['user_id'].'"/>';
  ?>
    <div class="number-control" value="1000000">
      <button type="button" class="plus">+</button>
      <p>1000000</p>
      <button type="button" class="minus">-</button>
    </div> <!-- 1000000 -->
    <div class="number-control" value="100000">
      <button type="button" class="plus">+</button>
      <p>100000</p>
      <button type="button" class="minus">-</button>
    </div> <!-- 100000 -->
    <div class="number-control" value="10000">
      <button type="button" class="plus">+</button>
      <p>10000</p>
      <button type="button" class="minus">-</button>
    </div> <!-- 10000 -->
    <div class="number-control" value="1000">
      <button type="button" class="plus">+</button>
      <p>1000</p>
      <button type="button" class="minus">-</button>
    </div> <!-- 1000 -->
    <input class="button button-small button-primary" type="submit" name="submit" value="저장"/>
  </form>
</div>
