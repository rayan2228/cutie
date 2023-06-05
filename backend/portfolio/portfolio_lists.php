<?php
require_once("../layouts/header.php");
$portfolio_list = "SELECT * FROM portfolioes";
$portfolio_list_query = mysqli_query($db_connect, $portfolio_list);
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
                                <th>portfolio image</th>
                                <th>portfolio category</th>
                                <th>portfolio status </th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody class="list" id="staff">
                            <?php
                            $serial = 1;
                            foreach ($portfolio_list_query as  $value) : ?>
                                <tr>
                                    <td><?= $serial++ ?></td>
                                    <td><img src="../../uploads/portfolio/<?= $value["portfolio_image"] ?>" alt="" width="100"></td>
                                    <td><?= $value["portfolio_category"] ?></td>
                                    <td><?= $value["portfolio_status"] ?></td>
                                    <td><a href="./update.php?id=<?= $value["id"] ?>" class="btn btn-info">update</a> <button class="btn btn-danger delete" value="<?= $value["id"] ?>">delete</button></td>
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
        <script>
            const deleteElm = document.querySelectorAll(".delete");
            const deleteElmToArr = Array.from(deleteElm);
            deleteElmToArr.forEach((deleteBtn) => {
                deleteBtn.addEventListener("click", function() {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = `./delete.php?id=${deleteBtn.value}`
                        }
                    })
                })
            })
        </script>