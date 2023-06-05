<?php
require_once("../layouts/header.php");
$id = $_GET["id"]
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
                    <form action="./update_data.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Portfolio image</label>
                            <input type="file" class="form-control" name="portfolio_image">
                        </div>
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div class="form-group">
                            <label>select category</label>
                            <select name="portfolio_category" class="form-control">
                                <option value="wordpress">wordpress</option>
                                <option value="Branding">Branding</option>
                                <option value="website">Web Design</option>
                                <option value="app">App Design</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>portfolio status</label>
                            <select name="portfolio_status" id="" class="form-control">
                                <option value="active">active</option>
                                <option value="inactive">inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">add portfolio</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- // END drawer-layout__content -->


        <?php
        require_once("../layouts/footer.php");
        if (isset($_SESSION["success"])) { ?>
            <script>
                const Toast = Swal.mixin({
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