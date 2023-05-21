<?php
require_once("../layouts/header.php");
$id = $_GET["id"];
$service = "SELECT * FROM services WHERE id=$id";
$service_query = mysqli_query($db_connect, $service);
$service_query_assoc = mysqli_fetch_assoc($service_query);
?>
<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">

            <div class="container-fluid page__heading-container">
                <div class="page__heading d-flex align-items-end">
                    <div class="flex">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Service</li>
                            </ol>
                        </nav>
                        <h1 class="m-0">Service</h1>
                    </div>
                </div>
            </div>

            <div class="container-fluid page__container">
                <div class="col-lg-12 card-form__body card-body">
                    <form action="./update_data.php" method="post">
                        <div class="form-group">
                            <label>Service Name</label>
                            <input type="text" class="form-control" name="service_name" value="<?= $service_query_assoc["service_name"] ?>">
                            <input type="hidden" name="id" value="<?= $id ?>">
                        </div>
                        <div class="form-group">
                            <label>Service Description</label>
                            <textarea class="form-control" name="service_description" id="" cols="30" rows="5"><?= $service_query_assoc["service_description"] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Service icon</label>
                            <input type="text" class="form-control service_icon" name="service_icon" readonly value="<?= $service_query_assoc["service_icon"] ?>">
                            <?php

                            require_once("../icons.php"); ?>
                            <div style="overflow: scroll; height: 200px; text-align: justify; margin: 15px 0px; overflow-x: hidden;">
                                <?php
                                foreach ($icons as $key => $value) : ?>
                                    <span class="badge badge-primary icons" style="margin:2px; cursor: pointer;"><i class="<?= $key ?>" style="font-size: 14px;" onclick="click()"></i></span>

                                <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Service status</label>
                            <select name="service_status" id="" class="form-control">
                                <option value="active" <?= $service_query_assoc["status"] === 'active' ? 'selected' : '' ?>>active</option>
                                <option value="inactive" <?= $service_query_assoc["status"] === 'inactive' ? 'selected' : '' ?>>inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">update service</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- // END drawer-layout__content -->


        <?php
        require_once("../layouts/footer.php");
        if (isset($_SESSION["success"])) { ?>
            <script>
                let Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: '<?= $_SESSION["success"] ?>'
                })
            </script>
        <?php
        } else if (isset($_SESSION["error"])) { ?>

            <script>
                 Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: '<?= $_SESSION["error"] ?>'
                })
            </script>
        <?php
        }
        unset($_SESSION["success"]);
        ?>
        <script>
            $(document).ready(function() {
                $(".icons").click(function() {
                    $(".service_icon").val($(this).children().attr("class"))
                });
            });
        </script>