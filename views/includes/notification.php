<?php if(isset($_SESSION['success-message'])) : ?>
    <div class="alert alert-success"><?php echo $_SESSION['success-message']; ?></div>
    <?php unset($_SESSION['success-message']); ?>
<?php endif; ?>

<?php if(isset($_SESSION['error-message'])) : ?>
    <div class="alert alert-danger"><?php echo $_SESSION['error-message']; ?></div>
    <?php unset($_SESSION['error-message']); ?>
<?php endif; ?>