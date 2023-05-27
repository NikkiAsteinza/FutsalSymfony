console.log("image upload pressed");

const chooseFile = document.querySelector("#user_registration_emblem");

chooseFile.addEventListener("change", getImgData);
const imgPreview = document.getElementById("img-preview");

function getImgData() {
  console.log("image upload pressed");
  const files = chooseFile.files[0];
  if (files) {
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener("load", function () {
      imgPreview.style.cursor = "move";
      imgPreview.style.display = "block";
      imgPreview.style.backgroundImage = "url(" + this.result + ")";
      imgPreview.style.backgroundPosition = "50% 50%";
      imgPreview.style.backgroundSize = "150%";
      imgPreview.style.backgroundRepeat = "no-repeat";
      getImageZoom(this.result.width, this.result.height).then((zoom) => addEventListeners(zoom));
    });
  }
}

const containerSize = imgPreview.getBoundingClientRect();
console.log(containerSize);

let imagePosition = { x: 50, y: 50 };
let cursorPosBefore = { x: 0, y: 0 };
let imagePosBefore = null;
let imagePosAfter = imagePosition;


const setNewCenter = (x, y) => {
  imagePosAfter = { x: x, y: y };
  console.log("new position:"+x+"-"+y)
  imgPreview.style.backgroundPosition = `${x}% ${y}%`;
};

const getImageZoom = (imgW,imgH) => {
  return new Promise((resolve, reject) => {
        conW = containerSize.width,
        conH = containerSize.height,
        ratioW = imgW / conW,
        ratioH = imgH / conH;

      // Stretched to Height
      if (ratioH < ratioW) {
        resolve({
          x: imgW / (conW * ratioH) - 1,
          y: imgH / (conH * ratioH) - 1,
        });
      } else {
        // Stretched to Width
        resolve({
          x: imgW / (conW * ratioW) - 1,
          y: imgH / (conH * ratioW) - 1,
        });
      }
    });
};

let mouseDown = false;
const addEventListeners = (zoomLevels) => {
  imgPreview.addEventListener("mousedown", function (event) {
    console.log("mouse down");
    mouseDown = true;
    cursorPosBefore = { x: event.clientX, y: event.clientY };
    imagePosBefore = imagePosAfter; // Get current image position
  });
  imgPreview.addEventListener("mouseup", function (event) {
    console.log("mouse up");
    mouseDown = false;
  });
  imgPreview.addEventListener("mousemove", function (event) {
    event.preventDefault();
    if(mouseDown)
    {
      console.log("mouse moving");
      if (event.buttons === 0) return;
    
      let xPosClean= ((cursorPosBefore.x - event.clientX) / containerSize.width) * 100;
      console.log(xPosClean);
      let newXPos = imagePosBefore.x +xPosClean;

      let newYPos =
        imagePosBefore.y +
        ((cursorPosBefore.y - event.clientY) / containerSize.height) * 100
      
      setNewCenter(newXPos, newYPos);
    }
  });
  imgPreview.addEventListener("wheel", function (event) {
    event.preventDefault();
    if(mouseDown)
    {
      console.log("wheel moving");
      const delta = Math.sign(event.deltaY);
      console.info(delta);
      if (event.buttons === 0) return;
      let backgroundSize = imgPreview.style.backgroundSize.replace("%","");
      let finalBGSize = (backgroundSize - (delta*10)) < 10 ? 10 : backgroundSize - (delta*10)
      imgPreview.style.backgroundSize = finalBGSize+"%";
    }
  });
};

