<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/header.php'; ?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/includes/notification.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header">
                    <h3>Sign Up</h3>
                </div>
                <div class="card-body">
                    <form action="/app/controllers/RegisterController.php" method="POST">
                        <div class="form-group row">
                            <label class="col-4 text-right">Name</label>
                            <div class="col-8">
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 text-right">Email</label>
                            <div class="col-8">
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 text-right">Password</label>
                            <div class="col-8">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/footer.php'; ?>