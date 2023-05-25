// $(document).ready(function () {
  // const chooseFile = document.querySelector("#user_registration_escudo");
 
function getImgData() {
  console.log("image upload pressed")
  const imgPreview = document.getElementById("img-preview");
  const files = chooseFile.files[0];
  if (files) {
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener("load", function () {
      imgPreview.style.display = "block";
      imgPreview.style.backgroundImage = "url("+ this.result +")";
      // imgPreview.innerHTML = '<img src="' + this.result + '" />';
    });
  }
}
// });
