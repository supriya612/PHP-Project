<h2>Poll Results</h2>
<ul>
    <?php foreach($poll_options as $option => $votes): ?>
        <li><?= $votes . " People " . "Like " . $option ." "; ?></li>
        <?php endforeach; ?>
    </ul>