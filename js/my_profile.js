const popupForm = document.getElementById("popup-form");
const popupOverlay = document.getElementById("popup-overlay");
const editProfileBtn = document.getElementById("edit-profile"); 
const closePopupBtn = document.getElementById("popup-close"); 

editProfileBtn.addEventListener("click", () => {
    popupForm.style.display = "block";
    popupOverlay.style.display = "block";
});

closePopupBtn.addEventListener("click", () => {
    popupForm.style.display = "none";
    popupOverlay.style.display = "none";
});

popupOverlay.addEventListener("click", () => {
    popupForm.style.display = "none";
    popupOverlay.style.display = "none";
});
