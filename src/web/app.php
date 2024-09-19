<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Burn after running!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-5">Burn After Running!</h1>
            <p>This webapp should have never existed in the first place. But it does, so if you ever see this message
                &emdash; burn it!</p>
            <form method="post">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="echo 'Ich bin ein Hamburger!" id="eval" name="eval"
                              style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Got code to run? Try `echo 'Ich bin ein Hamburger!' .
                        PHP_EOL;`</label>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary">Dare to try?</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?php

            if (!empty($_POST['eval'])) {
                echo "<div class='bg-light mt-5 px-3 py-3'><h2>If your code produced output it should appear here:</h2>\n<pre class='mt-2 py-2 border-top border-bottom'>\n";
                eval($_POST['eval']);
                echo "</pre></div>\n";
            } else {
                phpinfo();
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>