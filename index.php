<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Student Registration</h2>
        <form action="" method="post">
            <div class="form-row">
                <div class="form-group">
                    <label>Student Information</label>
                    <div class="input-group">
                        <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                        <input type="text" id="middle_name" name="middle_name" placeholder="Middle Name" required>
                        <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="input-group">
                    <input type="text" id="birthdate" name="birthdate" placeholder="Birthdate" onfocus="this.type='date'" onblur="this.type='text'">
                    <input type="text" id="student_id" name="student_id" placeholder="Student ID" required pattern="[0-9]+">
                </div>
            </div>
            <div class="form-row">
                <div class="input-group">
                    <div class="drag-drop-area" id="drag-drop-area">
                        Drag and drop your student profile here or click to upload
                    </div>
                    <input type="file" id="user_image" name="user_image" required style="display:none;">
                </div>
            </div>
            <div class="form-row">
                <label>Previous School Information</label>
                <div class="input-group">
                    <input type="text" id="previous_school" name="previous_school" placeholder="Name of Previous School" required>
                    <input type="text" id="last_attended" name="last_attended" placeholder="Last date attended" onfocus="this.type='date'" onblur="this.type='text'">
                </div>
            </div>
            <div class="form-row">
                <div class="input-group">
                    Language of Instruction: 
                    <input type="checkbox" name="language" value="English">English
                    <input type="checkbox" name="language" value="Tagalog">Tagalog
                    <input type="checkbox" name="language" value="Other">Other
                </div>
            </div>
            <div class="form-row">
                <div class="input-group">
                    <input type="text" id="reason_transfer" name="reason_transfer" placeholder="Reason to Transfer" required>
                </div>
            </div>
            <div class="form-row">
                <label>Address</label>
                <div class="input-group">
                    <input type="text" id="street_address" name="street_address" placeholder="Street Address" required>
                </div>
            </div>
            <div class="form-row">
                <div class="input-group">
                    <input type="text" id="city" name="city" placeholder="City" required>
                    <input type="text" id="state_province" name="state_province" placeholder="State/ Province" required>
                </div>
            </div>
            <div class="form-row">
                <label>Contact Information</label>
                <div class="input-group">
                    <input type="text" id="email" name="email" placeholder="E-mail" required>
                    <input type="text" id="phone_number" name="phone_number" placeholder="Phone Number" required>
                </div>
            </div>
            <div class="form-row">
                <label>Citizenship Information</label>
                <div class="input-group">
                    <input type="text" id="birth_country" name="birth_country" placeholder="Birth Country" required> 
                    If Philippines,
                    <input type="text" id="province_birth" name="province_birth" placeholder="Province of Birth" required>
                </div>
            </div>
            <div class="form-row">
                <div class="input-group">
                    <input type="text" id="country_citizenship" name="country_citizenship" placeholder="Country Of Citizenship" required>
                </div>
            </div>
            <div class="form-row">
                <div class="input-group">
                    <input type="text" id="previous_date" name="previous_date" placeholder="If student not born in Philippines, provide date student entered Philippines to live for the first time" onfocus="this.type='date'" onblur="this.type='text'">
                </div>
            </div>
            <div class="form-row">
                <div class="input-group">
                    <input type="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>
    
    <!-- This is for the Drag and Drop Functionality in the Student Information Area -->
    <script>
        const dragDropArea = document.getElementById('drag-drop-area');
        const userImageInput = document.getElementById('user_image');

        dragDropArea.addEventListener('click', () => userImageInput.click());

        dragDropArea.addEventListener('dragover', (event) => {
            event.preventDefault();
            dragDropArea.classList.add('dragover');
        });

        dragDropArea.addEventListener('dragleave', () => {
            dragDropArea.classList.remove('dragover');
        });

        dragDropArea.addEventListener('drop', (event) => {
            event.preventDefault();
            dragDropArea.classList.remove('dragover');

            const files = event.dataTransfer.files;
            if (files.length > 0) {
                userImageInput.files = files;
            }
        });

        userImageInput.addEventListener('change', () => {
            if (userImageInput.files.length > 0) {
                dragDropArea.textContent = `File selected: ${userImageInput.files[0].name}`;
            }
        });
    </script>
    <!-- END OF SCRIPT SA Drag and Drop na Functionality -->

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $birthdate = $_POST['birthdate'];
        $student_id = $_POST['student_id'];
        $previous_school = $_POST['previous_school'];
        $last_attended = $_POST['last_attended'];
        $language = $_POST['language'];
        $reason_transfer = $_POST['reason_transfer'];
        $street_address = $_POST['street_address'];
        $city = $_POST['city'];
        $state_province = $_POST['state_province'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $birth_country = $_POST['birth_country'];
        $province_birth = $_POST['province_birth'];
        $country_citizenship = $_POST['country_citizenship'];
        $previous_date = $_POST['previous_date'];

        $first_name = ucfirst(strtolower($first_name));
        $middle_name = ucfirst(strtolower($middle_name));
        $last_name = ucfirst(strtolower($last_name));
        $previous_school = ucwords(strtolower($previous_school));
        $city = ucwords(strtolower($city));
        $state_province = ucwords(strtolower($state_province));
        $birth_country = ucwords(strtolower($birth_country));
        $province_birth = ucwords(strtolower($province_birth));
        $country_citizenship = ucwords(strtolower($country_citizenship));

        $student_id = (int)$student_id;

        echo "<h2>Registration Details</h2>";
        echo "Student Name: $first_name $middle_name $last_name <br>";
        echo "Birthdate: $birthdate <br>";
        echo "Student ID: $student_id <br>";
        echo "Previous School: $previous_school <br>";
        echo "Last Attended: $last_attended <br>";
        echo "Language of Instruction: $language <br>";
        echo "Reason for Transfer: $reason_transfer <br>";
        echo "Address: $street_address, $city, $state_province <br>";
        echo "Email: $email <br>";
        echo "Phone Number: $phone_number <br>";
        echo "Birth Country: $birth_country, Province of Birth: $province_birth <br>";
        echo "Country of Citizenship: $country_citizenship <br>";
        echo "Previous Date in Philippines: $previous_date <br>";
    }
    ?>
</body>
</html>
