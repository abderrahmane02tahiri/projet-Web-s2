// This function is called when the "Upload Project" button is clicked.
function uploadProject() {
    var file = document.getElementById("project-file");
    var formData = new FormData();
    formData.append("project-file", file);
  
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "upload.php");
    xhr.onload = function() {
      if (xhr.status === 200) {
        alert("Project uploaded successfully!");
      } else {
        alert("An error occurred uploading the project.");
      }
    };
    xhr.send(formData);
  }