<?php
class App
{
  public static $endpoint = 'http://localhost:8888/fakelegostore_api/';

  public static function getGroupedArray()
  {
    try {
      $array = self::getData();
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

  private static function getData()
  {
    $json = @file_get_contents(self::$endpoint);
    if (!$json) {
      throw new Exception('Could not access ' . self::$endpoint);
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