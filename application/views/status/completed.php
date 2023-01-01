<div class="col-12 col-xl-9">
    <div class="nav">
        <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
            <div class="d-flex justify-content-start align-items-center">
                <button id="toggle-navbar" onclick="toggleNavbar()">
                    <img src="./assets/img/global/burger.svg" class="mb-2" alt="">
                </button>
                <div class="d-flex flex-column">
                    <h1 class="fw-bold">You're great, Ilham!</h1>
                </div>
            </div>
        </div>

    </div>
    <div class="content">
        <div class="row">

        </div>

        <h2 class="content-title mb-3"><img src=" <?= base_url()?>/assets/img/global/ic_completed.svg" alt=""
                class="me-2"><span>Completed</span></h2>
        <!-- <h5 class="content-desc mb-4">What will you do today?</h5> -->
        <?php if(!empty($showAllTaskByStatus)) : ?>
        <?php foreach ($showAllTaskByStatus as $task) : ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div class="ms-2 me-auto py-2">
                <div class="" style="font-weight: 500;"><?= $task['title']?></div>
                <?php if($task['idStatus'] == 4) : $color = "#85C88A"; $text = "text-dark"; endif;?>
                <?php if($task['idStatus'] == 3) : $color = "#FFDB89"; $text = "text-dark"; endif;?>
                <?php if($task['idStatus'] == 2) : $color = "#D6E4E5"; $text = "text-dark"; endif;?>
                <?php if($task['idStatus'] == 1) : $color = "#FF8787"; $text = "text-light"; endif;?>
                <span class="badge bg-transparent <?= $text?>"
                    style="font-weight: 400;background-color: <?= $color;?> !important;"><?= $task['status']?></span>
                <!-- <span class="badge rounded-pill bg-primary" ?></span> -->
            </div>

            <div class="mx-auto"><?= date('F j, Y', strtotime($task['endTime']))?></div>
            <div class=""><?= $task['priority']?></div>

            <a class="btn btn-transparent" data-bs-toggle="modal" data-bs-target="#editData<?= $task['idTask']?>"><img
                    src=" <?= base_url()?>/assets/img/global/ic_edit.svg" alt=""></a>
        </li>
        <?php endforeach;?>
        <?php else : ?>
        <li class="list-group-item d-flex justify-content-between align-items-center placeholder-glow">
            <div class="me-auto py-2 placeholder col-4"></div>

            <div class="mx-auto placeholder col-2">test</div>
            <div class="placeholder col-2">test</div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center placeholder-glow">
            <div class="me-auto py-2 placeholder col-4"></div>

            <div class="mx-auto placeholder col-2">test</div>
            <div class="placeholder col-2">test</div>
        </li>
        <?php endif; ?>
    </div>
</div>

<!-- Modal Edit -->
<?php foreach($showAllTaskByStatus as $task) : ?>
<div class="modal fade modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" id="editData<?= $task['idTask']?>"
    tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="<?= base_url()?>Task/addTask" method="post">
                    <div class="col-12 mb-3">
                        <label for="exampleInputPassword1" class="form-label">Edit task</label>
                        <input type="text" class="form-control form-control-lg" placeholder="Enter task" name="title"
                            value="<?= $task['title']?>">
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <label for="exampleInputPassword1" class="form-label">Status</label>
                            <select class="form-select" aria-label="Default select example" name="status">
                                <?php foreach($showAllTask as $byTask) : ?>
                                <?php if($task['status'] == $byTask['status']) { ?>
                                <?php $selected = "selected"; } else { $selected = " ";} ?>

                                <option value="<?= $task['status']?>" <?= $selected;?>>
                                    <?= $byTask['status']?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="exampleInputPassword1" class="form-label">Priority</label>
                            <select class="form-select" name="priority">
                                <?php foreach($showAllTaskByStatus as $byTask) : ?>
                                <?php if($task['priority'] == $byTask['priority']) { ?>
                                <?php $selected = "selected"; } else { $selected = " ";} ?>

                                <option value="<?= $task['priority']?>" <?= $selected;?>>
                                    <?= $byTask['priority']?>
                                </option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="exampleInputPassword1" class="form-label">Due time</label>
                        <input type="date" class="form-control" placeholder="Deadline" name="endTime"
                            value="<?= $task['endTime']?>">
                    </div>
            </div>
            <div class="d-grid p-3">
                <button type="submit" class="btn btn-save btn-transparent mb-2"
                    style="background-color: #6271EB;color: white;">Save</button>
                <button type="button" class="btn btn-cancel btn-transparent" data-bs-dismiss="modal"
                    style="background-color: #eeeeee;color: grey;">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php endforeach; ?>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
document.querySelector('#editData').addEventListener('click', () => {
    var idTask = $(this).attr('data-id');
    $.ajax({
        url: "<?= base_url()?>edit/" + idTask,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#idTask').val(data.idTask);
            $('.modal-edit').modal('show');
        }
    });
});
</script>