import express, { Application } from "express";
//import socketIO, { Server as SocketIOServer } from "socket.io";
import ioserver, { Socket } from 'socket.io';
//import SocketIO from "socket.io-client";
import { createServer, Server as HTTPServer } from "http";
import path from 'path';

export class Server {
    private readonly DEFAULT_PORT = 5000;
    private httpServer:HTTPServer;
    private app:Application;
    private io:Socket;
    
    constructor() {
        this.initialize();
        this.handleRoutes();
        this.handleSocketConnection();
    }

    private initialize(): void {
        this.app = express();
        this.httpServer = createServer(this.app);
        this.io = require("socket.io")(this.httpServer);
        this.configureApp();
    }

    private configureApp(): void {
        this.app.use(express.static(path.join(__dirname, "../public")));
    }
      
    private handleRoutes(): void {
        this.app.get("/", (req, res) => {
            res.send(`<h1>Hello World</h1>`); 
        });
    }
      
    private handleSocketConnection(): void {
        this.io.on("connection", socket => {
            console.log("Socket connected.");
        });
    }
      
    public listen(callback: (port: number) => void): void {
        this.httpServer.listen(this.DEFAULT_PORT, () =>
            callback(this.DEFAULT_PORT)
        );
    }
}