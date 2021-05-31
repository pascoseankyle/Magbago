// Welcome ----------------------------------------------------------------------------------
var modal = document.getElementById("modal");
function openModal(data) {
    modal.style.display = "block";
    document.getElementById("title").innerHTML = data.Title;
    document.getElementById("description").innerHTML = data.Description;
    document.getElementById("owner").innerHTML = data.name;
}

function closeModal() {    
     modal.style.display = "none";
}
window.onclick = function(event) {
if (event.target == modal) {
    modal.style.display = "none"; 
    }
}
// Profile ----------------------------------------------------------------------------------
var editprofile = document.getElementById("editprofile");

function openEditProfile(data) {
    editprofile.style.display = "block";
    document.getElementById("userName").value = data.name;
    document.getElementById("userEmail").value = data.email;
    document.getElementById("userPassword").value = data.password;
}
function closeEditProfile() {    
    editprofile.style.display = "none";
}
// Posts 
var editposts = document.getElementById("editposts");
function openEditPost(data) {
    editposts.style.display = "block";
    document.getElementById("postTitle").value = data.Title;
    document.getElementById("postDescription").value = data.Description;
}
function closeEditPost() {    
    editposts.style.display = "none";
}
// Home ----------------------------------------------------------------------------------------
// Posts 
var view = document.getElementById("view");
function viewPost(data) {
    view.style.display = "block";
    document.getElementById("viewTitle").innerHTML = data.Title;
    document.getElementById("viewDesc").innerHTML = data.Description;
}
function closePost() {    
    view.style.display = "none";
}
// Paths
function signup(){ window.location.href = "/goToSignUp"; }
function login(){ window.location.href = "/welcome"; }
function create(){ window.location.href = "/create"; }
function interest(){ window.location.href = "/interest"; }
function logout(){ window.location.href = "/welcome"; }
