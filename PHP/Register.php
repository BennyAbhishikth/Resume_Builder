<?php
require '../Database/connect.inc.php';

if (
    isset($_POST['full_name']) && isset($_POST['designation']) && isset($_POST['profile_photo']) && isset($_POST['email']) && isset($_POST['country_code']) &&
    isset($_POST['mobile_number']) && isset($_POST['address']) && isset($_POST['linkedin']) && isset($_POST['github']) && isset($_POST['codechef']) &&
    isset($_POST['leetcode']) && isset($_POST['hackerrank']) && isset($_POST['hackerearth']) && isset($_POST['career_objective']) && isset($_POST['degree_name']) &&
    isset($_POST['specialization']) && isset($_POST['degree_place']) && isset($_POST['degree_location']) && isset($_POST['degree_duration']) && isset($_POST['degree_cgpa']) && isset($_POST['s_secondary_name']) &&
    isset($_POST['s_specialization']) && isset($_POST['s_secondary_place']) && isset($_POST['s_secondary_location']) && isset($_POST['s_secondary_duration']) && isset($_POST['s_secondary_cgpa']) && isset($_POST['secondary_place']) && isset($_POST['secondary_location']) &&
    isset($_POST['secondary_duration']) && isset($_POST['secondary_cgpa']) && isset($_POST['skills']) && isset($_POST['certification_name']) && isset($_POST['certified_by']) &&
    isset($_POST['project_name']) && isset($_POST['tasks']) && isset($_POST['tech']) && isset($_POST['project_link']) && isset($_POST['achievement']) && isset($_GET['email'])
) {

    // $userid = $_GET['email'];

    // personal Details 
    $fname = $_POST['full_name'];
    $designation = $_POST['designation'];
    $profile_photo = $_POST['profile_photo'];

    // contact details 
    $email = $_POST['email'];
    $country_code = $_POST['country_code'];
    $mobile_number = $_POST['mobile_number'];
    $address = $_POST['address'];

    // profile links 
    $linkedin = $_POST['linkedin'];
    $github = $_POST['github'];
    $codechef = $_POST['codechef'];
    $leetcode = $_POST['leetcode'];
    $hackerrank = $_POST['hackerrank'];
    $hackerearth = $_POST['hackerearth'];

    // about 
    $career_objective = $_POST['career_objective'];

    // education
    $degree_name = $_POST['degree_name'];
    $specialization = $_POST['specialization'];
    $degree_place = $_POST['degree_place'];
    $degree_duration = $_POST['degree_duration'];
    $degree_location = $_POST['degree_location'];
    $degree_cgpa = $_POST['degree_cgpa'];

    $s_secondary_name = $_POST['s_secondary_name'];
    $s_specialization = $_POST['s_specialization'];
    $s_secondary_place = $_POST['s_secondary_place'];
    $s_secondary_location = $_POST['s_secondary_location'];
    $s_secondary_duration = $_POST['s_secondary_duration'];
    $s_secondary_cgpa = $_POST['s_secondary_cgpa'];

    $secondary_place = $_POST['secondary_place'];
    $secondary_location = $_POST['secondary_location'];
    $secondary_duration = $_POST['secondary_duration'];
    $secondary_cgpa = $_POST['secondary_cgpa'];

    // skills
    $skills = $_POST['skills'];

    // Certifications
    $certification_name = $_POST['certification_name'];
    $certified_by = $_POST['certified_by'];
    $certification_year = $_POST['certification_year'];

    // Projects
    $project_name = $_POST['project_name'];
    $tasks = $_POST['tasks'];
    $tech = $_POST['tech'];
    $project_link = $_POST['project_link'];

    // Achievements
    $achievement = $_POST['achievement'];

    // Experience
    $role = $_POST['role'];
    $company = $_POST['company'];
    $duration = $_POST['duration'];
    $description = $_POST['description'];

    $skillss = json_encode($skills);
    $certification_names = json_encode($certification_name);
    $certified_bys = json_encode($certified_by);
    $certification_years = json_encode($certification_year);
    $project_names = json_encode($project_name);
    $taskss = json_encode($tasks);
    $techs = json_encode($tech);
    $project_links = json_encode($project_link);
    $achievements = json_encode($achievement);
    $roles = json_encode($role);
    $companys = json_encode($company);
    $durations = json_encode($duration);
    $descriptions = json_encode($description);

    // $query_signup = " INSERT INTO `users` VALUES('','$fname', '$designation', '$profile_photo', '$mail_id', '$country_code', '$mobile_number', 
    //   '$address', '$linkedin', '$github', '$codechef', '$leetcode', '$hackerrank', '$hackerearth', '$career_objective', '$degree_name', '$specialization', 
    //   '$degree_place', '$degree_duration', '$degree_cgpa', '$s_secondary_name', '$s_specialization', '$s_secondary_place', '$s_secondary_duration', '$s_secondary_cgpa', '$secondary_place', '$secondary_duration', 
    //   '$secondary_cgpa', '$skillss', '$certification_names', '$certified_bys', '$certification_years', '$project_names', '$taskss', '$techs', '$project_links', '$achievements', 
    //   '$roles', '$companys', '$durations', '$descriptions' ) ";

    $sql = "SELECT * FROM users where mail_id ='$email'";
    $result = $con->query($sql);
    $count = mysqli_num_rows($result);
    if ($count == NULL) {

        $query_signup = "INSERT INTO `users` VALUES 
        (
            '$fname', '$designation', '$profile_photo', '$email', '$country_code', '$mobile_number', 
            '$address', '$linkedin', '$github', '$codechef', '$leetcode', '$hackerrank', '$hackerearth', '$career_objective', 
            '$degree_name', '$specialization', '$degree_place','$degree_location', '$degree_duration', '$degree_cgpa', 
            '$s_secondary_name', '$s_specialization', '$s_secondary_place','$s_secondary_location', '$s_secondary_duration', '$s_secondary_cgpa', 
            '$secondary_place','$secondary_duration', '$secondary_duration', '$secondary_cgpa', 
            '$skillss', '$certification_names', '$certified_bys', '$certification_years', 
            '$project_names', '$taskss', '$techs', '$project_links', '$achievements', 
            '$roles', '$companys', '$durations', '$descriptions'
        )";

        $one = 1;
        mysqli_query($con, $query_signup);
        header("Location: resume.php?email=" . urlencode($email));
        exit();


    }
    if ($one == 0) {
        header("Location: resume.php?email=" . urlencode($email));
        exit();
    } else if ($count != NULL) {
        echo "<h3 style ='position: absolute;top: 0%;' ><font color=\"red\">* Userid already registered.</font></h3>";
    }

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technical Resume Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body onload="hid()">

    <form action="" method="post">
        <div id="header">
            <center>
                <h1 style="color: antiquewhite;">Technical Resume Form</h1>
            </center>
        </div>


        <!-- Personal Details -->
        <h2>Personal Details</h2>
        <!-- <label for="full_name">Full Name:<span style="color: red;">*</span> </label> -->
        <input type="text" id="full_name" name="full_name" placeholder="Full Name" required>

        <!-- <label for="designation">Designation:<span style="color: red;">*</span> </label> -->
        <input type="text" id="designation" name="designation" placeholder="Title" required>


        <label for="profile_photo">Profile Photo:<span style="color: red;">*</span> </label>
        <input type="file" name="profile_photo" id="profile_photo" accept="image/*" onchange="validateFile()" required>
        <div class="file-input-wrapper">
            <span class="remove-file" onclick="removeProfilePhoto()"><i class="fas fa-times-circle"></i></span>
        </div>

        <!-- Contact Details -->
        <h2>Contact Details</h2>
        <!-- <label for="mail_id">Mail ID:<span style="color: red;">*</span> </label> -->
        <input type="email" id="email" name="email" placeholder="Email Id" required>

        <label for="mobile_number">Mobile Number:<span style="color: red;">*</span> </label>
        <div class="mobile-number-container">
            <!-- Country Code Dropdown -->
            <div class="country-code">
                <select id="option" name="country_code" id="country_code">
                    <option value="+91">+91 (India)</option>
                    <option value="+1">+1 (United States)</option>
                    <option value="+44">+44 (United Kingdom)</option>
                    <option value="+49">+49 (Germany)</option>
                    <option value="+81">+81 (Japan)</option>
                    <option value="+33">+33 (France)</option>
                    <option value="+91">+91 (India)</option>
                    <option value="+86">+86 (China)</option>
                    <option value="+7">+7 (Russia)</option>
                    <option value="+61">+61 (Australia)</option>
                    <option value="+55">+55 (Brazil)</option>
                    <option value="+82">+82 (South Korea)</option>
                    <option value="+34">+34 (Spain)</option>
                    <option value="+39">+39 (Italy)</option>
                    <option value="+52">+52 (Mexico)</option>
                    <option value="+234">+234 (Nigeria)</option>
                    <option value="+27">+27 (South Africa)</option>
                    <option value="+351">+351 (Portugal)</option>
                    <option value="+31">+31 (Netherlands)</option>
                    <option value="+46">+46 (Sweden)</option>
                    <option value="+81">+81 (Japan)</option>
                    <option value="+966">+966 (Saudi Arabia)</option>
                    <option value="+54">+54 (Argentina)</option>
                    <option value="+62">+62 (Indonesia)</option>
                    <option value="+91">+91 (India)</option>
                    <option value="+972">+972 (Israel)</option>
                    <option value="+63">+63 (Philippines)</option>
                    <option value="+82">+82 (South Korea)</option>
                    <option value="+506">+506 (Costa Rica)</option>
                    <option value="+507">+507 (Panama)</option>
                    <option value="+52">+52 (Mexico)</option>
                    <option value="+66">+66 (Thailand)</option>
                    <option value="+353">+353 (Ireland)</option>
                    <option value="+47">+47 (Norway)</option>
                    <option value="+64">+64 (New Zealand)</option>
                    <option value="+234">+234 (Nigeria)</option>
                    <option value="+92">+92 (Pakistan)</option>
                    <option value="+92">+92 (Pakistan)</option>
                    <option value="+65">+65 (Singapore)</option>
                    <option value="+34">+34 (Spain)</option>
                    <option value="+46">+46 (Sweden)</option>
                    <option value="+41">+41 (Switzerland)</option>
                    <option value="+971">+971 (United Arab Emirates)</option>
                    <option value="+90">+90 (Turkey)</option>
                    <option value="+256">+256 (Uganda)</option>
                    <option value="+380">+380 (Ukraine)</option>
                    <option value="+44">+44 (United Kingdom)</option>
                    <option value="+598">+598 (Uruguay)</option>
                    <option value="+998">+998 (Uzbekistan)</option>

                </select>
            </div>


            <input type="tel" name="mobile_number" id="mobile_number" class="mobile-number-input" pattern="[0-9]{10}"
                required>
        </div>

        <!-- <label for="address">Address:<span style="color: red;">*</span> </label> -->
        <!-- <textarea id="address" name="address" rows="3" maxlength="100" required></textarea> -->
        <textarea id="address" name="address" rows="4" cols="50" placeholder="Enter your Address" maxlength="100"
            oninput="updateCharacterCount('address', 'address-count')"></textarea>
        <span id="address-count">100 characters remaining</span>

        <!-- Profile Links -->
        <h2>Profile Links</h2>
        <!-- <label for="linkedin">LinkedIn:<span style="color: red;">*</span> </label> -->
        <input type="text" id="linkedin" name="linkedin" placeholder="LinkedIn" required>

        <!-- <label for="github">GitHub:<span style="color: red;">*</span> </label> -->
        <input type="text" id="github" name="github" placeholder="GitHub" required>

        <!-- <label for="codechef">CodeChef:<span style="color: red;">*</span> </label> -->
        <input type="text" id="codechef" name="codechef" placeholder="CodeChef" required>

        <!-- <label for="leetcode">LeetCode:<span style="color: red;">*</span> </label> -->
        <input type="text" id="leetcode" name="leetcode" placeholder="LeetCode" required>

        <!-- <label for="hackerrank">HackerRank:<span style="color: red;">*</span> </label> -->
        <input type="text" id="hackerrank" name="hackerrank" placeholder="HackerRank" required>

        <!-- <label for="hackerearth">HackerEarth:<span style="color: red;">*</span> </label> -->
        <input type="text" id="hackerearth" name="hackerearth" placeholder="HackerEarth" required>



        <h2>Career Objective</h2>
        <textarea id="career_objective" name="career_objective" rows="8" cols="100"
            placeholder="Enter your career objective" maxlength="750"
            oninput="updateCharacterCount('career_objective', 'career-objective-count')"></textarea><br>
        <span id="career-objective-count">750 characters remaining</span><br>
        <button class="helpButton" type="button" name="button">Help</button>

        <div class="cont">
            <div class="item1">
                <input type="radio" onclick="add1()" name="but1" value="">
                <div class="matter1">
                    <label class="labels" for="">I am a skilled Software Engineer with a passion for developing
                        innovative solutions. Seeking a challenging role to apply my expertise in full-stack
                        development, system architecture, and problem-solving. Committed to delivering high-quality
                        software, I aim to contribute to cutting-edge projects, collaborate with talented teams, and
                        continuously enhance my skills in a dynamic tech environment.</label>
                </div>
            </div>
            <div class="item2">
                <input type="radio" onclick="add2()" name="but1" value="">
                <div class="matter2">
                    <label class="labels" for="">Dedicated Software Engineer aiming to leverage my strong foundation in
                        computer science and programming to contribute to dynamic projects. Seeking a challenging role
                        to apply my skills in full-stack development, software design, and collaborative
                        problem-solving. Eager to work with innovative teams and contribute to creating impactful and
                        scalable software solutions.</label>
                </div>
            </div>
            <div class="item3">
                <input type="radio" onclick="add3()" name="but1" value="">
                <div class="matter3">
                    <label class="labels" for="">Results-driven Software Engineer with expertise in developing and
                        optimizing software solutions. Searching for a role that allows me to utilize my proficiency in
                        coding, system architecture, and project management. I am committed to delivering high-quality
                        software products, adapting to new technologies, and contributing to the success of a
                        forward-thinking organization.</label>
                </div>
            </div>
            <div class="item4">
                <input type="radio" onclick="add4()" name="but1" value="">
                <div class="matter4">
                    <label class="labels" for="">Innovative Software Engineer passionate about crafting efficient and
                        robust code. Excited to bring my technical skills in software development, algorithm design, and
                        debugging to a dynamic work environment. Seeking a position that encourages creativity, fosters
                        continuous learning, and provides opportunities to contribute to cutting-edge projects.</label>
                </div>
            </div>
            <div class="item5">
                <input type="radio" onclick="add5()" name="but1" value="">
                <div class="matter5">
                    <label class="labels" for="">Motivated Software Engineer with a strong foundation in software
                        development and a keen eye for detail. I aspire to contribute my skills in full-stack
                        development, software engineering, and problem-solving to a collaborative team. Eager to work on
                        challenging projects that push boundaries, enhance my expertise, and contribute to the success
                        of a forward-looking organization.</label>
                </div>
            </div>
            <div class="item6">
                <input type="radio" onclick="add6()" name="but1" value="">
                <div class="matter6">
                    <label class="labels" for="">Seeking a Web Developer position to apply strong frontend and backend
                        skills, aiming to create seamless, responsive, and visually appealing web applications.
                        Committed to staying current with evolving technologies and contributing to collaborative team
                        environments.</label>
                </div>
            </div>
            <div class="item7">
                <input type="radio" onclick="add7()" name="but1" value="">
                <div class="matter7">
                    <label class="labels" for="">Aspiring Web Developer with a focus on crafting efficient,
                        user-friendly web solutions. Eager to leverage technical skills in HTML, CSS, JavaScript, and
                        backend technologies to contribute to innovative projects and foster continuous professional
                        growth.</label>
                </div>
            </div>
            <div class="item8">
                <input type="radio" onclick="add8()" name="but1" value="">
                <div class="matter8">
                    <label class="labels" for="">Passionate about web development, I am dedicated to securing a role
                        where I can utilize my coding expertise to build scalable and high-performance applications.
                        Excited to collaborate with diverse teams and contribute to the success of dynamic
                        projects.</label>
                </div>
            </div>
            <div class="item9">
                <input type="radio" onclick="add9()" name="but1" value="">
                <div class="matter9">
                    <label class="labels" for="">Dynamic Web Developer aspiring to contribute creativity and technical
                        acumen to cutting-edge projects. Proficient in frontend frameworks and backend technologies, I
                        am enthusiastic about delivering impactful web solutions and adapting to emerging industry
                        trends.</label>
                </div>
            </div>
            <div class="item10">
                <input type="radio" onclick="add10()" name="but1" value="">
                <div class="matter10">
                    <label class="labels" for="">Results-driven Web Developer seeking opportunities to apply
                        comprehensive knowledge of web technologies. With a focus on detail and a commitment to
                        continuous improvement, I aim to contribute to the development of robust, user-focused web
                        applications in a collaborative and innovative environment.</label>
                </div>
            </div>
            <div class="item11">
                <input type="radio" onclick="add11()" name="but1" value="">
                <div class="matter11">
                    <label class="labels" for="">To contribute as a System Administrator, applying advanced skills in
                        server management, network administration, and cybersecurity. Committed to ensuring high
                        availability, reliability, and security of IT systems through proactive monitoring and effective
                        problem resolution.</label>
                </div>
            </div>
            <div class="item12">
                <input type="radio" onclick="add12()" name="but1" value="">
                <div class="matter12">
                    <label class="labels" for="">Seeking a System Administrator role to utilize extensive experience in
                        maintaining and optimizing IT infrastructure. Goal is to implement best practices, enhance
                        system performance, and ensure data integrity while providing seamless technical support to
                        users.</label>
                </div>
            </div>
            <div class="item13">
                <input type="radio" onclick="add13()" name="but1" value="">
                <div class="matter13">
                    <label class="labels" for="">Aspiring System Administrator dedicated to deploying robust IT
                        solutions, implementing disaster recovery strategies, and ensuring optimal system performance.
                        Eager to contribute technical expertise in server administration, troubleshooting, and security
                        to support organizational growth.</label>
                </div>
            </div>
            <div class="item14">
                <input type="radio" onclick="add14()" name="but1" value="">
                <div class="matter14">
                    <label class="labels" for="">To excel as a System Administrator, combining technical proficiency
                        with a proactive approach to system management. Focused on implementing efficient IT solutions,
                        enhancing cybersecurity measures, and providing reliable support for a seamless and secure
                        computing environment.</label>
                </div>
            </div>
            <div class="item15">
                <input type="radio" onclick="add15()" name="but1" value="">
                <div class="matter15">
                    <label class="labels" for="">Dynamic System Administrator aiming to optimize IT operations by
                        leveraging strong skills in server administration, network configuration, and cybersecurity.
                        Committed to ensuring data integrity, minimizing downtime, and enhancing overall system
                        performance for organizational success.</label>
                </div>
            </div>
            <div class="item16">
                <input type="radio" onclick="add16()" name="but1" value="">
                <div class="matter16">
                    <label class="labels" for="">To excel as a Network Engineer, applying expertise in designing,
                        implementing, and managing robust network infrastructures. Committed to optimizing network
                        performance, ensuring scalability, and implementing cutting-edge solutions for seamless
                        connectivity.</label>
                </div>
            </div>
            <div class="item17">
                <input type="radio" onclick="add17()" name="but1" value="">
                <div class="matter17">
                    <label class="labels" for="">Seeking a Network Engineer role to contribute technical proficiency in
                        routing, switching, and network security. Goal is to design and maintain scalable and secure
                        networks, implementing innovative solutions to meet evolving business needs.</label>
                </div>
            </div>
            <div class="item18">
                <input type="radio" onclick="add18()" name="but1" value="">
                <div class="matter18">
                    <label class="labels" for="">Aspiring Network Engineer dedicated to optimizing network architecture
                        for reliability and performance. Aim is to leverage skills in troubleshooting, configuration,
                        and network monitoring to ensure seamless connectivity and contribute to organizational
                        success.</label>
                </div>
            </div>
            <div class="item19">
                <input type="radio" onclick="add19()" name="but1" value="">
                <div class="matter19">
                    <label class="labels" for="">Dynamic Network Engineer aiming to implement secure and scalable
                        network solutions. Committed to staying updated on emerging technologies, providing efficient
                        troubleshooting, and contributing to the design and optimization of resilient network
                        infrastructures.</label>
                </div>
            </div>
            <div class="item20">
                <input type="radio" onclick="add20()" name="but1" value="">
                <div class="matter20">
                    <label class="labels" for="">To thrive as a Network Engineer, combining technical expertise with a
                        strategic approach to enhance network efficiency. Dedicated to deploying advanced technologies,
                        ensuring network security, and contributing to the design and maintenance of robust
                        infrastructures.</label>
                </div>
            </div>
            <button class="clrBtn" type="button" name="button" onclick="clr()">Clear</button>
        </div>





        <!-- Education -->
        <h2>Education</h2>

        <b>
            <h3 style="color: black;">Degree</h3>
        </b>
        <!-- <label for="degree_name">Degree Name:<span style="color: red;">*</span> </label> -->
        <input type="text" id="degree_name" name="degree_name" placeholder="Degree Name" required>


        <!-- <label for="specialization">Specialization:<span style="color: red;">*</span> </label> -->
        <input type="text" id="specialization" name="specialization" placeholder="Specialization" required>


        <!-- <label for="degree_place">Place:<span style="color: red;">*</span> </label> -->
        <input type="text" id="degree_place" name="degree_place" placeholder="Place" required>

        <input type="text" id="degree_location" name="degree_location" placeholder="Location" required>

        <!-- <label for="degree_duration">Duration:<span style="color: red;">*</span> </label> -->
        <input type="text" id="degree_duration" name="degree_duration" placeholder="Duration" required>

        <!-- <label for="degree_cgpa">CGPA:<span style="color: red;">*</span> </label> -->
        <input type="text" id="degree_cgpa" name="degree_cgpa" placeholder="CGPA" required>


        <b>
            <h3 style="color: black;">12th / Diploma</h3>
        </b>
        <!-- <label for="s_secondary_name">Degree Name:<span style="color: red;">*</span> </label> -->
        <input type="text" id="s_secondary_name" name="s_secondary_name" placeholder="Degree Name" required>


        <!-- <label for="s_specialization">Specialization:<span style="color: red;">*</span> </label> -->
        <input type="text" id="s_specialization" name="s_specialization" placeholder="Specialization" required>


        <!-- <label for="s_secondary_place">Place:<span style="color: red;">*</span> </label> -->
        <input type="text" id="s_secondary_place" name="s_secondary_place" placeholder="Place" required>

        <input type="text" id="s_secondary_location" name="s_secondary_location" placeholder="Location" required>

        <!-- <label for="s_secondary_duration">Duration:<span style="color: red;">*</span> </label> -->
        <input type="text" id="s_secondary_duration" name="s_secondary_duration" placeholder="Duration" required>

        <!-- <label for="s_secondary_cgpa">CGPA:<span style="color: red;">*</span> </label> -->
        <input type="text" id="s_secondary_cgpa" name="s_secondary_cgpa" placeholder="GPA" required>

        <b>
            <h3 style="color: black;">SSC</h3>
        </b>

        <!-- <label for="secondary_place">Place:<span style="color: red;">*</span> </label> -->
        <input type="text" id="secondary_place" name="secondary_place" placeholder="Place" required>

        <input type="text" id="secondary_location" name="secondary_location" placeholder="location" required>

        <!-- <label for="seconday_duration">Duration:<span style="color: red;">*</span> </label> -->
        <input type="text" id="secondary_duration" name="secondary_duration" placeholder="Duration" required>

        <!-- <label for="secondary_cgpa">CGPA:<span style="color: red;">*</span> </label> -->
        <input type="text" id="secondary_cgpa" name="secondary_cgpa" placeholder="GPA" required>



        <!-- Skills -->
        <h2>Skills <button type="button" class="add-button" onclick="addSkill()"><i class="fas fa-plus"></i></button>
        </h2>
        <div id="skills-container">
            <!-- Initial skill input field -->
            <div class="skill-input">
                <label for="skill_1">Skill:<span style="color: red;">*</span> </label>
                <input type="text" name="skills[]" id="skill_1" placeholder="Skill" required>
                <!-- Delete button for the initial skill -->
                <!-- <button type="button" class="delete-button" onclick="deleteSkill(this)"><i class="fas fa-trash"></i></button> -->
            </div>
        </div>




        <!-- Certifications -->
        <h2>Certifications
            <!-- <button type="button" class="delete-button" onclick="deleteSection('certifications')"><i class="fas fa-trash"></i></button> -->
            <button type="button" class="add-button" onclick="addCertificationSet()"><i
                    class="fas fa-plus"></i></button>
        </h2>
        <div id="certifications-container">
            <!-- Initial certification set -->
            <div class="certification-set">
                <div class="section-input">
                    <label for="certification_name">Certification Name:<span style="color: red;">*</span> </label>
                    <input type="text" name="certification_name[]" required>
                </div>
                <div class="section-input">
                    <label for="certified_by">Certified By:<span style="color: red;">*</span> </label>
                    <input type="text" name="certified_by[]" required>
                </div>
                <div class="section-input">
                    <label for="certification_year">Year:<span style="color: red;">*</span> </label>
                    <input type="text" name="certification_year[]" required>
                </div>
                <div class="section-input">
                    <!-- <button type="button" class="delete-button" onclick="deleteCertificationSet(this)"><i class="fas fa-trash"></i></button> -->
                </div>
            </div>
        </div>

        <!-- Projects -->
        <h2>Projects
            <!-- <button type="button" class="delete-button" onclick="deleteSection('projects')"><i class="fas fa-trash"></i></button> -->
            <button type="button" class="add-button" onclick="addProjectSet()"><i class="fas fa-plus"></i></button>
        </h2>
        <div id="projects-container">
            <!-- Initial project set -->
            <div class="project-set">
                <div class="section-input">
                    <label for="project_name">Project Name:<span style="color: red;">*</span> </label>
                    <input type="text" name="project_name[]" required>
                </div>
                <div class="section-input">
                    <label for="tasks">Tasks:<span style="color: red;">*</span> </label>
                    <input type="text" name="tasks[]" required>
                </div>
                <div class="section-input">
                    <label for="tech">Technology Used:<span style="color: red;">*</span> </label>
                    <input type="text" name="tech[]" required>
                </div>
                <div class="section-input">
                    <label for="project_link">Link:<span style="color: red;">*</span> </label>
                    <input type="text" name="project_link[]" required>
                </div>
                <div class="section-input">
                    <!-- <button type="button" class="delete-button" onclick="deleteProjectSet(this)"><i class="fas fa-trash"></i></button> -->
                </div>
            </div>
        </div>

        <br>

        <!-- <button type="button" class="delete-button" onclick="deleteSet(this.parentNode)"><i class="fas fa-trash"></i></button> -->
        <br><br><br>
        </div>


        <!-- Achievements -->
        <h2>Achievements
            <!-- <button type="button" class="delete-button" onclick="deleteSection('achievements')"><i class="fas fa-trash"></i></button> -->
            <button type="button" class="add-button" onclick="addAchievementSet()"><i class="fas fa-plus"></i></button>
        </h2>
        <div id="achievements-container">
            <!-- Initial achievement set -->
            <div class="achievement-set">
                <div class="section-input">
                    <label for="achievement">Achievement:<span style="color: red;">*</span> </label>
                    <input type="text" name="achievement[]" required>
                </div>
                <div class="section-input">
                    <!-- <button type="button" class="delete-button" onclick="deleteAchievementSet(this)"><i class="fas fa-trash"></i></button> -->
                </div>
            </div>
        </div>

        <!-- Experience -->
        <h2>Experience
            <!-- <button type="button" class="delete-button" onclick="deleteSection('experience')"><i class="fas fa-trash"></i></button> -->
            <button type="button" class="add-button" onclick="addExperienceSet()"><i class="fas fa-plus"></i></button>
        </h2>
        <div id="experience-container">
            <!-- Initial experience set -->
            <div class="experience-set">
                <div class="section-input">
                    <label for="role">Role:<span style="color: red;">*</span></label>
                    <input type="text" name="role[]" required>
                </div>
                <div class="section-input">
                    <label for="company">Company:<span style="color: red;">*</span></label>
                    <input type="text" name="company[]" required>
                </div>
                <div class="section-input">
                    <label for="duration">Duration:<span style="color: red;">*</span></label>
                    <input type="text" name="duration[]" required>
                </div>
                <div class="section-input">
                    <label for="description">Description:<span style="color: red;">*</span></label>
                    <!-- <textarea name="description[]" rows="4" cols="50" placeholder="Enter job description" required></textarea> -->
                    <textarea id="description" name="description[]" rows="4" cols="50" placeholder="Enter a description"
                        maxlength="200" oninput="updateCharacterCount('description', 'description-count')"></textarea>
                    <span id="description-count">200 characters remaining</span>
                </div>
                <div class="section-input">
                    <button type="button" class="delete-button" style="top:-4vmin;"
                        onclick="deleteExperienceSet(this)"><i class="fas fa-trash"></i></button>
                </div>
            </div>
        </div>


        <center><a href=""><button type="submit">Submit</button></a></center>
    </form>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../JS/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>


</body>

</html>