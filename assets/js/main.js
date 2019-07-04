//Function for hiding photo upload option on new posts
function showUploadImage() {
  document.getElementById("show_upload_image").innerHTML = "<input type='file' id='upload_picture' name='upload_picture' multiple='multiple' class='mb-2'/>";
}
