<?php
require_once("../layouts/header.php");
$service_list = "SELECT * FROM services";
$service_list_query = mysqli_query($db_connect, $service_list);
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
                    <table class="table mb-0 thead-border-top-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>service name</th>
                                <th>service description</th>
                                <th>service icon</th>
                                <th>service status</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody class="list" id="staff">
                            <?php
                            $serial = 1;
                            foreach ($service_list_query as  $value) : ?>
                                <tr>
                                    <td><?= $serial++ ?></td>
                                    <td><?= $value["service_name"] ?></td>
                                    <td><?= $value["service_description"] ?></td>
                                    <td><?= $value["service_icon"] ?></td>
                                    <td><?= $value["status"] ?></td>
                                    <td><a href="" class="btn btn-info">update</a> <a href="./delete.php/?id=<?=$value["id"]?>" class="btn btn-danger">delete</a></td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- // END drawer-layout__content -->


        <?php
        require_once("../layouts/footer.php");
        ?>