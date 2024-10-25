<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crop Gambar</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
  <style>
    img {
      display: block;
      max-width: 100%;
    }
    .cropped-image {
      margin-top: 20px;
    }
  </style>
</head>
<body>

<form>
  <input type="file" id="inputImage" accept="image/*">
  <img id="imagePreview" style="max-width: 100%;">
  <button type="button" id="cropButton">Crop Gambar</button>
</form>

<div id="croppedResult" class="cropped-image"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script>
  let cropper;
  const inputImage = document.getElementById('inputImage');
  const imagePreview = document.getElementById('imagePreview');
  const croppedResult = document.getElementById('croppedResult');

  // Event untuk menampilkan gambar yang di-upload
  inputImage.addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(e) {
      imagePreview.src = e.target.result;

      // Menghancurkan instance cropper jika sudah ada sebelumnya
      if (cropper) {
        cropper.destroy();
      }

      // Menginisialisasi cropper.js
      cropper = new Cropper(imagePreview, {
        aspectRatio: 1, // Aspect ratio 1:1 (bisa diubah sesuai kebutuhan)
        viewMode: 1,
        autoCropArea: 1,
      });
    };

    reader.readAsDataURL(file);
  });

  // Event untuk cropping gambar
  document.getElementById('cropButton').addEventListener('click', function() {
    if (!cropper) return;

    const canvas = cropper.getCroppedCanvas({
      width: 300, // Ukuran lebar yang diinginkan
      height: 300 // Ukuran tinggi yang diinginkan
    });

    // Mengubah canvas ke blob untuk diproses
    canvas.toBlob(function(blob) {
      if (!blob) return;

      const croppedImageURL = URL.createObjectURL(blob);
      croppedResult.innerHTML = ''; // Clear previous result
      const croppedImage = new Image();
      croppedImage.src = croppedImageURL;
      croppedImage.alt = 'Hasil crop';
      croppedImage.style.maxWidth = '100%';
      croppedResult.appendChild(croppedImage); // Menampilkan hasil crop
    }, 'image/png'); // Format gambar bisa diubah sesuai kebutuhan (png/jpg)
  });
</script>

</body>
</html>
