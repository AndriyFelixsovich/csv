<?php
include ("function.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div id="wrap">
    <div class="container">
        <div class="row">
            <form action="function.php" method="post" name="upload_excel" enctype="multipart/form-data">
                <fiedest>
                    <legend>Import and Export CSV</legend>
                    <div class="form-group">
                        <label class=""
                            for="filebuttom">Select file</label>
                        <div class="">
                            <input type="file" id="file"
                            class = "input-large" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=""
                               for="singlebuttom">import data</label>
                        <div class="">
                            <button type="submit" id="submit" name="import"
                                class = ""
                                data-loading-text = "Loading...">Upload
                            </button>
                        </div>
                    </div>
                </fiedest>
            </form>
        </div>
        <?php
        get_all_records();
        ?>
    </div>
</div>
</body>
</html>
