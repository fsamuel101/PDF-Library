<?php
include_once 'includes/library.view.inc.php';
// Start a session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <link rel="stylesheet" href="css/library.css">
    <title>PLSP Library</title>
</head>



<body>
<?php include('header.php')?>

    <section class="library">

        <div class="categories">
            <ul>
                <?php
                $categoryMapping = [
                    'all' => 'All',
                    'A' => 'General Works',
                    'B' => 'Philosophy, Psychology, and Religion',
                    'C' => 'Auxiliary Sciences of History',
                    'D' => 'General and Old World History',
                    'E' => 'History of America',
                    'F' => 'History of United States and British, Dutch, French, and Latin America',
                    'G' => 'Geography, Anthropology, and Recreation',
                    'H' => 'Social Sciences',
                    'J' => 'Political Sciences',
                    'K' => 'Law',
                    'L' => 'Education',
                    'M' => 'Music',
                    'N' => 'Fine Arts',
                    'O' => 'Language and Literature',
                    'P' => 'Sciences',
                    'Q' => 'Medicine',
                    'R' => 'Agriculture',
                    'S' => 'Technology',
                    'T' => 'Technology',
                    'U' => 'Military Science',
                    'V' => 'Naval Science',
                    'Z' => 'Bibliography, Library, Science, and General Information Resources, Fiction',
                ];

                foreach ($categoryMapping as $key => $value) {
                    $class = (isset($_GET['category']) && $_GET['category'] === $key) ? 'active' : '';
                    echo '<li class="' . $class . '"><a  href="library.php?category=' . $key . '">' . $value . '</a></li>';
                }
                ?>
            </ul>
        </div>

        <div class="book-container">
                <?php
                if (isset($_GET['category'])) {
                    $selectedCategory = $_GET['category'];
                    show_books($pdo, $selectedCategory);
                }
                ?>
        </div>

        <div class="search-container">
            <form id="search-form">
                <input type="text" name="query" id="search-input" placeholder="Search books...">
                <button class="button" type="submit">Search</button>
            </form>
            <div class="search-results" id="book-container">

            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#search-form').submit(function (e) {
                e.preventDefault();

                var query = $('#search-input').val();

                $.ajax({
                    type: 'GET',
                    url: 'includes/library.view.inc.php',
                    data: {
                        query: query
                    },
                    success: function (data) {
                        $('#book-container').html(data);
                    },
                    error: function () {
                        alert('Error occurred during the search.');
                    }
                });
            });
        });
    </script>

    <script>
        function toggleMenu() {
            var hamburger = document.getElementById("hamburger");
            var dropdownMenu = document.getElementById("dropdownMenu");
            dropdownMenu.classList.toggle("show");
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.hamburger')) {
                var dropdowns = document.getElementsByClassName("dropdown-menu");
                var hamburger = document.getElementById("hamburger");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                        hamburger.classList.remove('hide');
                    }
                }
            }
        }
    </script>

    <!-- <form action="includes/logout.inc.php">
        <button>Log out</button>
    </form> -->
</body>

</html>