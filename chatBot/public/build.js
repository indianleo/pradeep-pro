//const { RTCPeerConnection, RTCSessionDescription } = window;
const clientSocket = io();

document.querySelector("#send").addEventListener('click', function(){
  let msg = document.querySelector("#local_msg_box").value;
  
});

async function callUser(socketId) {
    clientSocket.emit("call-user", {
      offer,
      to: socketId
    });
}
 
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

    socket.on("call-made", async data => {
      console.log("call made");
      socket.emit("make-answer", {
        answer,
        to: data.socket
      });
    });
      
    socket.on("answer-made", async data => {
      if (!window.isAlreadyCalling) {
        callUser(data.socket);
        window.isAlreadyCalling = true;
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