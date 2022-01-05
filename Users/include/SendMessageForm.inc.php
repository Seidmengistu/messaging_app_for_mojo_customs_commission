<div class="form-group">
    <div class="mb-3">
        <label class="form-label">Sender Name</label>
        <input readonly class="form-control" name='from' value="<?php echo $app ?>" required>

    </div>

    <div class="mb-3">
        <label class="form-label">Select Recipant Name</label>
        <select class="form-control" name="too" id="Recipant_Name" required>

            <option required>
                <?php 
                    $username=$_SESSION['username']; 
                    $conn=mysqli_connect('localhost','root','','mwa');
                    $sql = $conn->query("SELECT Full_Name FROM users WHERE status=1 && Role='Admin'  ORDER BY `Full_Name`") or die(mysqli_error());
                    while($row = $sql->fetch_array()){
                ?>
            <option value="<?php echo $row['Full_Name']?>">
                <?php echo $row['Full_Name']?>
            </option>
            <?php
                }
                ?>
        </select>
    </div>

    <div class="mb-3">
<label class="form-label">Section</label>
        <select name="section" class="form-control" required="" placeholder="Section">
            <option value="">Select Section</option>
            <option value="EOG">EOG</option>
            <option value="TCS">TCS</option>
            <option value="AM">AM</option>
            <option value="BC">BC</option>
            <option value="MEF">MEF</option>
            <option value="MG">MG</option>
            <option value="IPS">IPS</option>
            <option value="GN">GN</option>
            <option value="ME">ME</option>
            <option value="IOG">IOG</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Floor</label>
        <input class="form-control" name='floor' required>

    </div>

    <div class="mb-3">
        <label for="validationCustom05" class="form-label">Room Number</label>
        <input type="text" class="form-control" name='room' id="validationCustom05" required>
    </div>



    <div class="mb-3">
        <label for="to">Problem Type</label>
        <select name="problem" class="form-control" id="department">
            <option>Select Problem Type</option>
            <option value="Software">1.Software Problem</option>
            <option value="Hardware">2.Hardware</option>
            <option value="">3.</option>
            <option value="">4. </option>
            <option value="">5.</option>
            <option value="">6.</option>
            <option value="">7.</option>
            <option value="">8.</option>
            <option value="">9.</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Problem Explanation</label>
        <textarea name="problemexp" class="form-control" placeholder="Give brief explanation how the problem occur    
        ችግሩ እንደት እንደተፈጠረ አብራሩ"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Date</label>
        <input readonly type="date" class="form-control" name='date' id="validationCustom05"
            Value="<?php $mydate=new DateTime(); echo $mydate->format('Y-m-d')?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Time</label>
        <input readonly type="time" class="form-control" name='time' id="validationCustom05"
            value="<?php $mytime=date('h:i:s'); echo $mytime?>" required>
    </div>
</div>