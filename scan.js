let videoStream; // To store the video stream

function startCamera() {
    // Get access to the camera
    navigator.mediaDevices.getUserMedia({ video: true })
    .then(function(stream) {
        videoStream = stream; // Store the stream for later use
        var video = document.getElementById('videoElement');
        video.srcObject = stream;
    })
    .catch(function(err) {
        console.log('Error: ' + err.message);
    });
}

function captureImage() {
    if (!videoStream) {
        console.log('Video stream not available');
        return;
    }

    // Create a canvas element to draw the video frame
    var canvas = document.createElement('canvas');
    var video = document.getElementById('videoElement');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;

    // Draw the current frame from the video onto the canvas
    var ctx = canvas.getContext('2d');
    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

    // Convert the canvas content to a data URL representing the captured image
    var imageDataURL = canvas.toDataURL('image/png');

    // Display the captured image on the page
    var capturedImage = document.getElementById('capturedImage');
    capturedImage.src = imageDataURL;
    capturedImage.style.display = 'block';

    // Display download link for the captured image
    var downloadLink = document.getElementById('downloadLink');
    downloadLink.href = imageDataURL;
    downloadLink.style.display = 'block';
}
