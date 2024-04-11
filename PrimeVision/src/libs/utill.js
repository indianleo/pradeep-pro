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

export function listCookies(data) {
    let cookieStr = data || document.cookie;
    if (cookieStr) {
        let cookies = cookieStr.split(';');
        return cookies.reduce((acc, item)=> {
            const k = item.split('=');
            acc.push({[k[0]]:k[1]});
            return acc;
        }, [])
    }
 
    return [];
}