<?php
class MenuItem {
  private $item_name;
  private $item_meal;
  private $item_price;
  private $item_imagefile;
  private $item_desc;

  public function __construct() {
    ;
  }

  public function setItemName($itemName) {
    $this->item_name = $itemName;
  }

  public function setItemMeal($itemMeal) {
    $this->item_meal = $itemMeal;
  }

  public function setItemPrice($itemPrice) {
    $this->item_price = $itemPrice;
  }

  public function setItemImageFile($itemImageFile) {
    $this->item_imagefile = $itemImageFile;
  }

  public function setItemDesc($itemDesc) {
    $this->item_desc = $itemDesc;
  }


  public function getItemName() {
    return htmlspecialchars($this->item_name);
  }

  public function getItemMeal() {
    return htmlspecialchars($this->item_meal);
  }

  public function getItemPrice() {
    return htmlspecialchars($this->item_price);
  }

  public function getItemImageFile() {
    return htmlspecialchars($this->item_imagefile);
  }

  public function getItemDesc() {
    return htmlspecialchars($this->item_desc);
  }
}
?>