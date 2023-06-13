<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<?php if (isset($_SESSION['message'])): ?>
  <p><?php echo $_SESSION['message']; ?></p>
  <?php unset($_SESSION['message']); ?>
<?php endif; ?>
