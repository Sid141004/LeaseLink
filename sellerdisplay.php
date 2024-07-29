<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="property.css" rel="stylesheet">
</head>
<body>
    <main>
        <header>
            <a class="logo">LeaseLink</a>
            <div class="nav_items">
                <a href="adminlogin.html">Admin Login</a>
                <a href="plisting.html">List/View Property</a>
                <a href="contact.html">Contact</a>
                <a href="index.html">Logout</a>
            </div>
        </header>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">START EXPLORING</font></font></h1>
                    <p class="lead text-body-secondary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Your Dream Property is just moments away!!</font></font></p>
                </div>
            </div>
        </section>
        <div class="album_py-5_bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
                    // Database connection
                    $conn = new mysqli('localhost', 'root', '', 'leaselink');
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Call the stored procedure
                    $sql = "CALL getPropertiesWithMaxTransactions2()";
                    $result = $conn->query($sql);

                    if ($result === FALSE) {
                        echo "Error executing stored procedure: " . $conn->error;
                    } else {
                        // Display the result
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Output property details
                                echo '<div class="col">';
                                echo '<div class="card shadow-sm">';
                                echo '<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Property img</text></svg>';
                                echo '<div class="card-body">';
                                echo '<p class="card-text">' . $row['amenities'] . '</p>';
                                echo '<div class="d-flex justify-content-between align-items-center">';
                                echo '<div class="btn-group">';
                                echo '<button type="button" class="btn btn-sm btn-outline-secondary">Rate</button>';
                                echo '<button type="button" class="btn btn-sm btn-outline-secondary">Rent</button>';
                                echo '</div>';
                                // echo '<small class="text-body-secondary">₹' . $row['price'] . '</small>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo "No properties found.";
                        }
                    }

                    // Close connection
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
        <div id="last">
            <button id="a" onclick="location.href='#'">Next Page</button>
        </div>
        <footer>made with &hearts; by LeaseLink team</footer>
    </main>
</body>
</html>
