<?php
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

<div class="flex content space-evenly">
    <div>
        <p>Please carry out a self-assessment. Using the competency scale, indicate the appropriate competency level in terms of achievement/fufilment.</p>
    </div>
</div>
<form>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Parameter</th>
                <th>Rating by Corper/Intern</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($parameters as $key => $val): ?>
            <tr>
                <td><?php echo $index; $index++ ?></td>
                <td><?php echo $val ?></td>

                <td>
                    <div class="container rating"> 
                        <input data-comment="<?php echo "#". $key . '_appraiser'?>" type="range" max="5" name="<?php echo $key . '_intern'?>" class="my-slider" min="0" max="100" value="0">
                        <span class="slider_value">0</span>
                    </div>
                </td>

                <td>
                    <!-- <div class="container appraiser">
                        <input type="range" name="<?php echo $key . '_appraiser'?>" class="my-slider" min="0" max="100" value="0">
                        <span class="slider_value">0</span>
                    </div> -->
                    <p id="<?php echo $key . '_appraiser'?>">No comment</p>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="form-control mx-1">
        <input type="submit" value="Submit">
    </div>
</form>
<script src="/assets/js/script.js"></script>