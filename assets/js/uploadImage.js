const UploadImage = (event) => {
  const image = document.getElementById("image");
  const file = event.target.files[0];

  if (file) {
    const reader = new FileReader();

    reader.onload = function () {
      image.src = reader.result;
      document.getElementById("upload-button").disabled = true;
      
      // Wait for the image to load before triggering the upload process
      image.onload = function () {
        document.getElementById('upload-button').disabled = false;
      };
    };

    reader.readAsDataURL(file);
  }
};

function resizeImage() {
  const imageSrc = document.querySelector("#image").src;

  const img = new Image();
  img.src = imageSrc;

  // Show progress bar
  const progressBar = document.getElementById("progress-bar");
  progressBar.style.width = "0%";
  progressBar.innerHTML = "";

  cropAndCompressImage(img, progressBar);
}

function cropAndCompressImage(img, progressBar) {
  const aspectRatio = img.width / img.height;
  let cropWidth, cropHeight, cropX, cropY;

  if (aspectRatio > 1) {
    cropWidth = img.height;
    cropHeight = img.height;
    cropX = (img.width - cropWidth) / 2;
    cropY = 0;
  } else {
    cropWidth = img.width;
    cropHeight = img.width;
    cropX = 0;
    cropY = (img.height - cropHeight) / 2;
  }

  const canvas = document.createElement("canvas");
  canvas.width = 300;
  canvas.height = 300;

  const ctx = canvas.getContext("2d");
  ctx.drawImage(
    img,
    cropX,
    cropY,
    cropWidth,
    cropHeight,
    0,
    0,
    canvas.width,
    canvas.height
  );

  const jpegURL = canvas.toDataURL("image/jpeg", 0.9);

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "./upload.asp");
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.upload.onprogress = function (event) {
    if (event.lengthComputable) {
      const percentLoaded = Math.round((event.loaded / event.total) * 100);
      progressBar.style.width = percentLoaded + "%";
    }
  };
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        progressBar.style.width = "100%";
        document.getElementById("upload-button").disabled = true;
        window.alert("Profile Updated Successfully!")
        location.reload();
      }
    }
  };
  var base = encodeURIComponent(jpegURL);

  // Construct the request payload
  var payload = "image=" + base;

  xhr.send(payload);
}