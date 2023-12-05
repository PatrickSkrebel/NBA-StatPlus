<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Style for the dropdown content columns */
        .column {
            float: left;
            width: 50%; /* Two columns, each taking up 50% of the width */
            padding: 5px; /* Adjust the padding as needed */
            height: 150px; /* Adjust the height as needed */
            overflow-y: auto;
        }

        /* Style for the dropdown content */
        .dropdown-content {
            display: flex;
            flex-wrap: wrap; /* Allow columns to wrap to the next line */
            justify-content: space-between; /* Space between the two columns */
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            padding: 5px; /* Adjust the padding as needed */
        }

        /* Style for the dropdown content links */
        .dropdown-content a {
            display: block;
            color: #333;
            padding: 10px;
            text-decoration: none;
        }

        /* Change color on hover */
        .dropdown-content a:hover {
            background-color: #ddd;
        }
    </style>
    <title>Styled Dropdown Example</title>
</head>
<body>

    <!-- Dropdown container -->
    <div class="dropdown">
        <!-- Dropdown button -->
        <button class="dropbtn">Dropdown</button>
        
        <!-- Dropdown content -->
        <div class="dropdown-content">
            <!-- Two columns with rows of links -->
            <div class="column">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                <!-- ... Repeat links in this column -->
            </div>
            
            <div class="column">
                <a href="#">Link 11</a>
                <a href="#">Link 12</a>
                <!-- ... Repeat links in this column -->
            </div>
        </div>
    </div>

</body>
</html>