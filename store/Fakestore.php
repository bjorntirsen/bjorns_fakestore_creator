<?php
class Fakestore
{
  public static function create($endpoint){
    $grouped_array = self::getGroupedArray($endpoint);
    //var_dump(array_keys($grouped_array));
    foreach ($grouped_array as $key => $value) {
      self::renderCategory($key, $value);
    }
    /* foreach (array_keys($grouped_array) as $category_name) {
      echo $category_name . '</br>';
    } */
  }

  public static function renderCategory($category, $items){
    echo "<p>$category</p>";
    //var_dump($items);
    $ol = '<ol>';
    foreach ($items as $value) {
      $ol .= "<li>$value[title]</li>";
    }
    $ol .= '</ol>';
    echo $ol;
  }

  public static function renderGroupedArray($endpoint){
    print_r(self::getGroupedArray($endpoint));
  }

  public static function getGroupedArray($endpoint)
  {
    try {
      $array = self::getData($endpoint);
      return self::groupArray($array);
    } catch (Exception $error) {
      echo $error->getMessage();
    }
  }

  private static function groupArray($array) {
    $grouped_array = array();
    foreach ($array as $item) {
      $category = $item['category'];
      $grouped_array[$category] = $grouped_array[$category] ?? $grouped_array[$category] = [];
      array_push($grouped_array[$category],$item);
    }
    return $grouped_array;
  }

  public static function getData($endpoint)
  {
    $json = @file_get_contents($endpoint);
    if (!$json) {
      throw new Exception('Could not access ' . $endpoint);
    }
    return json_decode($json, true);
  }

  public static function renderProductCards($array)
  {
    $cards = '';
    foreach ($array as $item) {
      $cards .= "<div class='card m-2' style='width: 18rem;'>
        <img src='$item[image]' class='limit-img card-img-top p-3' alt='$item[title]'>
        <div class='card-body'>
          <h5 class='card-title py-3'>$item[title]</h5>
          <div class='d-flex align-items-baseline justify-content-around'>
            <p class='card-text'>Price: $ $item[price]</p>
            <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modal$item[id]'>
              Details
            </button>
          </div>
        </div>
      </div>
      <!-- Modal -->
        <div class='modal fade' id='modal$item[id]' tabindex='-1' aria-labelledby='modal$item[id]Label' aria-hidden='true'>
          <div class='modal-dialog'>
            <div class='modal-content p-3'>
              <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>$item[title]</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>
              <div class='modal-body'>
                <h5>Details:</h5>
                <p class=''>$item[description]</p>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
              </div>
            </div>
          </div>
        </div>";
    }
    echo $cards;
  }
}