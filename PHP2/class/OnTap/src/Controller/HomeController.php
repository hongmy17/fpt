<?php

namespace App\Controller;

use App\Framework\Viewer;
use App\Model\Category;
use App\Model\Product;
use App\Model\User;
use Exception;

class HomeController {
  public function index() {
    $model = new Category();
    $users = $model->findAll();

    $viewer = new Viewer();
    echo $viewer->render("categories.php", $users);
  }

  public function categoryAdd() {
    $viewer = new Viewer();
    echo $viewer->render("categoryAddForm.php");
  }

  public function xulyCategoryAdd() {
    $model = new Category();
    // kiem tra du lieu
    $isValidated = $model->validate($_POST);

    if ($isValidated) {
      // neu dung du lieu
      try {
        // them du lieu
        $isAdded = $model->store($_POST);
        if ($isAdded) {
          // qua trang danh sach category
          header("Location: /category");
          exit;
        }
      } catch (Exception $e) {
        // neu co loi trong qua trinh them du lieu thi in the div nay
        echo "<div class='form-text alert alert-danger'>{$e->getMessage()}</div>";
      }
    } else {
      // in dong nay neu sai du lieu
      echo "<div class='form-text alert alert-danger'>Invalid data</div>";
    }

    $viewer = new Viewer();
    // load form add voi du lieu cu
    echo $viewer->render("categoryAddForm.php", $_POST);
  }

  public function editCategory() {
    $model = new Category();
    $category = $model->find($_GET["id"]);
    
    $viewer = new Viewer();
    echo $viewer->render("categoryEditForm.php", $category);
  }

  public function xulyEditCategory() {
    $model = new Category();
    // kiem tra du lieu
    $isValidated = $model->validate($_POST);

    if ($isValidated) {
      // neu dung du lieu
      try {
        // update du lieu
        $isUpdated = $model->update($_GET["id"], $_POST["name"], $_POST["priority"]);
        if ($isUpdated) {
          // neu update thanh cong, qua trang danh sach category
          header("Location: /category");
          exit;
        }
      } catch (Exception $e) {
        // neu update that bai, in the div nay
        echo "<div class='form-text alert alert-danger'>{$e->getMessage()}</div>";
      }
    } else {
      // neu sai du lieu, in the div nay
      echo "<div class='form-text alert alert-danger'>Invalid data</div>";
    }

    $viewer = new Viewer();
    // load form edit voi du lieu cu
    echo $viewer->render("categoryEditForm.php", $_POST);
  }
}