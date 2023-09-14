export function getIp() {
    const peerConnection = new RTCPeerConnection({ iceServers: [] });
    peerConnection.createDataChannel('');

    peerConnection.createOffer()
    .then((offer) => peerConnection.setLocalDescription(offer))
    .catch((error) => console.log(error));

    return new Promise((resolve)=> {
        peerConnection.onicecandidate = (event) => {
            if (event.candidate) {
                resolve(event.candidate.address);
            } else {
                resolve(null);
            }
        };
    })
}