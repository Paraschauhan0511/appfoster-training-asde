const userListContainer = document.getElementById("user-list");
const userModal = new bootstrap.Modal(document.getElementById("user-modal"));

// Fetching user data from the API
fetch("https://jsonplaceholder.typicode.com/users")
  .then((response) => response.json())
  .then((users) => {
    // Loop through the user data and create user list elements
    users.forEach((user) => {
      const userDetails = document.createElement("div");
      userDetails.classList.add("user-list");

      const userName = document.createElement("span");
      userName.textContent = user.name;

      const viewMoreBtn = document.createElement("button");
      viewMoreBtn.classList.add("view-more-btn");
      viewMoreBtn.textContent = "View More";

      // Add event listener to the "View More" button to fetch user details
      viewMoreBtn.addEventListener("click", () => {
        fetchUserDetails(user.id);
      });

      // Append user name and button to the user details div
      userDetails.appendChild(userName);
      userDetails.appendChild(viewMoreBtn);

      // Append the user details to the main user list container
      userListContainer.appendChild(userDetails);
    });
  })
  .catch((error) => console.error(error));  // Error handling for fetch

// Function to fetch user details and projects
function fetchUserDetails(userId) {
  // Fetch user details by userId
  fetch(`https://jsonplaceholder.typicode.com/users/${userId}`)
    .then((response) => response.json())
    .then((user) => {
      const userInfoContainer = document.getElementById("user-info");
      userInfoContainer.innerHTML = "";  // Clear previous content

      // Create user detail elements
      const userName = document.createElement("h3");
      userName.textContent = user.name;

      const userEmail = document.createElement("p");
      userEmail.textContent = `Email: ${user.email}`;

      const userPhone = document.createElement("p");
      userPhone.textContent = `Phone: ${user.phone}`;

      // Create a container for user projects
      const userProjectsContainer = document.createElement("div");
      userProjectsContainer.innerHTML = "<h3>Projects:</h3>";

      // Fetch projects related to the user
      fetch(`https://jsonplaceholder.typicode.com/posts?userId=${userId}`)
        .then((response) => response.json())
        .then((projects) => {
          // Loop through the projects and create elements for each project
          projects.forEach((project) => {
            const projectTitle = document.createElement("p");
            projectTitle.textContent = project.title;
            userProjectsContainer.appendChild(projectTitle);
          });

          // Append user details and project list to the modal
          userInfoContainer.appendChild(userName);
          userInfoContainer.appendChild(userEmail);
          userInfoContainer.appendChild(userPhone);
          userInfoContainer.appendChild(userProjectsContainer);

          // Show the modal with user details
          userModal.show();
        });
    });
}
