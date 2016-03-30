<?php
include_once("../inc/connect.php");
include_once("../functions.php");

if (isset($_GET['v'])) {
    $v = $_GET['v'];
    if ($v === "company") {
        $getAdmin = "SELECT  `id`, `cat`  FROM `comcat`";
        $getAdminResult = $pdo->prepare($getAdmin);
        $getAdminResult->execute();
        ?>
        <div class="form-group">
        <div class="col-sm-4">
            <label for="cat">Select Category :</label>
        </div>
        <div class="col-sm-8">
            <select class="form-control" id="ccat" name="ccat">
                <option value="0">-- Select Category --</option>
                <?php
                while ($row = $getAdminResult->fetchObject()) {
                    ?>
                    <option value="<?php echo $row->id; ?>">  <?php echo $row->cat; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div>
        </div>
        <?php
    }

    if ($v === "individual") {
        $getAdmin = "SELECT  `id`,`catname`  FROM `icat`";
        $getAdminResult = $pdo->prepare($getAdmin);
        $getAdminResult->execute();
        ?>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="icat">Select Category :</label>
            </div>
            <div class="col-sm-8">
                <select class="form-control" id="icat" name="icat">
                    <option value="0">-- Select Category --</option>
                    <?php
                    while ($row = $getAdminResult->fetchObject()) {
                        ?>
                        <option value="<?php echo $row->id; ?>">  <?php echo $row->catname; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        </div>
        <?php
    }
}

if (isset($_GET['cat']) && $_GET['cat'] == 5) {
    $cat = $_GET['cat'];
    $getAdmin = "SELECT  `id`,`extra`  FROM `comextra`";
    $getAdminResult = $pdo->prepare($getAdmin);
    $getAdminResult->execute();
    ?>
    <br/><br/>
    <div class="form-group">
        <div class="col-md-offset-3">
            <?php
            while ($row = $getAdminResult->fetchObject()) {
                ?>
                <label class="checkbox-inline"><input type="checkbox" id="<?php echo $row->id; ?>"
                                                      value="<?php echo $row->extra; ?>"><?php echo $row->extra; ?>
                </label>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}

if (isset($_GET['icat']) && $_GET['icat'] < 3) {
    $icat = $_GET['icat'];
    $checkQuery = "SELECT `id`, `category` FROM `icextra` WHERE `icatId`=:icat";
    $checkStmt = $pdo->prepare($checkQuery);
    $checkStmt->bindParam(':icat', $icat, PDO::PARAM_INT);
    $checkStmt->execute();
    ?>
<br /><br />
    <div class="form-group">
        <div class="col-sm-4">
            <label for="icattwo">Select Sub Category :</label>
        </div>
        <div class="col-sm-8">
            <select class="form-control" id="icattwo" name="icattwo">
                <option value="0">-- Select Sub Category --</option>

                <?php
                while ($row = $checkStmt->fetchObject()) {
                    ?>
                    <option value="<?php echo $row->id; ?>">  <?php echo $row->category; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>

    <?php
}