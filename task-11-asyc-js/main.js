const userListContainer = document.getElementById("user-list");
const userModal = new bootstrap.Modal(document.getElementById("user-modal"));

fetch("https://jsonplaceholder.typicode.com/users")
  .then((response) => response.json())
  .then((users) => {
    users.forEach((user) => {
      const userDetails = document.createElement("div");
      userDetails.classList.add("user-list");

      const userName = document.createElement("span");
      userName.textContent = user.name;

      const viewMoreBtn = document.createElement("button");
      viewMoreBtn.classList.add("view-more-btn");
      viewMoreBtn.textContent = "View More";
      viewMoreBtn.addEventListener("click", () => {
        fetchUserDetails(user.id);
      });

      userDetails.appendChild(userName);
      userDetails.appendChild(viewMoreBtn);
      userListContainer.appendChild(userDetails);
    });
  })
  .catch((error) => console.error(error));
  

function fetchUserDetails(userId) {
  fetch(`https://jsonplaceholder.typicode.com/users/${userId}`)
    .then((response) => response.json())
    .then((user) => {
      const userInfoContainer = document.getElementById("user-info");
      userInfoContainer.innerHTML = "";

      const userName = document.createElement("h3");
      userName.textContent = user.name;

      const userEmail = document.createElement("p");
      userEmail.textContent = `Email: ${user.email}`;

      const userPhone = document.createElement("p");
      userPhone.textContent = `Phone: ${user.phone}`;

      const userProjectsContainer = document.createElement("div");
      userProjectsContainer.innerHTML = "<h3>Projects:</h3>";

      fetch(`https://jsonplaceholder.typicode.com/posts?userId=${userId}`)
        .then((response) => response.json())
        .then((projects) => {
          projects.forEach((project) => {
            const projectTitle = document.createElement("p");
            projectTitle.textContent = project.title;
            userProjectsContainer.appendChild(projectTitle);
          });

          userInfoContainer.appendChild(userName);
          userInfoContainer.appendChild(userEmail);
          userInfoContainer.appendChild(userPhone);
          userInfoContainer.appendChild(userProjectsContainer);

          userModal.show();
        });
    });
}