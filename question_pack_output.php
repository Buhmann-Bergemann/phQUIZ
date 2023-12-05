<?php

// CSV File path:
$directoryPath = '../../phQUIZ/question_packs/';
$files = scandir($directoryPath);

foreach ($files as $file) {
    $filePath = $directoryPath . $file;
    if (is_file($filePath) && pathinfo($filePath, PATHINFO_EXTENSION) === 'csv') {
        $filenameWithoutExtension = pathinfo($file, PATHINFO_FILENAME);
        echo "
<a href='?csv=$file' style='text-decoration: none; color: unset'>
    <div class='question-item clickable'>$filenameWithoutExtension</div>
</a>
";
    }
}

?>
