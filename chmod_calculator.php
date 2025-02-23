<!DOCTYPE html>
<html>
<head>
    <title>Chmod Calculator with Multiple Permission Groups</title>
    <style>
        /* Basic CSS styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
        }
        .group {
            margin-bottom: 20px;
        }
        .group h2 {
            margin-bottom: 10px;
        }
        label {
            display: inline-block;
            margin-right: 15px;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #e2e2e2;
        }
    </style>
    <script>
        // JavaScript function to calculate permissions
        function calculatePermissions() {
            // Define the permission groups
            var groups = ['owner', 'group', 'others'];
            var numericPermissions = [];
            var symbolicPermissions = [];
            
            groups.forEach(function(group) {
                var value = 0;
                var symbol = "";
                
                // Check for Read permission (value: 4)
                if (document.getElementById(group + "_read").checked) {
                    value += 4;
                    symbol += "r";
                } else {
                    symbol += "-";
                }
                
                // Check for Write permission (value: 2)
                if (document.getElementById(group + "_write").checked) {
                    value += 2;
                    symbol += "w";
                } else {
                    symbol += "-";
                }
                
                // Check for Execute permission (value: 1)
                if (document.getElementById(group + "_execute").checked) {
                    value += 1;
                    symbol += "x";
                } else {
                    symbol += "-";
                }
                
                numericPermissions.push(value);
                symbolicPermissions.push(symbol);
            });
            
            // Update the result fields
            document.getElementById("numericResult").innerText = numericPermissions.join('');
            document.getElementById("symbolicResult").innerText = symbolicPermissions.join(' ');
        }
        
        // Attach event listeners to update calculation on checkbox changes
        window.onload = function(){
            var checkboxes = document.querySelectorAll("input[type=checkbox]");
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener("change", calculatePermissions);
            });
            // Initial calculation on page load
            calculatePermissions();
        };
    </script>
</head>
<body>
<div class="container">
    <h1>Chmod Calculator</h1>
    
    <!-- Owner Permissions -->
    <div class="group">
        <h2>Owner Permissions</h2>
        <label>
            <input type="checkbox" id="owner_read" name="owner_read"> Read
        </label>
        <label>
            <input type="checkbox" id="owner_write" name="owner_write"> Write
        </label>
        <label>
            <input type="checkbox" id="owner_execute" name="owner_execute"> Execute
        </label>
    </div>
    
    <!-- Group Permissions -->
    <div class="group">
        <h2>Group Permissions</h2>
        <label>
            <input type="checkbox" id="group_read" name="group_read"> Read
        </label>
        <label>
            <input type="checkbox" id="group_write" name="group_write"> Write
        </label>
        <label>
            <input type="checkbox" id="group_execute" name="group_execute"> Execute
        </label>
    </div>
    
    <!-- Others Permissions -->
    <div class="group">
        <h2>Others Permissions</h2>
        <label>
            <input type="checkbox" id="others_read" name="others_read"> Read
        </label>
        <label>
            <input type="checkbox" id="others_write" name="others_write"> Write
        </label>
        <label>
            <input type="checkbox" id="others_execute" name="others_execute"> Execute
        </label>
    </div>
    
    <!-- Display the Results -->
    <div class="result">
        <h2>Results:</h2>
        <p><strong>Numeric Permission:</strong> <span id="numericResult">000</span></p>
        <p><strong>Symbolic Permission:</strong> <span id="symbolicResult">---------</span></p>
    </div>
</div>
</body>
</html>
