<!--This file will contain the form where users can select and vote for their options -->
<html>
    <head>
        <title>Poll System</title>
    </head>
    <body>
        <h1>Choose  your favorite Sweet</h1>
        <form action="index.php" method="POST">
           <?php foreach($poll_options as $option => $votes): ?>
            <div>
                <input type="radio" name="vote" value="<?= $option; ?>"required><?= $option; ?>
              </div>
         <?php endforeach; ?>
         <button type="submit">Select</button>
        </form>
    </body>
</html>