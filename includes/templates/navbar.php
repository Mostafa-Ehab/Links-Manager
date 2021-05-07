<nav class="navbar navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="/">Links Manager</a>

    <div class="dropdown">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
            <?php echo $_SESSION['username'] ?>
        </button>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
    </div>
</nav>
