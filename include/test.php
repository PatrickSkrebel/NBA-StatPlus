<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .scrollable-div {
            width: 100%;
            height: 200px;
            overflow-x: auto;
            border: 1px solid #ccc;
            margin: 20px;
            display: flex;
            /* Make sure columns are placed next to each other */
            flex-wrap: nowrap;
        }

        .column {
            flex: 1; /* Distribute available space equally among columns */
            min-width: 0; /* Allow columns to shrink beyond their content size */
            border-right: 1px solid #ddd; /* Add right border to separate columns */
            box-sizing: border-box; /* Include border in the total width of the columns */
        }

        .column:last-child {
            border-right: none; /* Remove border for the last column */
        }

        .column p {
            padding: 10px;
            margin: 0;
        }
    </style>
    <title>Scrollable Div with PHP</title>
</head>
<body>

    <div class="scrollable-div" id="myScrollableDiv">
        <?php
        // Your PHP content goes here
        for ($i = 1; $i <= 6; $i++) {
            echo "<div class='column'><p>Content $i</p></div>";
        }
        ?>
    </div>

    <script>
        // Add a scroll wheel event listener to the div with the id "myScrollableDiv"
        document.getElementById('myScrollableDiv').addEventListener('wheel', function (event) {
            // Adjust the scroll speed based on your needs
            this.scrollLeft += event.deltaY * 0.5;
            event.preventDefault();
        });
    </script>

</body>
</html>