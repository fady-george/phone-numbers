<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>validate phone numbers</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }

        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
                ' Calibri', 'Trebuchet MS', 'sans-serif';
        }

        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }

        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        td {
            font-weight: lighter;
        }
    </style>
</head>

<body>
    <section>
        <h1>phone numbers</h1>
        <form method="GET" action="/">
            <select name="country" id="country" >
                <option value="">select country</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Uganda">Uganda</option>
            </select>

            <script type="text/javascript">
                document.getElementById('country').value = "<?php echo $_GET['country']; ?>";
            </script>

            <select name="state" id="state" value=<?php echo $_GET['state'] ?? "" ?>>
                <option value="">select state</option>
                <option value="OK">valid phone numbers</option>
                <option value="NOK">not valid phone numbers</option>

            </select>
            <script type="text/javascript">
                document.getElementById('state').value = "<?php echo $_GET['state']; ?>";
            </script>

            <button type="submit" class="btn btn-primary" >submit</button>

            <!-- TABLE CONSTRUCTION -->
            <table>
                <tr>
                    <th>Country</th>
                    <th>State</th>
                    <th>Country code</th>
                    <th>Phone num</th>
                </tr>
                <?php
                foreach ($data as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['country']; ?></td>
                        <td><?php echo $row['state']; ?></td>
                        <td><?php echo $row['countryCode']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </form>

    </section>
</body>

</html>