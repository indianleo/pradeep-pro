export function getCam(id=null) {
    let video = '';
    if (!id) {
        video = document.createElement('video');
        video.setAttribute('id', 'targetVid');
        video.setAttribute('playsInline', '');
        video.setAttribute('autoPlay', '');
        video.setAttribute('muted', '');
        video.style.width = '200px';
        video.style.height = '200px';
    } else {
        video = document.getElementById(id);
    }

    /* Setting up the constraint */
    let facingMode = "user"; // Can be 'user' or 'environment' to access back or front camera (NEAT!)
    let constraints = {
        audio: false,
        video: {
            facingMode: facingMode
        }
    };

    /* Stream it to video element */
    navigator?.mediaDevices?.getUserMedia(constraints).then(function success(stream) {
        video.srcObject = stream;
    });
}

export function capture (id=null, vidRef) {
    let canvas = '';
    if (!id) {
        canvas = document.createElement("canvas");
        canvas.setAttribute('id', 'capturtarget');
        canvas.setAttribute('width', '1080');
        canvas.setAttribute('height', '720');
    } else {
        canvas = document.getElementById(id);
    }
    let video = document.querySelector(`#${vidRef || 'targetVid'}`);
    if (video) {
        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
        let image_data_url = canvas.toDataURL('image/jpeg');
        return image_data_url;
    } 
    return "Video Source not found";
}