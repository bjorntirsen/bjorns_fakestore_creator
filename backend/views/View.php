<?php

class View
{
  //MAIN METHODS:

  public static function renderStyledPage($title)
  {
    self::renderHead($title);
    self::renderNav($title);
    self::renderSelection();
    var_dump($_POST);
    //self::renderMain();
    self::renderFooter();
  }

  //HELPER METHODS:
  private static function renderHead($title)
  {
    include_once 'partials/head.php';
  }

  private static function renderNav($title)
  {
    include_once 'partials/nav.php';
  }

  private static function renderSelection()
  {
    include_once 'partials/selection.php';
  }

  private static function renderMain()
  {
    include_once 'partials/main.php';
  }

  private static function renderFooter()
  {
    include_once 'partials/footer.php';
  }
}
