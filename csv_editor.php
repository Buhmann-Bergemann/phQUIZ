<div class="editor">
    <?php
    function readCSV($filePath) {
        $data = [];

        if (($handle = fopen($filePath, "r")) !== FALSE) {
            while (($row = fgetcsv($handle)) !== FALSE) {
                $data[] = $row;
            }
            fclose($handle);
        }

        return $data;
    }

    function saveCSV($filePath, $data) {
        if (($handle = fopen($filePath, "w")) !== FALSE) {
            foreach ($data as $row) {
                fputcsv($handle, $row);
            }
            fclose($handle);
        }
    }

    if (isset($_GET['csv'])) {
        $csvFile = $_GET['csv'];

        $csvData = readCSV("../phQUIZ/question_packs/" . $csvFile);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['add'])) {
                $csvData[] = array_fill(0, count($csvData[0]), ''); // Add a new row with empty values
            } elseif (isset($_POST['remove']) && count($csvData) > 1) {
                array_pop($csvData); // Remove the last row, but keep at least one row
            } else {
                // Process data
                foreach ($csvData as $index => &$row) {
                    if ($index !== 0) { // Ignore header
                        foreach ($row as $fieldIndex => &$field) {
                            $field = isset($_POST["$fieldIndex-$index"]) ? $_POST["$fieldIndex-$index"] : $field;
                        }
                    }
                }
            }

            saveCSV("../phQUIZ/question_packs/" . $csvFile, $csvData);
        }


        echo '<form method="post">';
        echo '<table>';
        // Header row
        echo '<tr>';
        foreach ($csvData[0] as $fieldIndex => $field) {
            echo "<th>$field</th>";
        }
        echo '</tr>';
        // Data rows
        foreach ($csvData as $index => $row) {
            echo '<tr>';
            foreach ($row as $fieldIndex => $field) {
                echo "<td><input type='text' name='$fieldIndex-$index' value='$field'></td>";
            }
            echo '</tr>';
        }
        echo '</table>';
        echo '<button type="submit" name="add">Add Row</button>';
        if (count($csvData) > 1) {
            echo '<button type="submit" name="remove">Remove Row</button>';
        }
        echo '<input type="submit" value="Save Changes">';
        echo '</form>';
    } else {
        echo '<p>No CSV file specified in the URL.</p>';
    }
    ?>
</div>
