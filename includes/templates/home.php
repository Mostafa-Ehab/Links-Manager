<?php include "$tmp/header.php" ?>

<body class='home'>
    <?php include "$tmp/navbar.php" ?>
    <div>
        <div class="errorAlert">
            <div class="alert alert-warning text-center">
                No Results To Show Try <a href="#" target="_blank">Google Search</a>
            </div>
        </div>
        <div class="errorAlert">
            <div class="alert alert-danger text-center">
                <strong>Error! </strong>No URL With ID <span></span> <a href="#">Let Us Know</a>
            </div>
        </div>
        <div class="errorAlert">
            <div class="alert alert-success text-center">
                <strong>Successfully! </strong><span> </span> Favourites
            </div>
        </div>

        <div class="errorAlert">
            <div class="alert alert-success text-center">
                <strong>Successfully! </strong> Copied URL
            </div>
        </div>

        <div class="errorAlert">
            <div class="alert alert-success text-center">
                <strong>Successfully! </strong> Deleted URL
            </div>
        </div>
    </div>
    <div class="container">
        <form name="form" class="search-bar">
            <div>
                <!-- <p class="error text-danger" id="search-err"></p> -->
                <input type="text" class="form-control" placeholder="Search" name="search" id="search" autocomplete="off">
            </div>
        </form>
        <div id="accordion">
            <?php
            foreach ($results as $result) {
            ?>
                <div class="card" data-id="<?php echo $result['ID']; ?>">
                    <?php
                    /*
                        ** Start Card Header [Title & Favourite]
                        */
                    ?>
                    <div class="card-header" id="head<?php echo $result['ID']; ?>">
                        <div class="row">
                            <div class="col-11 text-row">
                                <button class="btn btn-link collapse-button" data-toggle="collapse" data-target="#body<?php echo $result['ID']; ?>" aria-controls="body<?php echo $result['ID']; ?>">
                                    <i class="fa fa-chevron-circle-right"></i>
                                </button>
                                <a href='<?php echo $result['URL']; ?>' target="_blank">
                                    <?php echo $result['Title']; ?>
                                </a>
                            </div>
                            <div class="col-1">
                                <div class="btn float-right <?php echo ($result['Fav'] == 1) ? "yellow-star" : "black-star"; ?>">
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="body<?php echo $result['ID']; ?>" class="collapse" aria-labelledby="head<?php echo $result['ID']; ?>" data-parent="#accordion">
                        <?php
                        /*
                        ** Start Card Body [URL & Time]
                        */
                        ?>
                        <div class="card-body">
                            <p>
                                <i class="fa fa-globe"></i>
                                <a href='<?php echo $result['URL']; ?>' style="word-break: break-all;" target="_blank">
                                    <?php echo $result['URL']; ?>
                                </a>
                            </p>
                            <p>
                                <i class="fa fa-calendar-week"></i>
                                <?php echo $result['Time']; ?>
                            </p>
                        </div>

                        <?php
                        /*
                        ** Start Buttons [Footer]
                        */
                        ?>
                        <div class="card-footer grid-container">
                            <div class="btn copy" data-clipboard-text="<?php echo $result['URL']; ?>">
                                <i class="fa fa-copy"></i>
                            </div>
                            <div class="btn qrcode" data-toggle="modal" data-target="#QR<?php echo $result['ID']; ?>">
                                <i class="fa fa-qrcode"></i>
                            </div>
                            <div class="btn">
                                <i class="fa fa-edit"></i>
                            </div>
                            <div class="btn qrcode" data-toggle="modal" data-target="#del<?php echo $result['ID']; ?>">
                                <i class="fa fa-trash"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Start QR Code Modal -->
                <div class="modal fade" id="QR<?php echo $result['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">QR Code</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                                        <i class="fa fa-times"></i>
                                    </span>
                                </button>
                            </div>

                            <div class="modal-body text-center">
                                <img class="qr-img" src='/?action=qrcode&url-id=<?php echo $result['ID']; ?>'>
                                <div>
                                    <a href='<?php echo $result['URL']; ?>' style="word-break: break-all;" target="_blank">
                                        <?php echo $result['URL']; ?>
                                    </a>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End QR Code Modal -->

                <!-- Start Delete Confirm Modal -->
                <div class="modal fade" id="del<?php echo $result['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog del-confirm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete URL</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                                        <i class="fa fa-times"></i>
                                    </span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <h5>Are you sure you want to delete this URL?</h5>
                            </div>

                            <div class="modal-footer del-confirm">
                                <button class="btn btn-primary" data-dismiss="modal">Close</button>
                                <button class="btn btn-outline-danger float-right delete" data-dismiss="modal" data-id="<?php echo $result['ID']; ?>">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Delete Confirm Modal -->
            <?php
            }
            ?>
        </div>
        <a class="btn btn-primary" id="form-btn" data-toggle="modal" data-target="#addLink">
            <i class="fa fa-plus"></i> Add Link</a>
        </a>

        <div class="modal fade" id="addLink" tabindex="-1" role="dialog" aria-labelledby="add-link-header" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add-link-header">Add Link</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-times"></i></span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form name="add">
                            <div class="form-group">
                                <p class="error text-danger" id="title-err"></p>
                                <label for="title" class="col-form-label">Title:</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter Title" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <p class="error text-danger" id="url-err"></p>
                                <label for="url" class="col-form-label">Enter URL</label>
                                <input type="text" class="form-control" id="url" placeholder="Enter URL" autocomplete="off">
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" id="sendLink">Add Link</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="text" id="copyText" readonly />

    <script src="layout/js/home.js"></script>

    <?php include "$tmp/footer.php" ?>