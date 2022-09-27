<?php 
    require('configuration/brand.php'); 
    require('components/flash.php');     

    $parameters = array(
        "task" => "Accomplishing Tasks Requested", 
        "exp" => "Job-Related Expertise",
        "skill" => "Functional and Technical Knowledge/Skills",
        "time" => "Manages Time Efficiently",
        "assignment" => "Willingness to Accept Assignments",
        "result" => "Accountable for Results",
        "relation" => "Relates well with Staff",
        "team" => "Collaboration & Teamwork",
        "creativity" => "Innovation and Creativity",
        "learn" => "Willingness to Learn",
        "attendance" => "Punctuality/Attendance",
        "respect" => "Respects Confidentiality",
        "transparent" => "Demonstrates Transparency",
        "feedback" => "Seeks Feedback",
        "norms" => "Seeks Opportunity to Perform-Beyond the Normal Scope of his/her position"
    );
    
    $index = 1;
?>

<!DOCTYPE html>
<html lang="en">
    <?php include('components/header.php') ?>
<body class="bg2">
    <?php include('components/nav.php') ?>
    <div class="flex content space-evenly">
        <div>
            <p>Please carry out rating assessment. Using the competency scale, indicate the appropriate competency level in terms of achievement/fufilment for interns.</p>
        </div>
    </div>
    <form>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Parameter</th>
                    <th>Intern Ratings</th>
                    <th>Dirctors Rating</th>
                    <th>Comments</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($parameters as $key => $val): ?>
                <tr>
                    <td><?php echo $index; $index++ ?></td>
                    <td><?php echo $val ?></td>

                    <td>3</td>

                    <td>
                       <p>7</p>
                    </td>

                    <td>
                        <p id="<?php echo $key . '_appraiser'?>">No comment</p>
                    </td>
        
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="form-control mx-1">
            <input type="submit" value="Approve">
        </div>
    </form>
</body>
</html>