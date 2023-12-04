<?php
require 'disable-paste.js.php';
require 'inventory-function.js.php';
require 'inventory-stock-checker-refresh.js.php';
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="Capstone_Inventory.css" />
  <link rel="stylesheet" href="Capstone_ClinicAboutUs copy.css">

  <!----===== Icons ===== -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

  <!--=====Change name mo na lang====-->
  <title>Admin Dashboard Panel</title>
</head>

<body>
  <!--=====Navigation Bar====-->
  <?php require 'nav-bar.html.php'; ?>
  <!--=====Pinaka taas/ title ganon====-->
  <section class="content">
    <div class="top">
      <i class="sidebar-toggle"><span class="material-symbols-outlined"> menu </span></i>
      <div class="title">
        <span class="text">Inventory</span>
      </div>
    </div>

    <div class="web-content">
      <div class="menu">
        <div class="search-box">
          <input type="text" id="search" placeholder="Search here..." />
        </div>
        <div class="bttn">
          <?php require 'inventory-product-id-gen.js.php'; ?>
          <button class="add-button" onclick="openForm(); generateAndDisplayId();">+ Add New</button>
          <button class="filter" onclick="openFormFilter()">
            <span class="material-symbols-outlined">filter_list</span>
          </button>
        </div>
      </div>
      <br>
      <div class="overview">
        <div class="stock-level">
          <div></div>
          <div class="stock-level-status">
            <label class="title-status">Level</label>
            <label class="h-status"> High </label>
            <label class="l-status"> Low</label>
            <label class="n-status"> No Stock</label>
          </div>
        </div>

        <!--View table-->
        <div class="item-table">
          <div class="activity">
          <table>
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Status</th>
                <th scope="col">Type</th>
                <th scope="col" colspan="2">Action</th>
              </tr>
            </thead>
            <tbody id="table-body">
              <?php require 'inventory-refresh-data.js.php'; ?>
            </tbody>
          </table>
          </div>
        </div>
      </div>
      <!--Add-->
      <div class="form-popup" id="myForm">
        <form action="" class="form-container">
          <div class="title">Add Items</div>
          <div class="form">
            <div class="inputfield">
              <label>ID</label>
              <input type="number" class="input" id="addId" disabled />
            </div>
            <div class="inputfield">
              <label>Name</label>
              <input type="text" class="input" id="addName" maxlength="50" onkeydown="return /[0-9a-zA-Z\s]/i.test(event.key)" autocomplete="off" />
            </div>
            <div class="inputfield">
              <label>Max Quantity</label>
              <input type="number" class="input" id="addMaxQuantity" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" />
            </div>
            <div class="inputfield">
              <label>Min Quantity</label>
              <input type="number" class="input" id="addMinQuantity" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" />
            </div>
            <div class="inputfield">
              <label>Type</label>
              <div class="custom_select">
                <select id="addType">
                  <option value="Dog Food">Dog Food</option>
                  <option value="Cat Food">Cat Food</option>
                  <option value="Vaccine">Vaccine</option>
                  <option value="Accessories">Accessories</option>
                  <option value="Vitamins">Vitamins</option>
                </select>
              </div>
            </div>
            <div class="inputfield">
              <?php require 'inventory-data.js.php'; ?>
              <input type="button" value="Cancel" class="btn-cancel" onclick="closeForm(); clearInputs();" />
              <input type="button" value="Add Product" class="btn-add" onclick="submitData('addProduct');" />
            </div>
          </div>
          <button type="button" class="btn-close" onclick="closeForm(); clearInputs();">
            Close
          </button>
        </form>
      </div>

      <!--Edit-->
      <div class="form-popup-edit" id="myForm-edit">
        <form action="" class="form-container">
          <div class="title">Add Items</div>
          <div class="form">
            <div class="inputfield">
              <label>ID</label>
              <input type="number" class="input" id="editId" disabled />
            </div>
            <div class="inputfield">
              <label>Name</label>
              <input type="text" class="input" id="editName" maxlength="50" onkeydown="return /[0-9a-zA-Z\s]/i.test(event.key)" autocomplete="off" />
            </div>
            <div class="inputfield">
              <label>Max Quantity</label>
              <input type="number" class="input" id="editMaxQuantity" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" />
            </div>
            <div class="inputfield">
              <label>Min Quantity</label>
              <input type="number" class="input" id="editMinQuantity" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" />
            </div>
            <div class="inputfield">
              <label>Type</label>
              <div class="custom_select">
                <select id="editType">
                  <option value="Dog Food">Dog Food</option>
                  <option value="Cat Food">Cat Food</option>
                  <option value="Vaccine">Vaccine</option>
                  <option value="Accessories">Accessories</option>
                  <option value="Vitamins">Vitamins</option>
                </select>
              </div>
            </div>
            <div class="inputfield">
              <?php require 'inventory-data.js.php'; ?>
              <input type="button" value="Cancel" class="btn-cancel" onclick="closeFormEdit();" />
              <input type="button" value="Add Product" class="btn-add" onclick="submitData('editProduct');" />
            </div>
          </div>
          <button type="button" class="btn-close" onclick="closeFormEdit();">
            Close
          </button>
      </div>
      <!--Filter--->
      <div class="form-popup-filter" id="myForm-filter">
        <form action="" class="form-container-filter">
          <div class="title-filter">Select Category</div>
          <div class="form-filter">
            <div class="inputfield">
              <input type="radio" id="Dog Food" name="category" value="Dog Food" onclick="displayRadioValue()" />
              <label>Dog Food</label>
            </div>
            <div class="inputfield">
              <input type="radio" id="Cat Food" name="category" value="Cat Food" onclick="displayRadioValue()" />
              <label>Cat Food</label>
            </div>
            <div class="inputfield">
              <input type="radio" id="Vaccine" name="category" value="Vaccine" onclick="displayRadioValue()" />
              <label>Vaccine</label>
            </div>
            <div class="inputfield">
              <input type="radio" id="Vitamins" name="category" value="Vitamins" onclick="displayRadioValue()" />
              <label>Vitamins</label>
            </div>
          </div>
          <button type="button" class="btn-close" onclick="closeFormFilter(); clearSearch();">
            Close
          </button>
        </form>
      </div>
      <!--Delete-->
      <div class="form-popup-delete" id="myForm-delete">
        <form action="" class="form-container-delete">
          <div class="title">Are you sure?</div>
          <div class="form-delete">
            <label>This will be permanently deleted</label>
            <div class="inputfield">
              <input type="button" value="Cancel" class="btn-cancel" onclick="closeFormDelete()" />
              <input type="button" value="Delete" class="btn-delete" onclick="submitData('deleteProduct'); closeFormDelete();" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>

</html>