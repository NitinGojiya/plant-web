<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if user is not logged in
    exit();
}

if (!isset($_GET['item_id'])) {
    // Redirect back to the cart page if item ID is not provided
    header("Location: cart.php");
    exit();
}

$item_id = $_GET['item_id'];

// Include database connection
include 'connect.php';

// Fetch the item from the cart to confirm it exists and belongs to the user
$username = $_SESSION['username'];
$select_item = "SELECT * FROM cart WHERE id = '$item_id' AND username = '$username'";
$query_item = mysqli_query($con, $select_item);

if (mysqli_num_rows($query_item) > 0) {
    // Item found, proceed with removal
    $delete_item = "DELETE FROM cart WHERE id = '$item_id'";
    if (mysqli_query($con, $delete_item)) {
        // Item removed successfully, redirect back to cart page
        header("Location: cart.php");
        exit();
    } else {
        // Error occurred while deleting item, redirect back to cart page with error message
        header("Location: cart.php?error=delete_failed");
        exit();
    }
} else {
    // Item not found in the user's cart, redirect back to cart page with error message
    header("Location: cart.php?error=item_not_found");
    exit();
}
?>
