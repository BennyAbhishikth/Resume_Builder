// Skills Section
let skillCount = 1; // Initial skill count
function addSkill()
{
    skillCount++;
    const skillsContainer = document.getElementById('skills-container');

    // Create a new skill input field
    const skillInput = document.createElement('div');
    skillInput.className = 'skill-input';
    skillInput.innerHTML = `
        <label for="skill_${skillCount}">Skill:</label>
        <input type="text" name="skills[]" id="skill_${skillCount}" required>
        <!-- Delete button for the new skill -->
        <button type="button" class="delete-button" onclick="deleteSkill(this)"><i class="fas fa-trash"></i></button>
    `;

    // Append the new skill input field
    skillsContainer.appendChild(skillInput);
}

function deleteSkill(button)
{
    const skillsContainer = document.getElementById('skills-container');
    const skillInput = button.parentNode;

    // Check if it's not the last skill field before removing
    if (skillsContainer.childElementCount > 1)
    {
        skillsContainer.removeChild(skillInput);
    }
}



function validateFile()
{
    const fileInput = document.getElementById('profile_photo');

    // Check if a file is selected
    if (fileInput.files.length > 0)
    {
        const fileType = fileInput.files[0].type;
        const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        // Validate file type
        if (!allowedTypes.includes(fileType))
        {
            alert('Please upload a valid image file (JPEG, PNG, GIF).');
            fileInput.value = ''; // Clear the file input
            return;
        }

        // Validate file size (limit to 1MB in this example)
        const maxSizeInBytes = 1048576; // 1MB
        const fileSize = fileInput.files[0].size;
        if (fileSize > maxSizeInBytes)
        {
            alert('Please upload an image file with a size less than 1MB.');
            fileInput.value = ''; // Clear the file input
            return;
        }
    }
}






function addCertificationSet()
{
    const certificationsContainer = document.getElementById('certifications-container');

    // Create a new certification set
    const certificationSet = document.createElement('div');
    certificationSet.className = 'certification-set';

    // Create input fields for the new certification set
    const certificationNameInput = createCertificationInput('Certification Name:', 'certification_name[]');
    const certifiedByInput = createCertificationInput('Certified By:', 'certified_by[]');
    const certificationYearInput = createCertificationInput('Year:', 'certification_year[]');

    // Append input fields to the certification set
    certificationSet.appendChild(certificationNameInput);
    certificationSet.appendChild(certifiedByInput);
    certificationSet.appendChild(certificationYearInput);

    // Create delete button for the new certification set
    const deleteButton = document.createElement('div');
    deleteButton.className = 'section-input';
    deleteButton.innerHTML = `
        <button type="button" class="delete-button" onclick="deleteCertificationSet(this)"><i class="fas fa-trash"></i></button>
    `;

    // Append the delete button to the certification set
    certificationSet.appendChild(deleteButton);

    // Append the new certification set to the certifications container
    certificationsContainer.appendChild(certificationSet);
}

function createCertificationInput(labelText, inputName)
{
    const inputContainer = document.createElement('div');
    inputContainer.className = 'section-input';

    const label = document.createElement('label');
    label.textContent = labelText;

    const input = document.createElement('input');
    input.type = 'text';
    input.name = inputName;
    input.required = true;

    // Append label and input to the input container
    inputContainer.appendChild(label);
    inputContainer.appendChild(input);

    return inputContainer;
}

function deleteCertificationSet(button)
{
    const certificationSet = button.closest('.certification-set');
    certificationSet.remove();
}

function addProjectSet()
{
    const projectsContainer = document.getElementById('projects-container');

    // Create a new project set
    const projectSet = document.createElement('div');
    projectSet.className = 'project-set';

    // Create input fields for the new project set
    const projectNameInput = createProjectInput('Project Name:', 'project_name[]');
    const tasksInput = createProjectInput('Tasks:', 'tasks[]');
    const techInput = createProjectInput('Technology Used:', 'tech[]');
    const projectLinkInput = createProjectInput('Link:', 'project_link[]');

    // Append input fields to the project set
    projectSet.appendChild(projectNameInput);
    projectSet.appendChild(tasksInput);
    projectSet.appendChild(techInput);
    projectSet.appendChild(projectLinkInput);

    // Create delete button for the new project set
    const deleteButton = document.createElement('div');
    deleteButton.className = 'section-input';
    deleteButton.innerHTML = `
        <button type="button" class="delete-button" onclick="deleteProjectSet(this)"><i class="fas fa-trash"></i></button>
    `;

    // Append the delete button to the project set
    projectSet.appendChild(deleteButton);

    // Append the new project set to the projects container
    projectsContainer.appendChild(projectSet);
}

function createProjectInput(labelText, inputName)
{
    const inputContainer = document.createElement('div');
    inputContainer.className = 'section-input';

    const label = document.createElement('label');
    label.textContent = labelText;

    const input = document.createElement('input');
    input.type = 'text';
    input.name = inputName;
    input.required = true;

    // Append label and input to the input container
    inputContainer.appendChild(label);
    inputContainer.appendChild(input);

    return inputContainer;
}

function deleteProjectSet(button)
{
    const projectSet = button.closest('.project-set');
    projectSet.remove();
}

function addAchievementSet()
{
    const achievementsContainer = document.getElementById('achievements-container');

    // Create a new achievement set
    const achievementSet = document.createElement('div');
    achievementSet.className = 'achievement-set';

    // Create input fields for the new achievement set
    const achievementInput = createAchievementInput('Achievement:', 'achievement[]');

    // Append input fields to the achievement set
    achievementSet.appendChild(achievementInput);

    // Create delete button for the new achievement set
    const deleteButton = document.createElement('div');
    deleteButton.className = 'section-input';
    deleteButton.innerHTML = `
        <button type="button" class="delete-button" onclick="deleteAchievementSet(this)"><i class="fas fa-trash"></i></button>
    `;

    // Append the delete button to the achievement set
    achievementSet.appendChild(deleteButton);

    // Append the new achievement set to the achievements container
    achievementsContainer.appendChild(achievementSet);
}

function createAchievementInput(labelText, inputName)
{
    const inputContainer = document.createElement('div');
    inputContainer.className = 'section-input';

    const label = document.createElement('label');
    label.textContent = labelText;

    const input = document.createElement('input');
    input.type = 'text';
    input.name = inputName;
    input.required = true;

    // Append label and input to the input container
    inputContainer.appendChild(label);
    inputContainer.appendChild(input);

    return inputContainer;
}
// $(document).click(function(event){$(event.target).toggle()})
function deleteAchievementSet(button)
{
    const achievementSet = button.closest('.achievement-set');
    achievementSet.remove();
}


function addExperienceSet()
{
    const experienceContainer = document.getElementById('experience-container');

    // Create a new experience set
    const experienceSet = document.createElement('div');
    experienceSet.className = 'experience-set';

    // Create delete button for the new experience set
    const deleteButton = document.createElement('div');
    deleteButton.className = 'section-input';
    deleteButton.innerHTML = `
        <button type="button" class="delete-button" style="position:relative;top:2vmin;margin-left:92%"  onclick="deleteExperienceSet(this)"><i class="fas fa-trash"></i></button>
    `;

    // Append the delete button to the experience set
    experienceSet.appendChild(deleteButton);

    // Create input fields for the new experience set
    const roleInput = createExperienceInput('Role:', 'role[]');
    const companyInput = createExperienceInput('Company:', 'company[]');
    const durationInput = createExperienceInput('Duration:', 'duration[]');
    const descriptionInput = createExperienceTextarea('Description:', 'description[]');

    // Append input fields to the experience set
    experienceSet.appendChild(roleInput);
    experienceSet.appendChild(companyInput);
    experienceSet.appendChild(durationInput);
    experienceSet.appendChild(descriptionInput);

    

    // Append the new experience set to the experience container
    experienceContainer.appendChild(experienceSet);
}

function createExperienceInput(labelText, inputName)
{
    const inputContainer = document.createElement('div');
    inputContainer.className = 'section-input';

    const label = document.createElement('label');
    label.textContent = labelText;

    const input = document.createElement('input');
    input.type = 'text';
    input.name = inputName;
    input.required = true;

    // Append label and input to the input container
    inputContainer.appendChild(label);
    inputContainer.appendChild(input);

    return inputContainer;
}

function createExperienceTextarea(labelText, inputName)
{
    const inputContainer = document.createElement('div');
    inputContainer.className = 'section-input';

    const label = document.createElement('label');
    label.textContent = labelText;

    const textarea = document.createElement('textarea');
    textarea.name = inputName;
    textarea.rows = 4;
    textarea.cols = 50;
    textarea.placeholder = 'Enter job description';
    textarea.required = true;

    // Append label and textarea to the input container
    inputContainer.appendChild(label);
    inputContainer.appendChild(textarea);

    return inputContainer;
}

function deleteExperienceSet(button)
{
    const experienceSet = button.closest('.experience-set');
    experienceSet.remove();
}


function deleteSection(section)
{
    const sectionContainer = document.getElementById(`${section}-container`);
    sectionContainer.innerHTML = ''; // Remove all section sets
}


function updateCharacterCount(inputId, countId)
{
    const input = document.getElementById(inputId);
    const countSpan = document.getElementById(countId);
    const maxLength = input.maxLength;
    const remainingCharacters = maxLength - input.value.length;
    countSpan.textContent = `${remainingCharacters} characters remaining`;
}



  $(".helpButton").click(function(){
      $(".cont").slideToggle();
    })

  function hid(){
    $(".cont").hide();
  }

  var val1 = "I am a skilled Software Engineer with a passion for developing innovative solutions. Seeking a challenging role to apply my expertise in full-stack development, system architecture, and problem-solving. Committed to delivering high-quality software, I aim to contribute to cutting-edge projects, collaborate with talented teams, and continuously enhance my skills in a dynamic tech environment.";
  var val2 = "Dedicated Software Engineer aiming to leverage my strong foundation in computer science and programming to contribute to dynamic projects. Seeking a challenging role to apply my skills in full-stack development, software design, and collaborative problem-solving. Eager to work with innovative teams and contribute to creating impactful and scalable software solutions.";
  var val3 = "Results-driven Software Engineer with expertise in developing and optimizing software solutions. Searching for a role that allows me to utilize my proficiency in coding, system architecture, and project management. I am committed to delivering high-quality software products, adapting to new technologies, and contributing to the success of a forward-thinking organization.";
  var val4 = "Innovative Software Engineer passionate about crafting efficient and robust code. Excited to bring my technical skills in software development, algorithm design, and debugging to a dynamic work environment. Seeking a position that encourages creativity, fosters continuous learning, and provides opportunities to contribute to cutting-edge projects.";
  var val5 = "Motivated Software Engineer with a strong foundation in software development and a keen eye for detail. I aspire to contribute my skills in full-stack development, software engineering, and problem-solving to a collaborative team. Eager to work on challenging projects that push boundaries, enhance my expertise, and contribute to the success of a forward-looking organization.";
  var val6 = "Seeking a Web Developer position to apply strong frontend and backend skills, aiming to create seamless, responsive, and visually appealing web applications. Committed to staying current with evolving technologies and contributing to collaborative team environments.";
  var val7 = "Aspiring Web Developer with a focus on crafting efficient, user-friendly web solutions. Eager to leverage technical skills in HTML, CSS, JavaScript, and backend technologies to contribute to innovative projects and foster continuous professional growth.";
  var val8 = "Passionate about web development, I am dedicated to securing a role where I can utilize my coding expertise to build scalable and high-performance applications. Excited to collaborate with diverse teams and contribute to the success of dynamic projects.";
  var val9 = "Dynamic Web Developer aspiring to contribute creativity and technical acumen to cutting-edge projects. Proficient in frontend frameworks and backend technologies, I am enthusiastic about delivering impactful web solutions and adapting to emerging industry trends.";
  var val10 = "Results-driven Web Developer seeking opportunities to apply comprehensive knowledge of web technologies. With a focus on detail and a commitment to continuous improvement, I aim to contribute to the development of robust, user-focused web applications in a collaborative and innovative environment.";
  var val11 = "To contribute as a System Administrator, applying advanced skills in server management, network administration, and cybersecurity. Committed to ensuring high availability, reliability, and security of IT systems through proactive monitoring and effective problem resolution.";
  var val12 = "Seeking a System Administrator role to utilize extensive experience in maintaining and optimizing IT infrastructure. Goal is to implement best practices, enhance system performance, and ensure data integrity while providing seamless technical support to users.";
  var val13 = "Aspiring System Administrator dedicated to deploying robust IT solutions, implementing disaster recovery strategies, and ensuring optimal system performance. Eager to contribute technical expertise in server administration, troubleshooting, and security to support organizational growth.";
  var val14 = "To excel as a System Administrator, combining technical proficiency with a proactive approach to system management. Focused on implementing efficient IT solutions, enhancing cybersecurity measures, and providing reliable support for a seamless and secure computing environment.";
  var val15 = "Dynamic System Administrator aiming to optimize IT operations by leveraging strong skills in server administration, network configuration, and cybersecurity. Committed to ensuring data integrity, minimizing downtime, and enhancing overall system performance for organizational success.";
  var val16 = "To excel as a Network Engineer, applying expertise in designing, implementing, and managing robust network infrastructures. Committed to optimizing network performance, ensuring scalability, and implementing cutting-edge solutions for seamless connectivity.";
  var val17 = "Seeking a Network Engineer role to contribute technical proficiency in routing, switching, and network security. Goal is to design and maintain scalable and secure networks, implementing innovative solutions to meet evolving business needs.";
  var val18 = "Aspiring Network Engineer dedicated to optimizing network architecture for reliability and performance. Aim is to leverage skills in troubleshooting, configuration, and network monitoring to ensure seamless connectivity and contribute to organizational success.";
  var val19 = "Dynamic Network Engineer aiming to implement secure and scalable network solutions. Committed to staying updated on emerging technologies, providing efficient troubleshooting, and contributing to the design and optimization of resilient network infrastructures.";
  var val20 = "To thrive as a Network Engineer, combining technical expertise with a strategic approach to enhance network efficiency. Dedicated to deploying advanced technologies, ensuring network security, and contributing to the design and maintenance of robust infrastructures.";
  var clear = "";

  function add1(){
    // $("#career_objective").text(clear);
    $("#career_objective").text(val1);
  }
  function add2(){
    // $("#career_objective").text(clear);
    $("#career_objective").text(val2);
  }
  function add3(){
    $("#career_objective").text(val3);
  }
  function add4(){
    $("#career_objective").text(val4);
  }
  function add5(){
    $("#career_objective").text(val5);
  }
  function add6(){
    $("#career_objective").text(val6);
  }
  function add7(){
    $("#career_objective").text(val7);
  }
  function add8(){
    $("#career_objective").text(val8);
  }
  function add9(){
    $("#career_objective").text(val9);
  }
  function add10(){
    $("#career_objective").text(val10);
  }
  function add11(){
    $("#career_objective").text(val11);
  }
  function add12(){
    $("#career_objective").text(val12);
  }
  function add13(){
    $("#career_objective").text(val13);
  }
  function add14(){
    $("#career_objective").text(val14);
  }
  function add15(){
    $("#career_objective").text(val15);
  }
  function add16(){
    $("#career_objective").text(val16);
  }
  function add17(){
    $("#career_objective").text(val17);
  }
  function add18(){
    $("#career_objective").text(val18);
  }
  function add19(){
    $("#career_objective").text(val19);
  }
  function add20(){
    $("#career_objective").text(val20);
  }
  function clr(){
    $("#career_objective").text(clear);
  }
