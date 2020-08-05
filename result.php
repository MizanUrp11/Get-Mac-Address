<?php
    include "header.php";
    include "functions.php";
    $connection = new Connection;

    //print_r( $_SESSION['products'] );

    if ( isset( $_GET['delete'] ) ) {
        $the_id = $_GET['id'];
        $connection->deleteData( "DELETE FROM info WHERE id=$the_id" );
        header( 'Location: result.php' );
    }

?>

<div class="container">
<div class="alert alert-success" id="success-alert">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>Success! </strong> Product added to your wishlist.
</div>
    <h2 class="display-4 mb-3">
        All Records
    </h2>

    <a id="cart_count_link" target="_blank" href="cart-page.php" class="btn btn-info mb-3">
    <i class="fas fa-shopping-cart"></i> <span class="badge badge-light" id="cart_count">
      <?php
          if ( isset( $_GET['resetcart'] ) ) {
              $_SESSION['products'] = array();
              $products_count = count( $_SESSION['products'] );
              echo $products_count;
              header( "Location: result.php" );
          } else {
              $products_array = $_SESSION['products'];
              $products_count = count( $products_array );
              echo $products_count;

          }
      ?>
    </span>
    </a>


    <div class="row">
        <input class="form-control mr-sm-2 mb-3" type="search" placeholder="Search for something" aria-label="Search" id="myInput" onkeyup="myFunction()">

    <table class="table table-hover" id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Age</th>
      <th scope="col">Home Town</th>
      <th scope="col">Job</th>
      <th scope="col">Add to menu</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

  <?php
      $result = $connection->getAll( 'SELECT * FROM info' );
      foreach ( $result as $res ) {
          $id = $res['id'];
          $firstName = $res['firstName'];
          $lastName = $res['lastName'];
          $age = $res['age'];
          $homeTown = $res['homeTown'];
          $job = $res['job'];

      ?>
        <tr>
          <th scope="row"><?php echo $id; ?></th>
          <td><?php echo $firstName; ?></td>
          <td><?php echo $lastName; ?></td>
          <td><?php echo $age; ?></td>
          <td><?php echo $homeTown; ?></td>
          <td><?php echo $job; ?></td>
          <td><a id="<?php echo $id ?>" onclick="addToCart(<?php echo $id ?>,this)" href="javascript:;" class="btn <?php if(in_array( $id, $products_array, true )){echo 'btn-secondary';}else{echo 'btn-warning';} ?> addAllert">
        <?php
            $products_array = $_SESSION['products'];
                if ( in_array( $id, $products_array, true ) ) {
                    echo "Added";
                    //header("Location: result.php");
                } else {
                    echo "Add";
                }
            ?>
        </a></td>
          <td><a target="_blank" href="update.php?update&id=<?php echo $id; ?>" class="btn btn-info">Update</a></td>
          <td><a href="result.php?delete&id=<?php echo $id; ?>" class="btn btn-warning">Delete</a></td>
        </tr>

        <?php
            }
        ?>




  </tbody>
</table>
    </div>
    <a href="index.php" class="btn btn-primary">Add More</a>
    <a href="getUser.php" class="btn btn-warning">View By Category</a>

    <a href="result.php?resetcart=0" class="btn btn-primary">Reset Cart</a>
</div>

<p class="d-none" id="current_session"><?php echo json_encode($_SESSION['products']); ?></p>
<?php include "footer.php";?>