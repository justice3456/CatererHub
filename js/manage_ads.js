
function openEditPostModal(ad_id, ad_title, ad_description, ad_image_path) {
    document.getElementById('editPostModal').style.display = 'flex';

    document.getElementById('adId').value = ad_id;

    document.getElementById('adTitle').value = ad_title;
    document.getElementById('adDescription').value = ad_description;
    document.getElementById('existingImage').value = ad_image_path;

    document.getElementById('adImagePreviewImg').src = ad_image_path;
}

function closeEditPostModal() {
    document.getElementById('editPostModal').style.display = 'none';
}

function openDeletePostModal(ad_id) {
    document.getElementById('deletePostModal').style.display = 'flex';
    document.getElementById('deleteAdId').value = ad_id;
}


function closeDeletePostModal() {
    document.getElementById('deletePostModal').style.display = 'none';
}

// function deletePost() {
//     var ad_id = document.getElementById('deleteAdId').value;

//     var xhr = new XMLHttpRequest();
//     xhr.open("POST", "../../actions/caterer_actions/delete_ad_action.php", true);
//     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//     xhr.onreadystatechange = function () {
//         if (xhr.readyState === 4 && xhr.status === 200) {
//             alert("Post deleted successfully.");
//             closeDeletePostModal();
//             location.reload();
//         }
//     };
//     xhr.send("ad_id=" + ad_id);
// }
