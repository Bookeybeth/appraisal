<?php if($_SESSION["is_admin"]): ?>
<div class="flex flex-wrap justify-content-center mb-40 mx-1 mt-40">
    <div class="card-mini">
        <div>
            <p>Jane Doe</p>
        </div>
        <div>
            <p>Time: </p>
        </div>
        <div>
            <a href="admin_appraisal.php" class="text-center btn">View appraisal</a>
        </div>
    </div>
</div>

<div class="flex justify-content-center space-evenly">
    <div class="mx-1">
        <a href="create_director.php" class="create-btn text-center btn">Create director</a>
    </div>

    <div class="mx-1">
        <a href="create_appraisal.php" class="create-btn text-center btn">Create appraisal</a>
    </div>
</div>

<?php endif; ?>