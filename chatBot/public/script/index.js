const { RTCPeerConnection, RTCSessionDescription } = window;
const clientSocket = io();
navigator.getUserMedia(
    { video: true, audio: true },
    stream => {
      const localVideo = document.getElementById("local-video");
      if (localVideo) {
        localVideo.srcObject = stream;
      }
    
      stream.getTracks().forEach(track => peerConnection.addTrack(track, stream));
    },
    error => {
      console.warn(error.message);
    }
);
RTCPeerConnection.ontrack = function({ streams: [stream] }) {
    const remoteVideo = document.getElementById("remote-video");
    if (remoteVideo) {
    remoteVideo.srcObject = stream;
    }
};
async function callUser(socketId) {
    const offer = await peerConnection.createOffer();
    await peerConnection.setLocalDescription(new RTCSessionDescription(offer));
    
    clientSocket.emit("call-user", {
      offer,
      to: socketId
    });
}

clientSocket.on("call-made", async data => {
    await peerConnection.setRemoteDescription(
      new RTCSessionDescription(data.offer)
    );
    const answer = await peerConnection.createAnswer();
    await peerConnection.setLocalDescription(new RTCSessionDescription(answer));
    
    clientSocket.emit("make-answer", {
      answer,
      to: data.socket
    });
});

clientSocket.on("answer-made", async data => {
    await peerConnection.setRemoteDescription(
      new RTCSessionDescription(data.answer)
    );
    
    if (!isAlreadyCalling) {
      callUser(data.socket);
      isAlreadyCalling = true;
    }
});
 
clientSocket.on("connection", socket => {
    console.log("on Connections");
    const existingSocket = this.activeSockets.find(activeExistingSocket => activeExistingSocket === socket.id);

    if (!existingSocket) {
      this.activeSockets.push(socket.id);

      socket.emit("update-user-list", {
        users: this.activeSockets.filter(activeExistingSocket => activeExistingSocket !== socket.id)
      });

      socket.broadcast.emit("update-user-list", {
        users: [socket.id]
      });
    }
    socket.on("disconnect", () => {
        this.activeSockets = this.activeSockets.filter(activeExistingSocket => activeExistingSocket !== socket.id);
        socket.broadcast.emit("remove-user", {
          socketId: socket.id
        });
    });

    socket.on("update-user-list", ({ users }) => {
        updateUserList && updateUserList(users);
    });
        
    socket.on("remove-user", ({ socketId }) => {
        const elToRemove = document.getElementById(socketId);
        
        if (elToRemove) {
          elToRemove.remove();
        }
    });
});

function updateUserList(socketIds) {
    const activeUserContainer = document.getElementById("active-user-container");
    
    socketIds.forEach(socketId => {
      const alreadyExistingUser = document.getElementById(socketId);
      if (!alreadyExistingUser) {
        const userContainerEl = createUserItemContainer(socketId);
        activeUserContainer.appendChild(userContainerEl);
      }
    });
}

function createUserItemContainer(socketId) {
    const userContainerEl = document.createElement("div");
    
    const usernameEl = document.createElement("p");
    
    userContainerEl.setAttribute("class", "active-user");
    userContainerEl.setAttribute("id", socketId);
    usernameEl.setAttribute("class", "username");
    usernameEl.innerHTML = `Socket: ${socketId}`;
    
    userContainerEl.appendChild(usernameEl);
    
    userContainerEl.addEventListener("click", () => {
      unselectUsersFromList();
      userContainerEl.setAttribute("class", "active-user active-user--selected");
      const talkingWithInfo = document.getElementById("talking-with-info");
      talkingWithInfo.innerHTML = `Talking with: "Socket: ${socketId}"`;
      callUser(socketId);
    }); 
    return userContainerEl;
}