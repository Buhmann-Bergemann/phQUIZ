<?php

// CSV File path:
$directoryPath = '../phQUIZ/question_packs/';

if (is_dir($directoryPath)) {
    $files = scandir($directoryPath);

    if ($files !== false) {
        foreach ($files as $file) {
            $filePath = $directoryPath . $file;
            if (is_file($filePath) && pathinfo($filePath, PATHINFO_EXTENSION) === 'csv') {
                $filenameWithoutExtension = pathinfo($file, PATHINFO_FILENAME);
                $path = $IsHomeScreen ? "/game/?questions=$file" : "?csv=$file";
                echo "
<a href='$path' style='text-decoration: none; color: unset'>
    <div class='question-item clickable'>$filenameWithoutExtension</div>
</a>
";
            }
        }
    } else {
        echo "Failed to scan directory for .csv files...";
    }
} else {
    echo "Directory not found...";
}
?>
