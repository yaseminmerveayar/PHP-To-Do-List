<!-- Add Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">Enter a new Task</h5>
        </div>
        <div class="modal-body">
            <form action="#" method="POST">
                <div class="form-floating mb-3">
                    <input type="text" name="AddTaskName" class="form-control" id="AddFloatingInput" placeholder="Task Name">
                    <label for="floatingInput">Task Name</label>
                </div>
                <div class="form-floating mb-3">
                <select class="form-select " name="AddProcess" id="AddProcess">
                    <option value="To Do">To Do</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
                    <label for="process">Select a status</label>
                </div>
                <div class="form-floating mb-3">
                <select class="form-select" name="AddUsers" id="AddUsers">
                    <?php
                    foreach ($db_users as $key) {
                        echo "<option value='".$key['username']."'>".$key['username']."</option>";
                    }
                    ?>
                </select>
                    <label for="users">Select a user</label>
                </div>
                
                <div class="float-end">
                    <button type="submit" class="btn btn-dark">Add Task</button>
                </div>
            </form>  
            
        </div>
        
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="myEditModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">Edit the Task</h5>
        </div>
        <div class="modal-body">
            <h1 id="gt"></h1>
            <form action="#" method="POST">
                <input type="hidden" name="taskId" id="taskId">
                <div class="form-floating mb-3">
                    <input type="text" name="EditTaskName" class="form-control" id="EditFloatingInput">
                    <label for="floatingInput">Task Name</label>
                </div>
                <div class="form-floating mb-3">
                <select class="form-select " name="EditProcess" id="EditProcess">
                    <option value="In Progress">In Progress</option>
                    <option value="To Do">To Do</option>
                    <option value="Completed">Completed</option>
                </select>
                    <label for="process">Select a status</label>
                </div>
                <div class="form-floating mb-3">
                <select class="form-select" name="EditUsers" id="EditUsers">
                    <?php
                    foreach ($db_users as $key) {
                        echo "<option value='".$key['username']."'>".$key['username']."</option>";
                    }
                    ?>
                </select>
                    <label for="users">Select a user</label>
                </div>
                
                <div class="float-end">
                    <button type="submit" class="btn btn-dark">Update Task</button>
                </div>
            </form>  
            
        </div>
        
        </div>
    </div>
</div>
<!-- Filter Modal -->
<div class="modal fade" id="myFilterModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">Filter the Task</h5>
        </div>
        <div class="modal-body">
            <form action="#" method="POST">
                <div class="form-floating mb-3">
                <select class="form-select " name="process" id="process">
                    <option value=""></option>
                    <option value="In Progress">In Progress</option>
                    <option value="To Do">To Do</option>
                    <option value="Completed">Completed</option>
                </select>
                    <label for="process">Filter with status</label>
                </div>

                <div class="form-floating mb-3">
                <select class="form-select" name="users" id="users">
                    <option value=""></option>
                    <?php
                    foreach ($db_users as $key) {
                        echo "<option value='".$key['username']."'>".$key['username']."</option>";
                    }
                    ?>
                </select>
                    <label for="users">Filter with user</label>
                </div>
                
                <div class="float-end">
                    <button type="submit" class="btn btn-dark">Apply Filter</button>
                </div>
            </form>  
            
        </div>
        
        </div>
    </div>
</div>
<!-- Filter Modal -->
<div class="modal fade" id="myFilterModalProfile" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">Filter the Task</h5>
        </div>
        <div class="modal-body">
            <form action="#" method="POST">
                <div class="form-floating mb-3">
                <select class="form-select " name="ProfilProcess" id="process">
                    <option value=""></option>
                    <option value="In Progress">In Progress</option>
                    <option value="To Do">To Do</option>
                    <option value="Completed">Completed</option>
                </select>
                    <label for="process">Filter with status</label>
                </div>
                
                <div class="float-end">
                    <button type="submit" class="btn btn-dark">Apply Filter</button>
                </div>
            </form>  
            
        </div>
        
        </div>
    </div>
</div>
