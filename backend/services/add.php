<?php
require_once("../layouts/header.php");
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
                    <form action="./add_data.php" method="post">
                        <div class="form-group">
                            <label>Service Name</label>
                            <input type="text" class="form-control" name="service_name">
                        </div>
                        <div class="form-group">
                            <label>Service Description</label>
                            <textarea class="form-control" name="service_description" id="" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Service icon</label>
                            <input type="text" class="form-control" name="service_icon">
                        </div>
                        <div class="form-group">
                            <label>Service status</label>
                            <select name="service_status" id="" class="form-control">
                                <option value="active">active</option>
                                <option value="inactive">inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">add service</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- // END drawer-layout__content -->


        <?php
        require_once("../layouts/footer.php");
        ?>