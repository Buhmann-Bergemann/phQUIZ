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

    function addRow($data) {
        $data[] = array_fill(0, count($data[0]), '');
        return $data;
    }

    function removeRow($data) {
        if (count($data) > 1) {
            array_pop($data);
        }
        return $data;
    }

    function processFormData($data) {
        foreach ($data as $index => &$row) {
            $row = array_map(function($field, $fieldIndex) use ($index) {
                $fieldKey = "$fieldIndex-$index";
                return array_key_exists($fieldKey, $_POST) ? $_POST[$fieldKey] : '';
            }, $row, array_keys($row));
        }
        return $data;
    }

    if (isset($_GET['csv'])) {
        $csvFile = $_GET['csv'];

        $csvData = readCSV("../phQUIZ/question_packs/" . $csvFile);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['add'])) {
                $csvData = addRow($csvData);
            } elseif (isset($_POST['remove'])) {
                $csvData = removeRow($csvData);
            } else {
                $csvData = processFormData($csvData);
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
